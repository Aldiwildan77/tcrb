<?php

use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Response\QrCodeResponse;

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
			redirect('masuk?r=' . $this->uri->segment(1, null) . '/' . $this->uri->segment(2, null));
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

			$data['sebagai'] = ['Pelatih', 'Manajer', 'Pemain'];

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
		$username = $this->session->userdata('username');
		$id = $this->session->userdata('id');
		$data['kategori'] = $this->UserModel->getAllKategori();
		$data['kategoriRegu'] = [
			'5' => 'Paket A Beregu Rapid',
			'6' => 'Paket B Beregu Rapid',
			'7' => 'Paket C Beregu Rapid',
			'21' => 'Paket D Beregu Rapid',
			'8' => 'Paket Blitz'
		];
		$data['kategoriPemain'] = [
			'1' => 'Presale 1 Rapid',
			'2' => 'Presale 2 Rapid',
			'3' => 'Presale 1 Blitz',
			'4' => 'Presale 2 Blitz',
			'13' => 'Presale 1 Rapid + Paket B Perorangan/Official',
			'14' => 'Presale 1 Rapid + Paket D Perorangan/Official',
			'15' => 'Presale 1 Blitz + Paket B Perorangan/Official',
			'16' => 'Presale 1 Blitz + Paket D Perorangan/Official',
			'17' => 'Presale 2 Rapid + Paket B Perorangan/Official',
			'18' => 'Presale 2 Rapid + Paket D Perorangan/Official',
			'19' => 'Presale 2 Blitz + Paket B Perorangan/Official',
			'20' => 'Presale 2 Blitz + Paket D Perorangan/Official'
		];
		$data['kategoriOfficial'] = [
			'9' => 'Paket A Perorangan/Official 2 orang',
			'10' => 'Paket B Perorangan/Official 1 orang',
			'11' => 'Paket C Perorangan/Official 2 orang',
			'12' => 'Paket D Perorangan/Official 1 orang'
		];
		$data['jenis_kelamin'] = [
			'L' => 'Laki-laki',
			'P' => 'Perempuan'
		];
		$check = $this->UserModel->checkPembayaranOrang($username) ? "orang" : ($this->UserModel->checkPembayaranRegu($username) ? "regu" : false);
		switch ($check) {
			case 'orang':
				$data['pemain'] = $this->UserModel->getDataPendaftaranPerorangan($id);
				$data['status'] = $this->UserModel->getStatusPembayaranPerorangan($id);
				$this->load->view('user/pendaftaran_update_orang', $data);
				break;
			case 'regu':
				$data['regu'] = $this->UserModel->getDataPendaftaranRegu($id);
				$data['pemain'] = $this->UserModel->getDataPendaftaranReguPemain($id);
				$data['official'] = $this->UserModel->getDataPendaftaranReguOfficial($id);
				$data['status'] = $this->UserModel->getDataPembayaranBeregu($id);
				// echo json_encode($data['pemain']);
				// return;
				$this->load->view('user/pendaftaran_update_regu', $data);
				break;
			default:
				$this->load->view('user/pendaftaran_view', $data);
				break;
		}
		$this->load->view('templates/footer');
	}

	// FUNCTION UNTUK TESTING UPLOAD FILE
	// public function upload()
	// {

	// 	if ($this->input->post('upload') != null) {
	// 		$size = sizeof($_FILES['files']['name']);
	// 		// echo $size;
	// 		for ($i = 0; $i < $size; $i++) {
	// 			$arr = [
	// 				'name' => $_FILES['files']['name'][$i],
	// 				'type' => $_FILES['files']['type'][$i],
	// 				'tmp_name' => $_FILES['files']['tmp_name'][$i],
	// 				'error' => $_FILES['files']['error'][$i],
	// 				'size' => $_FILES['files']['size'][$i],
	// 			];
	// 			$this->doUpload($arr, "file-ke-$i.jpg");
	// 		}
	// 	} else {

	// 		$this->load->view('user/upload');
	// 	}
	// }

	public function aturArrayUpload($inputName, $i)
	{
		$arr = [
			'name' => $_FILES[$inputName]['name'][$i],
			'type' => $_FILES[$inputName]['type'][$i],
			'tmp_name' => $_FILES[$inputName]['tmp_name'][$i],
			'error' => $_FILES[$inputName]['error'][$i],
			'size' => $_FILES[$inputName]['size'][$i],
		];

		return $arr;
	}

	public function doUpload($file, $fileName, $path)
	{
		// './players/foto/'
		$_FILES['file']['name']     = $file['name'];
		$_FILES['file']['type']     = $file['type'];
		$_FILES['file']['tmp_name'] = $file['tmp_name'];
		$_FILES['file']['error']     = $file['error'];
		$_FILES['file']['size']     = $file['size'];

		$config['upload_path']      = $path;
		$config['allowed_types']    = 'png|jpeg|jpg';
		$config['remove_spaces']    = true;
		$config['overwrite']        = true;
		$config['max_sizes']        = '1024';
		$config['file_name']         = $fileName;

		$this->load->library('upload');
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('file')) {
			$this->session->set_flashdata('message', "<script>Swal.fire({
				type: 'error',
				title: 'Maaf',
				text: 'Upload foto gagal',
			})</script>");
			redirect('user/pendaftaran');
		}
	}

	public function prosesPendaftaranPerorangan()
	{
		$pemain = [];
		$kategori = [];
		$pemainLength = $this->input->post('pemain');

		$pemainExist = $this->UserModel->checkUserPemain($this->session->userdata('id'));

		for ($i = 0; $i < sizeof($pemainLength); $i++) {
			$pemain[$i]['user_id'] = $this->session->userdata('id');
			$pemain[$i]['kategori_id'] = $this->input->post('kategori')[$i];
			$pemain[$i]['nama'] = $this->input->post('pemain')[$i];
			$pemain[$i]['nim'] = $this->input->post('nim')[$i];
			$pemain[$i]['jenis_kelamin'] = $this->input->post('jenisKelamin')[$i];
			$pemain[$i]['instansi'] = $this->input->post('instansi')[$i];
			$pemain[$i]['jurusan'] = $this->input->post('fakultas')[$i];
			$pemain[$i]['foto_diri'] = $this->_generateNamaFoto([$pemain[$i]['nim'], $pemain[$i]['nama']], $i + 1, 'PRG-FD');
			$pemain[$i]['foto_kartu_pelajar'] = $this->_generateNamaFoto([$pemain[$i]['nim'], $pemain[$i]['nama']], $i + 1, 'PRG-FKP');
			$kategori[$i] = $pemain[$i]['kategori_id'];

			$arrFotoDiri = $this->aturArrayUpload('foto_diri', $i);
			$arrFotoKartu = $this->aturArrayUpload('foto_kartu', $i);
			$this->doUpload($arrFotoDiri, $pemain[$i]['foto_diri'], $this->fotoPath);
			$this->doUpload($arrFotoKartu, $pemain[$i]['foto_kartu_pelajar'], $this->fotoPath);
		}

		if ($pemainExist != null) {
			$pemainID = $this->UserModel->getPemainIDbyUserID($this->session->userdata('id'));
			for ($i = 0; $i < sizeof($pemainID); $i++) {
				$pemain[$i]['id'] = $pemainID[$i]['id'];
			}
			$this->UserModel->updatePerorangan($pemain);
		} else {
			$this->UserModel->insertPerorangan($pemain);
		}

		if ($pemainExist == null) {
			$data = array(
				'user_id' => $this->session->userdata('id'),
				'total' => $this->UserModel->getTotalHargaPerorangan(),
				'token' => md5('perorangan' . $this->session->userdata('id') . 'tcrb' . sizeof($pemainLength))
			);
			$this->UserModel->insertPembayaranPerorangan($data);
		}

		if ($pemainExist != null) {
			$this->session->set_flashdata('message-user', "<script>Swal.fire({
        type: 'success',
        title: 'Berhasil',
        text: 'Data pendaftaran pemain berhasil diubah',
      })</script>");
			redirect('user/pembayaran');
		} else {
			$this->session->set_flashdata('message-user', "<script>Swal.fire({
        type: 'success',
        title: 'Berhasil',
        text: 'Data pendaftaran pemain berhasil masuk. Silahkan lanjut ke proses pembayaran',
      })</script>");
			redirect('user/pembayaran');
		}
		// should redirect to pembayaran with carrying pemain + pem_orang data's
	}

	private function _generateNamaFoto($arr = [], $i, $suffix)
	{
		return $this->session->userdata('id') . "-" . $arr[0] . "-$i-" . substr(str_replace(' ', '', $arr[1]), 0, 7) . '-' . $suffix . '.jpg';
	}

	public function prosesPendaftaranBeregu()
	{
		// print_r($this->input->post("paket_official"));
		// return;

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

		$reguExist = $this->UserModel->checkUserRegu($this->session->userdata('id'));
		if ($reguExist != null) {
			// echo "ada";
			$reguID = $this->UserModel->getReguIDbyUserID($this->session->userdata('id'));
			// print_r($reguID);
			for ($i = 0; $i < sizeof($reguLength); $i++) {
				$regu[$i]['id'] = $reguID[$i]['id'];
			}
			// print_r($regu);
			$this->UserModel->updateRegu($regu);
		} else {
			// echo "gk ada";
			$this->UserModel->insertRegu($regu);
		}
		// return;


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

				$arrFotoDiri = $this->aturArrayUpload("foto_diri$j", $i);
				$arrFotoKartu = $this->aturArrayUpload("foto_kartu$j", $i);
				$this->doUpload($arrFotoDiri, $pemain[$i][$j - 1]['foto_diri'], $this->fotoPath);
				$this->doUpload($arrFotoKartu, $pemain[$i][$j - 1]['foto_kartu_pelajar'], $this->fotoPath);
			}
		}


		if ($reguExist != null) {
			$pemainID = $this->UserModel->getPemainReguIDbyUserID($this->session->userdata('id'));
			$count = 0;
			for ($i = 0; $i < sizeof($reguLength); $i++) {
				for ($j = 1; $j < 5; $j++) {
					$updatePemain[$count]['nama'] = $pemain[$i][$j - 1]['nama'];
					$updatePemain[$count]['nim'] = $pemain[$i][$j - 1]['nim'];
					$updatePemain[$count]['jenis_kelamin'] = $pemain[$i][$j - 1]['jenis_kelamin'];
					$updatePemain[$count]['jurusan'] = $pemain[$i][$j - 1]['jurusan'];
					$updatePemain[$count]['foto_diri'] = $pemain[$i][$j - 1]['foto_diri'];
					$updatePemain[$count]['foto_kartu_pelajar'] = $pemain[$i][$j - 1]['foto_kartu_pelajar'];
					$updatePemain[$count]['alergi'] = $pemain[$i][$j - 1]['alergi'];
					$updatePemain[$count]['id'] = $pemainID[$count]['id'];
					$count++;
				}
			}
			// print_r($updatePemain);
			// return;
			$this->UserModel->updatePemainRegu($updatePemain);
		} else {
			// echo "gk ada";
			$this->UserModel->insertPemainRegu($pemain);
		}

		// return;
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

		if ($reguExist != null) {
			$officialID = $this->UserModel->getOfficialIDbyUserID($this->session->userdata('id'));
			// print_r($this->input->post('official1'));
			// return;
			$count = 0;
			for ($i = 0; $i < sizeof($reguLength); $i++) {
				for ($j = 1; $j < 3; $j++) {
					$updateOfficial[$count]['kategori_id'] = $official[$i][$j - 1]['kategori_id'];
					$updateOfficial[$count]['nama'] = $official[$i][$j - 1]['nama'];
					$updateOfficial[$count]['sebagai'] = $official[$i][$j - 1]['sebagai'];
					$updateOfficial[$count]['jenis_kelamin'] = $official[$i][$j - 1]['jenis_kelamin'];
					$updateOfficial[$count]['id'] = $officialID[$count]['id'];
					$count++;
				}
			}
			// echo json_encode($updateOfficial);
			// return;
			$this->UserModel->updateOfficial($updateOfficial);
		} else {
			$this->UserModel->insertOfficial($official);
		}
		// return;

		if ($reguExist == null) {
			$officialData = $this->UserModel->getOfficialData();
			for ($i = 0; $i < sizeof($reguLength); $i++) {
				$data[$i]['user_id'] = $this->session->userdata('id');
				$data[$i]['regu_id'] = $reguId[$i]['id'];
				$data[$i]['official_group'] = $officialData[$i]['official_group'];
				$data[$i]['total'] = $this->UserModel->getTotalHargaBeregu($reguId[$i]['id'], $officialData[$i]['id'])['harga'];
				$data[$i]['token'] = md5('tcrb2019' . $data[$i]['regu_id'] . $data[$i]['user_id']);

				$this->UserModel->insertPembayaranRegu($data[$i]);
			}
		}

		// return;
		if ($reguExist != null) {
			$this->session->set_flashdata('message-user', "<script>Swal.fire({
        type: 'success',
        title: 'Berhasil',
        text: 'Data pendaftaran beregu berhasil diubah',
      })</script>");
			redirect('user/pembayaran');
		} else {
			$this->session->set_flashdata('message-user', "<script>Swal.fire({
        type: 'success',
        title: 'Berhasil',
        text: 'Data pendaftaran beregu berhasil masuk. Silahkan lanjut ke proses pembayaran',
      })</script>");
			redirect('user/pembayaran');
		}
		// should redirect to pembayaran with carrying pemain + official + regu + pem_regu data's
	}

	public function pembayaran()
	{
		if (empty($_FILES['buktiBayar']['name'])) {
			$this->form_validation->set_message('required', 'Kolom {field} tidak boleh kosong.');
			$this->form_validation->set_rules('buktiBayar', 'bukti bayar', 'required');
		} else {
			$this->form_validation->set_rules('buktiBayar', 'bukti bayar', 'trim|xss_clean');
		}
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Pembayaran';
			$data['user'] = $this->UserModel->getDataUser([
				'username' => $this->session->userdata['username']
			]);

			$data['full'] = $this->_checkProfileFull($data['user']);

			$username = $data['user']['username'];
			$id = $data['user']['id'];
			$data['check'] = $this->UserModel->checkPembayaranOrang($username) ? "orang" : ($this->UserModel->checkPembayaranRegu($username) ? "regu" : 'null');
			// print_r($data['check']);
			// return;
			switch ($data['check']) {
				case 'orang':
					$data['pemain'] = $this->UserModel->getDataPembayaranPerorangan($id);
					$data['totalHarga'] = $this->UserModel->getTotalHargaPerorangan($id);
					$data['status'] = $this->UserModel->getStatusPembayaranPerorangan($id);
					break;
				case 'regu':
					$data['regu'] = $this->UserModel->getDataPembayaranBeregu($id);
					$data['pemain'] = $this->UserModel->getDataPendaftaranReguPemain($id);
					$data['jumlahOfficial'] = $this->UserModel->getJumlahReguOfficial($id);
					// print_r($data['jumlahOfficial']);
					// return;
					if (sizeof($data['jumlahOfficial']) > 0) {
						$data['official'] = $this->UserModel->getDataPendaftaranReguOfficialNotNull($id);
					}
					$data['totalHarga'] = $this->UserModel->getTotalBayarRegu($id);
					$data['p'] = 0;
					break;
				default:
					# code...
					break;
			}
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
		} else {

			$username = $this->session->userdata('username');
			$id = $this->session->userdata('id');

			$check = $this->UserModel->checkPembayaranOrang($username) ? "orang" : ($this->UserModel->checkPembayaranRegu($username) ? "regu" : false);
			if (!$check) return false;
			// this should return an error message instead of boolean, but its ok

			$where = array('user_id' => $this->session->userdata('id'));
			$token = $this->UserModel->getDataPembayaran($check, $where)['token'];

			// $arrBuktiBayar = $this->aturArrayUpload($this->input->post('buktiBayar'), 0);
			// $this->doUpload($arrBuktiBayar, "$username.jpg", $this->pembayaranPath);
			$config['upload_path']      = $this->pembayaranPath;
			$config['allowed_types']    = 'png|jpeg|jpg';
			$config['remove_spaces']    = true;
			$config['overwrite']        = true;
			$config['max_sizes']        = '1024';
			$config['file_name']         = "$username.jpg";

			$this->load->library('upload');
			$this->upload->initialize($config);
			if ($this->upload->do_upload('buktiBayar')) {
				$arrUpdate = ['bukti_bayar' => "$username.jpg", 'status_bayar' => 1, 'tanggal_bayar' => date("Y-m-d")];
				$this->UserModel->updatePembayaran($check, $arrUpdate, $id);
				$this->session->set_flashdata('message-user', "<script>Swal.fire({
					type: 'success',
					title: 'Berhasil',
					text: 'Bukti bayar berhasil disimpan. Silahkan menunggu hingga pembayaran anda divalidasi oleh admin',
				})</script>");
				redirect('user/pembayaran');
			}
		}
	}

	public function sendAbsensiMail()
	{
		$email = $this->UserModel->getDataUser([
			'username' => $this->session->userdata['username']
		])['email'];

		$token = $this->_generateQrCode('adsa');

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

	public function halamanGeneratePDF(){
		$username = $this->session->userdata('username');
		$check = $this->UserModel->checkPembayaranOrang($username) ? "orang" : ($this->UserModel->checkPembayaranRegu($username) ? "regu" : false);
		$where = array('user_id' => $this->session->userdata('id'));
		$token = $this->UserModel->getDataPembayaran($check, $where)['token'];
		$data['data']['user'] = $this->UserModel->getDataUser([
			'username' => $username
		]);
		$id = $data['data']['user']['id'];
		if ($check == "orang") {
			$data['data']['pemain'] = $this->UserModel->getDataPembayaranPerorangan($id);
			$data['data']['totalHarga'] = $this->UserModel->getTotalHargaPerorangan($id);
			$data['data']['status'] = $this->UserModel->getStatusPembayaranPerorangan($id);
			if($data['data']['status']['status_bayar'] != 2){
				$this->session->set_flashdata('message-user', "<script>Swal.fire({
					type: 'error',
					title: 'Error',
					text: 'Pembayaran Anda belum lunas atau belum divalidasi oleh Admin',
				})</script>");
				redirect('user/pembayaran');
			}
		} else {
			$data['data']['regu'] = $this->UserModel->getDataPembayaranBeregu($id);
			$data['data']['pemain'] = $this->UserModel->getDataPendaftaranReguPemain($id);
			$data['data']['jumlahOfficial'] = $this->UserModel->getJumlahReguOfficial($id);
			if (sizeof($data['data']['jumlahOfficial']) > 0) {
				$data['data']['official'] = $this->UserModel->getDataPendaftaranReguOfficialNotNull($id);
			}
			if($data['data']['regu'][0]['status_bayar'] != 2){
				$this->session->set_flashdata('message-user', "<script>Swal.fire({
					type: 'error',
					title: 'Error',
					text: 'Pembayaran Anda belum lunas atau belum divalidasi oleh Admin',
				})</script>");
				redirect('user/pembayaran');
			}
		}
		$data['username'] = $username;
		$data['check'] = $check;
		$data['token'] = $token;
		// print_r($data['token']);
		// return;
		$this->load->view('user/generate_pdf', $data);
	}

	public function generateQrCode(){

		$check = $this->input->get('check');
		$token = $this->input->get('token');

		$qr = new QrCode();
		$qr->setText("https://tcrb.ub.ac.id/qr?data=$check/$token");
		$qr->setSize(200);
		$qr->setErrorCorrectionLevel(new ErrorCorrectionLevel(ErrorCorrectionLevel::HIGH));
		$qr->setForegroundColor(array('r' => 0, 'g' => 0, 'b' => 0, 'a' => 0));
		$qr->setBackgroundColor(array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 0));
		$qr->setMargin(-2);
		$qr->setLogoPath(FCPATH . '/assets/img/logo.png');
		$qr->setLogoSize(45, 45);

		header('Content-Type: ' . $qr->getContentType());
		echo $qr->writeString();
	}

	private function _generateQrCode($check)
	{

		$where = array('user_id' => $this->session->userdata('id'));
		$token = $this->UserModel->getDataPembayaran($check, $where)['token'];

		// $qr = new QrCode();
		// $qr->setText(base_url("/absensi/$check/$token"));
		// $qr->setSize(200);
		// $qr->setErrorCorrectionLevel(new ErrorCorrectionLevel(ErrorCorrectionLevel::HIGH));
		// $qr->setForegroundColor(array('r' => 0, 'g' => 0, 'b' => 0, 'a' => 0));
		// $qr->setBackgroundColor(array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 0));
		// $qr->setLogoPath(FCPATH . '/assets/img/logo.png');
		// $qr->setLogoSize(45, 45);

		// header('Content-Type: ' . $qr->getContentType());
		// echo $qr->writeString();
		// $qr->writeFile(FCPATH . "/qrcode/$token.png");

		// return $token;
		// $response = new QrCodeResponse($qr);
		// return $response;
	}

	public function generatePDF()
	{
		$username = $this->session->userdata('username');
		$check = $this->UserModel->checkPembayaranOrang($username) ? "orang" : ($this->UserModel->checkPembayaranRegu($username) ? "regu" : false);
		$where = array('user_id' => $this->session->userdata('id'));
		$token = $this->UserModel->getDataPembayaran($check, $where)['token'];
		$data['user'] = $this->UserModel->getDataUser([
			'username' => $username
		]);
		$id = $data['user']['id'];
		if ($check == "orang") {
			$data['pemain'] = $this->UserModel->getDataPembayaranPerorangan($id);
			$data['totalHarga'] = $this->UserModel->getTotalHargaPerorangan($id);
			$data['status'] = $this->UserModel->getStatusPembayaranPerorangan($id);
			if($data['status']['status_bayar'] != 2){
				$this->session->set_flashdata('message-user', "<script>Swal.fire({
					type: 'error',
					title: 'Error',
					text: 'Pembayaran Anda belum lunas atau belum divalidasi oleh Admin',
				})</script>");
				redirect('user/pembayaran');
			}
			$this->generatePDFPerorangan($username, $check, $token, $data);
		} else {
			$data['regu'] = $this->UserModel->getDataPembayaranBeregu($id);
			$data['pemain'] = $this->UserModel->getDataPendaftaranReguPemain($id);
			$data['jumlahOfficial'] = $this->UserModel->getJumlahReguOfficial($id);
			if (sizeof($data['jumlahOfficial']) > 0) {
				$data['official'] = $this->UserModel->getDataPendaftaranReguOfficialNotNull($id);
			}
			if($data['regu'][0]['status_bayar'] != 2){
				$this->session->set_flashdata('message-user', "<script>Swal.fire({
					type: 'error',
					title: 'Error',
					text: 'Pembayaran Anda belum lunas atau belum divalidasi oleh Admin',
				})</script>");
				redirect('user/pembayaran');
			}
			$this->generatePDFBeregu($username, $check, $token, $data);
		}
	}

	public function generatePDFPerorangan($username, $check, $token, $data)
	{
		require_once APPPATH . "/third_party/FPDF/fpdf.php";
		require_once APPPATH . "/third_party/FPDF/qr-code/qrcode.class.php";

		$pdf = new FPDF('P', 'cm', 'A4');
		$pdf->AddPage();
		$pdf->SetFont('Arial', 'B', 12);
		$pdf->Image(base_url('assets/img/pdf/perorangan.png'), 0, 0, 21);

		$pdf->setXY(7.1, 4.95);
		$pdf->write(0, $data['user']['nama_lengkap']);
		$pdf->setXY(7.1, 5.65);
		$pdf->write(0, $data['user']['instansi']);
		$pdf->setXY(7.1, 6.45);
		$pdf->write(0, $data['user']['no_telepon']);
		$pdf->setXY(7.1, 7.25);
		$pdf->write(0, $data['status']['tanggal_bayar']);

		// QRCode
		$qr = new QRcode(base_url("absensi/$check/$token"), "H");
		$qr->displayFPDF($pdf, 15.55, 4.45, 3.15);

		// Colors, line width and bold font
		$pdf->SetFillColor(100, 100, 100);
		$pdf->SetTextColor(0);
		$pdf->SetDrawColor(0, 0, 0);
		$pdf->SetLineWidth(.03);
		$pdf->SetFont('', 'B', 11);
		// Header
		$header = ['No', 'Nama Pemain', 'Kategori'];
		$w = array(1, 7.5, 8);
		$pdf->setXY(2.3, 10.8);
		for ($i = 0; $i < count($header); $i++)
			$pdf->Cell($w[$i], 0.8, $header[$i], 1, 0, 'C', true);
		$pdf->Ln();
		$pdf->SetTextColor(0);
		$pdf->SetFont('', '', 10);
		// Data
		$hT = 11.6;
		$i = 1;
		foreach ($data['pemain'] as $row) {
			$pdf->SetXY(2.3,  $hT);
			$pdf->Cell($w[0], 1.5, $i++, 1, 0, 'L');
			$pdf->SetXY(2.3 + $w[0],  $hT);
			$pdf->Cell($w[1], 1.5, $row['nama_pemain'], 1, 0, 'L');
			$pdf->SetXY(2.3 + $w[0] + $w[1],  $hT);
			$pdf->Cell($w[2], 1.5, $row['nama_kategori'], 1, 0, 'L');
			$pdf->Ln();
			$hT += 1.5;
		}
		$pdf->Output('I', "Bukti-Pendaftaran-TCRB-$username.pdf");
	}

	public function generatePDFBeregu($username, $check, $token, $data)
	{
		require_once APPPATH . "/third_party/FPDF/fpdf.php";
		require_once APPPATH . "/third_party/FPDF/qr-code/qrcode.class.php";

		$pdf = new FPDF('P', 'cm', 'A4');
		$pdf->AddPage();
		$pdf->SetFont('Arial', 'B', 12);
		$pdf->Image(base_url('assets/img/pdf/beregu.png'), 0, 0, 21);

		$pdf->setXY(7.1, 4.95);
		$pdf->write(0, $data['user']['nama_lengkap']);
		$pdf->setXY(7.1, 5.65);
		$pdf->write(0, $data['user']['instansi']);
		$pdf->setXY(7.1, 6.45);
		$pdf->write(0, $data['user']['no_telepon']);
		$pdf->setXY(7.1, 7.25);
		$pdf->write(0, $data['regu'][0]['tanggal_bayar']);

		// QRCode
		$qr = new QRcode(base_url("absensi/$check/$token"), "H");
		$qr->displayFPDF($pdf, 15.55, 4.45, 3.15);

		// Colors, line width and bold font
		$pdf->SetFillColor(100, 100, 100);
		$pdf->SetTextColor(0);
		$pdf->SetDrawColor(0, 0, 0);
		$pdf->SetLineWidth(.03);
		$pdf->SetFont('', 'B', 11);
		// Header
		$header = ['No', 'Nama Regu', 'Kategori'];
		$w = array(1, 7.5, 8);
		$pdf->setXY(2.3, 10.8);
		for ($i = 0; $i < count($header); $i++)
			$pdf->Cell($w[$i], 0.8, $header[$i], 1, 0, 'C', true);
		$pdf->Ln();
		$pdf->SetTextColor(0);
		$pdf->SetFont('', '', 10);
		// Data
		$hT = 11.6;
		$i = 1;
		foreach ($data['regu'] as $row) {
			$pdf->SetXY(2.3,  $hT);
			$pdf->Cell($w[0], 1.5, $i++, 1, 0, 'L');
			$pdf->SetXY(2.3 + $w[0],  $hT);
			$pdf->Cell($w[1], 1.5, $row['nama'], 1, 0, 'L');
			$pdf->SetXY(2.3 + $w[0] + $w[1],  $hT);
			$pdf->Cell($w[2], 1.5, $row['namaPaket'], 1, 0, 'L');
			$pdf->Ln();
			$hT += 1.5;
		}
		if (sizeof($data['jumlahOfficial']) > 0) {
			$header = ['No', 'Nama Official', 'Kategori'];
			$w = array(1, 7.5, 8);
			$pdf->setXY(2.3, 22);
			for ($i = 0; $i < count($header); $i++)
				$pdf->Cell($w[$i], 0.8, $header[$i], 1, 0, 'C', true);
			$pdf->Ln();
			$pdf->SetTextColor(0);
			$pdf->SetFont('', '', 10);
			// Data
			$hT = 22.8;
			$i = 1;
			foreach ($data['official'] as $row) {
				if($row['nama'] != null){
					$pdf->SetXY(2.3,  $hT);
					$pdf->Cell($w[0], 1.2, $i++, 1, 0, 'L');
					$pdf->SetXY(2.3 + $w[0],  $hT);
					$pdf->Cell($w[1], 1.2, $row['nama'], 1, 0, 'L');
					$pdf->SetXY(2.3 + $w[0] + $w[1],  $hT);
					$pdf->Cell($w[2], 1.2, $row['namaPaket'], 1, 0, 'L');
					$pdf->Ln();
					$hT += 1.2;
				}
			}
		}


		$pdf->Output('I', "Bukti-Pendaftaran-TCRB-$username.pdf");
	}
}
