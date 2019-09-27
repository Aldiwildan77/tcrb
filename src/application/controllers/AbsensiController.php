<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AbsensiController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('isAdmin')) {
			show_error('Mohon maaf, Anda tidak memiliki akses ke URL yang coba Anda jangkau, halaman ini hanya bisa diakses ketika registrasi ulang', 403, '403 - Forbidden: Access is denied.');
		}

		$this->load->model('UserModel');
	}

	public function index()
	{
		echo "<script>
			alert('Connected as Admin');
			window.location.href='./'
		</script>";
	}

	public function validateOrangTokenWithPembayaran($token)
	{
		$data['title'] = 'Validasi Perorangan';
    $result = $this->UserModel->getDataPembayaranWithPerorangan($token);
    $data['status'] = $result['status_bayar'];
    $userId = $result['user_id'];
    $nama = $result['nama_lengkap'];

		$this->session->set_flashdata('validate', "Perorangan - $userId - $nama");
		$data['status'] = $data['status'] == 2 ? 'success' : 'error';
		$data['kategori'] = 'Perorangan';

		$this->load->view('templates/header', $data);
		$this->load->view('absensi/validasi_view', $data);
		$this->load->view('templates/footer');
	}

	public function validateReguTokenWithPembayaran($token)
	{
		$data['title'] = 'Validasi Regu';
    $result = $this->UserModel->getDataPembayaranWithRegu($token);
    $userId = $result['user_id'];
    $data['status'] = $result['status_bayar'];
    $nama = $result['nama_lengkap'];
    $regu = $this->UserModel->getDataReguByUserId($userId);
    // echo json_encode($regu);
    // return;
    $this->session->set_flashdata('validate', "Beregu - $userId - $nama");
    $data['regu'] = '<ul style="list-style-type:none">';
    foreach($regu as $row){
      $data['regu'] .= "<li>- ". $row['nama']."</li>";
    }
    $data['regu'] .= '<ul>';
    $this->session->set_flashdata('regu', $data['regu']);
		$data['status'] = $data['status'] == 2 ? 'success' : 'error';
		$data['kategori'] = 'Beregu';

		$this->load->view('templates/header', $data);
		$this->load->view('absensi/validasi_view', $data);
		$this->load->view('templates/footer');
	}
}
