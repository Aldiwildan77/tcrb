<?php

use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\QrCode;

defined('BASEPATH') or exit('No direct script access allowed');

class UserController extends CI_Controller
{
	private $pembayaranPath = './bukti-bayar/',
		$fotoPath = './players/foto/';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('UserModel');
		$this->load->model('LoginModel');

		if ($this->session->userdata('username') == null) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Silahkan masuk terlebih dahulu
				</div>');
			redirect('masuk?r=' . $this->uri->segment(1, null));
		}
	}

	public function index()
	{
		$data['title'] = 'User';
		$data['user'] = $this->UserModel->getDataUser([
			'username' => $this->session->userdata['username']
		]);
		$data['full'] = $this->_checkProfileFull($data['user']);

		if (!$data['full']) {
			$this->session->set_flashdata('message-user', "<script>Swal.fire({
				title: 'Pemberitauan',
				text: 'Dimohon melengkapi data diri user sebelum melakukan pendaftaran lomba',
				type: 'warning',
				confirmButtonText: 'Lengkapi data diri'
			}).then((result) => {
				if (result.value) {
					window.location.href = '" . base_url('user/edit') . "'
				}
			  })</script>");
		}

		$this->load->view('templates/header', $data);
		$this->load->view('templates/aside_user', $data);
		$this->load->view('user/user_view', $data);
		$this->load->view('templates/footer');
	}

	private function _checkProfileFull($arr = [])
	{
		if (sizeof($arr) == 0) return false;

		if (empty($arr['instansi']) || empty($arr['role']) || empty($arr['no_telepon'])) {
			return false;
		} else {
			return true;
		}
	}

	private function _randomGroupOfficialId()
	{
		$listed = "0123456789ABCDEFGHJKMNOPQRSTUVWXYZabcdefghjkmnopqrstuvwxyz";
		$generatedCode = '';
		for ($i = 0; $i < 8; $i++) {
			$generatedCode .= substr($listed, rand(0, strlen($listed) - 1), 1);
		}
		return $generatedCode;
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
		redirect('masuk');
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
		['username' => $username] = $this->session->userdata();
		['id' => $id] = $this->session->userdata();
		$data['kategoriRegu'] = [
			'5' => 'Beregu Cepat Paket A',
			'6' => 'Beregu Cepat Paket B',
			'7' => 'Beregu Cepat Paket C',
			'8' => 'Beregu Kilat'
		];
		$data['kategoriPemain'] = [
			'1' => 'Presale 1 Cepat',
			'2' => 'Presale 2 Cepat',
			'3' => 'Presale 1 Kilat',
			'4' => 'Presale 2 Kilat'
		];
		$data['kategoriOfficial'] = [
			'9' => 'Paket A',
			'10' => 'Paket B'
		];
		$data['jenis_kelamin'] = [
			'L' => 'Laki-laki',
			'P' => 'Perempuan'
		];
		$check = $this->UserModel->checkPembayaranOrang($username) ? "orang" : ($this->UserModel->checkPembayaranRegu($username) ? "regu" : false);
		switch ($check) {
			case 'orang':
				$data['pemain'] = $this->UserModel->getDataPendaftaranPerorangan($id);
				$this->load->view('user/pendaftaran_update_orang', $data);
				break;
			case 'regu':
				$data['regu'] = $this->UserModel->getDataPendaftaranRegu($id);
				$data['pemain'] = $this->UserModel->getDataPendaftaranReguPemain($id);
				$data['official'] = $this->UserModel->getDataPendaftaranReguOfficial($id);
				$this->load->view('user/pendaftaran_update_regu', $data);
				break;
			default:
				$this->load->view('user/pendaftaran_view', $data);
				break;
		}
		$this->load->view('templates/footer');
	}

	public function upload()
	{
		$this->load->view('user/upload');
	}

	public function doUpload($file, $fileName, $path)
	{
		// './players/foto/'
		$config['upload_path']      = $path;
		$config['allowed_types']    = 'png|jpeg|jpg';
		$config['remove_spaces']    = true;
		$config['overwrite']        = true;
		$config['max_sizes']        = '1024';
		$config['file_name'] 				= array($fileName);

		$this->load->library('upload');
		$this->upload->initialize($config);
		$this->upload->do_multi_upload($file);
	}

	public function prosesPendaftaranPerorangan()
	{
		$pemain = [];
		$kategori = [];
		$pemainLength = $this->input->post('pemain');

		for ($i = 0; $i < sizeof($pemainLength); $i++) {
			$pemain[$i]['user_id'] = $this->session->userdata('id');
			$pemain[$i]['kategori_id'] = $this->input->post('kategori')[$i];
			$pemain[$i]['nama'] = $this->input->post('pemain')[$i];
			$pemain[$i]['nim'] = $this->input->post('nim')[$i];
			$pemain[$i]['jenis_kelamin'] = $this->input->post('jenisKelamin')[$i];
			$pemain[$i]['instansi'] = $this->input->post('instansi')[$i];
			$pemain[$i]['jurusan'] = $this->input->post('fakultas')[$i];
			$pemain[$i]['foto_diri'] = $this->_generateNamaFoto([$pemain[$i]['nim'], $pemain[$i]['nama']], $i, 'PRG-FD');
			$pemain[$i]['foto_kartu_pelajar'] = $this->_generateNamaFoto([$pemain[$i]['nim'], $pemain[$i]['nama']], $i, 'PRG-FKP');
			$kategori[$i] = $pemain[$i]['kategori_id'];

			$this->doUpload("foto_diri", $pemain[$i]['foto_diri'], $this->fotoPath);
			$this->doUpload("foto_kartu", $pemain[$i]['foto_kartu_pelajar'], $this->fotoPath);
		}

		$this->UserModel->insertPerorangan($pemain);

		$data = array(
			'user_id' => $this->session->userdata('id'),
			'total' => $this->UserModel->getTotalHargaPerorangan(),
			'token' => md5('perorangan' . $this->session->userdata('id') . 'tcrb' . sizeof($pemainLength))
		);

		$this->UserModel->insertPembayaranPerorangan($data);

		$this->session->set_flashdata('message-user', "<script>Swal.fire({
			type: 'success',
			title: 'Berhasil',
			text: 'Data pendaftaran pemain berhasil masuk. Silahkan lanjut ke proses pembayaran',
		})</script>");
		redirect('user/pembayaran');
		// should redirect to pembayaran with carrying pemain + pem_orang data's
	}

	private function _generateNamaFoto($arr = [], $i, $suffix)
	{
		return $this->session->userdata('id') . "-" . $arr[0] . "-$i-" . substr(str_replace(' ', '', $arr[1]), 0, 7) . '-' . $suffix . '.jpg';
	}

	public function prosesPendaftaranBeregu()
	{
		$regu = [];
		$pemain = [];
		$official = [];

		/* insert regu
			** insert official
			** insert pemain regu
			** insert pembayaran regu
			*/

		$reguLength = $this->input->post('regu');
		for ($i = 0; $i < sizeof($reguLength); $i++) {
			$regu[$i]['nama'] = $this->input->post("regu")[$i];
			$regu[$i]['user_id'] = $this->session->userdata('id');
			$regu[$i]['kategori_id'] = $this->input->post("kategoriRegu")[$i];
			$regu[$i]['nama'] = $this->input->post("regu")[$i];
			$regu[$i]['instansi'] = $this->input->post("instansiRegu")[$i];
		}

		$this->UserModel->insertRegu($regu);
		$reguId = $this->UserModel->getReguData();

		for ($i = 0; $i < sizeof($reguLength); $i++) {
			for ($j = 1; $j < 5; $j++) {
				$pemain[$i][$j - 1]['user_id'] = $this->session->userdata('id');
				$pemain[$i][$j - 1]['regu_id'] = $reguId[$i]['id'];
				$pemain[$i][$j - 1]['isCaptain'] = $j == 1 ? 1 : 0;
				$pemain[$i][$j - 1]['nama'] = $this->input->post("pemain$j")[$i];
				$pemain[$i][$j - 1]['nim'] = $this->input->post("nim$j")[$i];
				$pemain[$i][$j - 1]['jenis_kelamin'] = $this->input->post("jenisKelamin$j")[$i];
				$pemain[$i][$j - 1]['jurusan'] = $this->input->post("fakultas$j")[$i];
				$pemain[$i][$j - 1]['foto_diri'] = $this->_generateNamaFoto([$reguId[$i]['id'], $pemain[$i][$j - 1]['nama']], $j, 'FD');
				$pemain[$i][$j - 1]['foto_kartu_pelajar'] = $this->_generateNamaFoto([$reguId[$i]['id'], $pemain[$i][$j - 1]['nama']], $j, 'FKP');
				$pemain[$i][$j - 1]['alergi'] = $this->input->post("alergi$j")[$i];

				$this->doUpload("foto_diri$j", $pemain[$i][$j - 1]['foto_diri'], $this->fotoPath);
				$this->doUpload("foto_kartu$j", $pemain[$i][$j - 1]['foto_kartu_pelajar'], $this->fotoPath);
				// sorry Fakhri, this method used magic because CodeIgniter seems can't solve that
			}
		}

		$this->UserModel->insertPemainRegu($pemain);

		for ($i = 0; $i < sizeof($reguLength); $i++) {
			$og = $this->_randomGroupOfficialId();
			for ($j = 1; $j < 3; $j++) {
				$official[$i][$j - 1]['official_group'] = $og;
				$official[$i][$j - 1]['regu_id'] = $reguId[$i]['id'];
				$official[$i][$j - 1]['kategori_id'] = $this->input->post("paket_official")[$i];
				$official[$i][$j - 1]['nama'] = $this->input->post("official$j")[$i];
				$official[$i][$j - 1]['sebagai'] = $this->input->post("sebagai$j")[$i];
				$official[$i][$j - 1]['jenis_kelamin'] = $this->input->post("jk_official$j")[$i];
			}
		}

		$this->UserModel->insertOfficial($official);
		$officialData = $this->UserModel->getOfficialData();

		for ($i = 0; $i < sizeof($reguLength); $i++) {
			$data[$i]['user_id'] = $this->session->userdata('id');
			$data[$i]['regu_id'] = $reguId[$i]['id'];
			$data[$i]['official_group'] = $officialData[$i]['official_group'];
			$data[$i]['total'] = $this->UserModel->getTotalHargaBeregu($reguId[$i]['id'], $officialData[$i]['id'])['harga'];
			$data[$i]['token'] = md5('tcrb2019' . $data[$i]['regu_id'] . $data[$i]['user_id']);

			$this->UserModel->insertPembayaranRegu($data[$i]);
		}

		$this->session->set_flashdata('message-user', "<script>Swal.fire({
			type: 'success',
			title: 'Berhasil',
			text: 'Data pendaftaran beregu berhasil masuk. Silahkan lanjut ke proses pembayaran',
		})</script>");
		redirect('user/pembayaran');
		// should redirect to pembayaran with carrying pemain + official + regu + pem_regu data's
	}

	public function pembayaran()
	{
		$data['title'] = 'Pembayaran';
		$data['user'] = $this->UserModel->getDataUser([
			'username' => $this->session->userdata['username']
		]);
		$data['full'] = $this->_checkProfileFull($data['user']);

    $username = $data['user']['username'];
    $id = $data['user']['id'];
		$data['check'] = $this->UserModel->checkPembayaranOrang($username) ? "orang" : ($this->UserModel->checkPembayaranRegu($username) ? "regu" : false);
    switch ($data['check']) {
      case 'orang':
        $data['pemain'] = $this->UserModel->getDataPembayaranPerorangan($id);
        $data['tot_harga'] = $this->UserModel->getTotalHargaPerorangan($id);
        $data['status'] = $this->UserModel->getStatusPembayaranPerorangan($id);
        break;
      case 'regu':
        $data['regu'] = $this->UserModel->getDataPendaftaranPerorangan($id);
        break;
      
      default:
        # code...
        break;
    }
    // print_r($data['pemain']);
    // return;
		/*
		 * <-- business logic -->
		 * + first, we need to check if this logged in user already done with pembayaran process
		 * 		if its return true then frontend show 'cetak struk' button
		 *  	else frontend show 'upload' button along with input upload
		 *
		 * + second, while check variables return true then 'cetak struk' button shown,
		 * 	 those actions should be sending an email into user with a body of the invoice
		 *
		 * + third, if check variables return false then 'upload' button shown,
		 * 	 those actions should be sending files with according to upload configuration setting
		 */


		$this->load->view('templates/header', $data);
		$this->load->view('templates/aside_user', $data);
		$this->load->view('user/pembayaran_view', $data);
		$this->load->view('templates/footer');
	}

	public function uploadBuktiPembayaran()
	{
		// html input file name should be named as bukti_bayar
		['username' => $username] = $this->session->userdata();

		$check = $this->UserModel->checkPembayaranOrang($username) ? "orang" : ($this->UserModel->checkPembayaranRegu($username) ? "regu" : false);
		if (!$check) return false;
		// this should return an error message instead of boolean, but its ok

		$where = array('user_id' => $this->session->userdata('id'));
		['token' => $token] = $this->UserModel->getDataPembayaran($check, $where);

		$this->doUpload('bukti_bayar', $token, $this->pembayaranPath);
	}

	public function sendAbsensiMail()
	{
		['email' => $email] = $this->UserModel->getDataUser([
			'username' => $this->session->userdata['username']
		]);

		$token = $this->_generateQrCode();

		/*
		 * hmm, lemme check this first, i think it will reproduce the same token ?
		 * so we must change this method's logic first
		 * okay, but can you read the function when this token has been inserted into database, please ?
		 * ...
		 */

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

		// header('Content-Type: ' . $qr->getContentType());
		$qr->writeFile(FCPATH . "/qrcode/$token.png");

		return $token;
	}
}
