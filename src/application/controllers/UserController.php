<?php

use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\QrCode;

defined('BASEPATH') or exit('No direct script access allowed');

class UserController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('UserModel');
		$this->load->model('LoginModel');

		if ($this->session->userdata('username') == null) {
			redirect('login?r=' . $this->uri->segment(1, null));
		}
	}

	public function index()
	{
		$data['title'] = 'User';
		$data['user'] = $this->UserModel->getDataUser([
			'username' => $this->session->userdata['username']
		]);
		$data['full'] = $this->_checkProfileFull($data['user']);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/aside_user', $data);
		$this->load->view('user/user_view', $data);
		$this->load->view('templates/footer');
	}

	private function _checkProfileFull($arr = [])
	{
		if (sizeof($arr) == 0) return false;

		if(empty($arr['instansi']) || empty($arr['role']) || empty($arr['no_telepon'])){
			return false;
		} else {
			return true;
		}
		// $count = 0;
		// foreach ($arr as $key => $value) {
		// 	if (!empty($value)) {
		// 		$count++;
		// 	}
		// };

		// return $count > 9 ? true : false;
	}

	private function mailConfig()
	{
		require_once 'src/application/helpers/Email.php';
		$mail = new Email();

		return $mail->getConfig();
	}

	function teleponValidation($telp)
	{
		$re = '/^(\+62|08|[0][\d]{2,3})[\d]+$/';
		preg_match($re, $telp, $matches, PREG_OFFSET_CAPTURE, 0);
		if (!$matches) {
			$this->form_validation->set_message('teleponValidation', 'Telepon tidak valid, periksa kembali nomor telepon sesuai aturan telepon Indonesia');
			return FALSE;
		}

		return TRUE;
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

	public function upload()
	{
		$data['title'] = 'Upload bukti pembayaran';

		$this->load->view('templates/header', $data);
		$this->load->view('user/uploadFile_view', $data);
		$this->load->view('templates/footer');
	}

	public function doUpload()
	{
		$config['upload_path']      = realpath('./bukti-bayar/');
		$config['allowed_types']    = 'png|jpeg|jpg';
		$config['file_name']        = $this->session->userdata('username');
		$config['remove_spaces']    = true;
		$config['overwrite']        = true;
		$config['max_sizes']        = '512';

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('file')) {
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('message', '<div class="alert alert-danger pb-0" role="alert">
            ' . $error . '.
            </div>');
			redirect('user');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Your file has been succesfully uploaded.
            </div>');
			$where = [
				'username' => $this->session->userdata('username')
			];
			$update = [
				'bukti_bayar' => $this->upload->data()['file_name']
			];
			$this->LoginModel->updateData($where, $update);

			redirect('user/upload');
		}
	}

	public function edit()
	{
		$this->form_validation->set_rules('fullname', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('instansi', 'Asal Instansi', 'trim|required');
		$this->form_validation->set_rules('role', 'Sebagai', 'trim|required');
		$this->form_validation->set_rules('telp', 'Nomer telepon', 'trim|required|callback_teleponValidation');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Edit profile';
			$data['user'] = $this->UserModel->getDataUser([
				'username' => $this->session->userdata('username')
			]);
			$data['full'] = $this->_checkProfileFull($data['user']);

			$this->load->view('templates/header', $data);
			$this->load->view('templates/aside_user', $data);
			$this->load->view('user/edit_view', $data);
			$this->load->view('templates/footer');
		} else {
			$fullname = $this->input->post('fullname');
			$email = $this->input->post('email');
			$instansi = $this->input->post('instansi');
			$role = $this->input->post('role');
			$telp = str_replace(' ', '', $this->input->post('telp'));

			$data = [
				'nama_lengkap' => $fullname,
				'email' => $email,
				'instansi' => $instansi,
				'role' => $role,
				'no_telepon' => $telp,
			];

			$this->UserModel->editProfile($data);
			$this->session->set_flashdata('message-user', '<div class="alert alert-success" role="alert">
            Edit profil berhasil
            </div>');
			redirect('user');
		}
	}

	public function changePassword()
	{
		if (isset($_POST['inputOne']) && isset($_POST['inputTwo']) && isset($_POST['inputThree'])) {
			$oldPass = sha1($this->input->post('inputOne'));
			$newPass = sha1($this->input->post('inputTwo'));
			$confNewPass = sha1($this->input->post('inputThree'));
			$where = [
				'username' => $this->session->userdata('username')
			];
			// Jika old password benar
			if ($this->UserModel->getDataUser($where)['password'] == $oldPass) {
				// Jika new pass sama dengan conf new pas
				if ($newPass == $confNewPass) {
					if (strlen($this->input->post('inputTwo')) < 6) {
						$this->session->set_flashdata('message-user', '<div class="alert alert-success col-12 text-center" role="alert">
                        Panjang password minimal 6 karakter
                        </div>');
					} else {
						$update = [
							'password' => $newPass
						];
						$this->UserModel->editProfile($update);
						$this->session->set_flashdata('message-user', '<div class="alert alert-success col-12 text-center" role="alert">
                        Password anda berhasil diperbarui
                        </div>');
					}
				} else {
					$this->session->set_flashdata('message-user', '<div class="alert alert-danger col-12 text-center" role="alert">
                    Password baru anda tidak sesuai dengan password konfirmasi yang anda masukkan
                    </div>');
				}
			} else {
				$this->session->set_flashdata('message-user', '<div class="alert alert-danger col-12 text-center" role="alert">
                Password lama anda salah
                </div>');
			}
		}
		redirect('user');
	}

	public function pendaftaran()
	{

		$data['title'] = 'Pendaftaran';
		$data['user'] = $this->UserModel->getDataUser([
			'username' => $this->session->userdata['username']
		]);
		if (!$this->_checkProfileFull($data['user'])) {
			$this->session->set_flashdata('message', "<script>Swal.fire({
				type: 'error',
				title: 'Maaf',
				text: 'Silahkan lengkapi data diri anda',
			})</script>");
			redirect('user/edit');
		}
		$data['full'] = $this->_checkProfileFull($data['user']);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/aside_user', $data);
		$this->load->view('user/pendaftaran_view', $data);
		$this->load->view('templates/footer');
	}

	public function proses_pendaftaran()
	{
		/*
		* jika tipe yang di pilih adalah perorangan maka $tipe = 1 else 2
		*/
		$tipe = $this->input->post('');
		$profil = $this->UserModel->getDataUser([
			'username' => $this->session->userdata['username']
		]);

		if ($tipe == 1) { } else { }
	}

	public function pembayaran()
	{ }

	public function sendAbsensiMail()
	{
		['email' => $email] = $this->UserModel->getDataUser([
			'username' => $this->session->userdata['username']
		]);

		$token = $this->_generateQrCode();

		$this->load->library('email', $this->mailConfig());
		$this->email->from($this->mailConfig()['smtp_user'], 'Turnamen Catur Raja Brawijaya');
		$this->email->to($email);
		$this->email->subject('Kode Registrasi Ulang');
		$this->email->attach(FCPATH . "/qrcode/$token.png");
		$cid = $this->email->attachment_cid(FCPATH . "/qrcode/$token.png");
		$this->email->message('<img src="cid:' . $cid . '"/>');
		$this->email->send();
	}

	private function _generateQrCode()
	{
		['username' => $username] = $this->session->userdata();

		$check = $this->UserModel->checkPembayaranOrang($username) ? "orang" : ($this->UserModel->checkPembayaranRegu($username) ? "regu" : false);
		if (!$check) return false;

		$where = array('user_id' => $this->session->userdata('id'));
		['token' => $token] = $this->UserModel->getDataPembayaran($check, $where);

		$qr = new QrCode();
		$qr->setText(base_url("/absensi/$check/$token"));
		$qr->setSize(200);
		$qr->setErrorCorrectionLevel(new ErrorCorrectionLevel(ErrorCorrectionLevel::HIGH));
		$qr->setForegroundColor(array('r' => 0, 'g' => 0, 'b' => 0, 'a' => 0));
		$qr->setBackgroundColor(array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 0));
		$qr->setLogoPath(FCPATH . '/assets/img/logo.png');
		$qr->setLogoSize(45, 45);

		header('Content-Type: ' . $qr->getContentType());
		$qr->writeFile(FCPATH . "/qrcode/$token.png");

		return $token;
	}
}
