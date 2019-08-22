<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('LoginModel');

		if ($this->session->userdata('username') != null) {
			redirect('user');
		}
	}

	public function tes()
	{
		$this->load->view('templates/activation_email');
	}

	public function index()
	{
		$this->form_validation->set_message('required', 'Kolom {field} wajib diisi.');
		$this->form_validation->set_rules('input', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]');
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Masuk';
			$this->load->view('templates/header', $data);
			$this->load->view('login/login_view');
			$this->load->view('templates/footer');
		} else {
			$inputData = array(
				'input' => $this->security->xss_clean($this->input->post('input')),
				'password' => $this->security->xss_clean($this->input->post('password'))
			);

			$input = strtolower($inputData['input']);
			$password = sha1($inputData['password']);

			$data = [
				'user' => $input,
				'password' => $password
			];
			if ($this->LoginModel->login($data)) {
				$data = $this->LoginModel->login($data);
				if ($this->LoginModel->checkStatusAktif(['id' => $data['id']])) {
					$array = [
						'id' => $data['id'],
						'username' => $data['username'],
						'fullname' => $data['nama_lengkap']
					];
					$this->session->set_userdata($array);
					if (isset($_GET['r'])) {
						redirect($_GET['r']);
					} else {
						redirect('user');
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
						Akun anda belum aktif. Silahkan mengaktifkan akun anda melalui link didalam email yang telah kami kirim
						</div>');
					redirect('masuk');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
					Username atau password salah
					</div>');
				redirect('masuk');
			}
		}
	}

	public function register()
	{
		$this->form_validation->set_message('required', 'Kolom {field} wajib diisi.');
		$this->form_validation->set_rules('fullname', 'Nama lengkap', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]|max_length[16]|trim|alpha_numeric', [
			'is_unique' => 'Username ini sudah digunakan.'
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]');
		$this->form_validation->set_rules('repassword', 'Konfirmasi password', 'required|matches[password]|trim|min_length[6]', [
			'matches' => 'Kolom konfirmasi password tidak cocok dengan kolom password'
		]);

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Daftar';
			$this->load->view('templates/header', $data);
			$this->load->view('login/register_view');
			$this->load->view('templates/footer');
		} else {
			$fullname = $this->input->post('fullname');
			$username = strtolower($this->input->post('username'));
			$email = $this->input->post('email');
			$password = sha1($this->input->post('password'));
			$kode_aktivasi = md5('registertcrbbcc19' . $username);

			$data = [
				'nama_lengkap' => $fullname,
				'username' => $username,
				'email' => $email,
				'password' => $password,
				'kode_aktivasi' => $kode_aktivasi
			];

			$this->LoginModel->insertData($data);

			if ($this->_sendActivationEmail($username)) {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Akun anda berhasil dibuat. Silahkan cek kotak email anda untuk mengaktifkan akun
				</div>');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Gagal mengirim email aktivasi. Silahkan menghubungi admin melalui sosial media atau melalui email ittcrbcii@gmail.com
				</div>');
			}
			redirect('masuk');
		}
	}

	private function _sendActivationEmail($username)
	{
		$this->load->model('UserModel');

		$data = [
			'username' => $username
		];

		$dataUser = $this->UserModel->getDataUser($data);
		$data['username'] = $dataUser['username'];
		$data['email'] = $dataUser['email'];
		$data['link'] = base_url('daftar/aktivasi/' . $dataUser['kode_aktivasi']);
		$msg = $this->load->view('templates/activation_email', $data, true);

		$this->load->library('email', $this->recoveryConfig());
		$this->email->from($this->recoveryConfig()['smtp_user'], 'Turnamen Catur Raja Brawijaya');
		$this->email->to($dataUser['email']);
		$this->email->subject('Aktivasi Akun TCRB');
		$this->email->message($msg);
		return $this->email->send() ? true : false;
	}

	public function activate($kode)
	{
		$kodeAktivasi = $kode;
		$data = [
			'kode_aktivasi' => $kodeAktivasi
		];
		if ($this->LoginModel->checkActivationCode($data)) {
			if ($this->LoginModel->checkStatusAktif($data)) {
				$this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">
				Akun anda telah aktif
				</div>');
				redirect('masuk');
			} else {
				$update = [
					'status_aktif' => 1
				];
				$this->LoginModel->updateData($data, $update);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Akun anda berhasil diaktifkan
				</div>');
				redirect('masuk');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Link aktivasi salah
			</div>');
			redirect('masuk');
		}
	}

	public function forgetPassword()
	{
		$this->form_validation->set_message('required', 'Kolom {field} wajib diisi.');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Lupa Password';
			$this->load->view('templates/header', $data);
			$this->load->view('login/recovery_view');
			$this->load->view('templates/footer');
		} else {
			$input = $this->input->post('username');
			$dataUser = $this->LoginModel->recovery($input);
			if ($dataUser) {
				if ($this->_sendRecoveryEmail($dataUser)) {
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					Kami telah mengirim email ke anda. Silahkan ikuti petunjuk yang ada di email tersebut
					</div>');
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
					Gagal mengirim email. Silahkan menghubungi admin melalui sosial media atau email ittcrbcii@gmail.com
					</div>');
				}
				redirect('masuk');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Username tidak ditemukan
				</div>');
				redirect('lupa-password');
			}
		}
	}

	private function recoveryConfig()
	{
		require_once 'src/application/helpers/Email.php';
		$mail = new Email();

		return $mail->getConfig();
	}

	private function _sendRecoveryEmail($dataUser)
	{
		$recoveryCode = md5('resettcrbbcc' . $dataUser['password']);
		$this->LoginModel->setRecoveryCode($recoveryCode);

		$data['username'] = $dataUser['username'];
		$data['link'] = base_url('lupa-password/ganti/' . $recoveryCode);
		$msg = $this->load->view('templates/recovery_email', $data, true);

		$this->load->library('email', $this->recoveryConfig());
		$this->email->from($this->recoveryConfig()['smtp_user'], 'Turnamen Catur Raja Brawijaya');
		$this->email->to($dataUser['email']);
		$this->email->subject('Lupa Password Akun TCRB');
		$this->email->message($msg);
		return $this->email->send() ? true : false;
	}

	public function reset($code)
	{
		if ($code != null) {
			$dataUser = $this->LoginModel->verifyRecoveryCode($code);
			if ($dataUser != null) {
				$this->form_validation->set_message('required', 'Kolom {field} wajib diisi.');
				$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
				$this->form_validation->set_rules('repassword', 'Konfirmasi password', 'trim|required|matches[password]|min_length[6]', [
					'matches' => 'Kolom konfirmasi password tidak cocok dengan kolom password'
				]);
				if ($this->form_validation->run() == false) {
					$data['title'] = 'Ganti Password';
					$data['hash'] = $code;
					$data['username'] = $dataUser['username'];
					$data['email'] = $dataUser['email'];
					$this->load->view('templates/header', $data);
					$this->load->view('login/reset_view', $data);
					$this->load->view('templates/footer');
				} else {
					$hash = $this->input->post('hash');
					$username = strtolower($this->input->post('username'));
					$password = sha1($this->input->post('password'));

					if (!isset($_POST['hash']) || strcasecmp($hash, $code) != 0) {
						die('Error updating your password');
					}
					$data = [
						'recoveryCode' => $code,
						'username' => $username,
						'password' => $password,
					];

					$status = $this->LoginModel->updatePassword($data);
					if ($status) {
						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
						Terjadi kesalahan saat mengganti password anda. Silahkan menghubungi admin melalui sosial media atau email ittcrbcii@gmail.com
						</div>');
					} else {
						$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
						Password anda berhasil diganti. Silahkan masuk dengan password baru anda
						</div>');
					}
					redirect('masuk');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Link reset password salah atau telah kadaluarsa. Silahkan melakukan permintaan ganti password kembali
				</div>');
				redirect('masuk');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Link reset password salah atau telah kadaluarsa. Silahkan melakukan permintaan ganti password kembali
			</div>');
			redirect('masuk');
		}
	}
}
