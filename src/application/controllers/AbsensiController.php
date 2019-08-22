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
		['status_bayar' => $data['status'], 'user_id' => $userId, 'nama_lengkap' => $nama] = $this->UserModel->getDataPembayaranWithPerorangan($token);

		$this->session->set_flashdata('validate', "$userId - $nama");
		$data['status'] = $data['status'] == 1 ? 'success' : 'error';
		$data['kategori'] = 'Perorangan';

		$this->load->view('templates/header', $data);
		$this->load->view('absensi/validasi_view', $data);
		$this->load->view('templates/footer');
	}

	public function validateReguTokenWithPembayaran($token)
	{
		$data['title'] = 'Validasi Regu';
		['status_bayar' => $data['status'], 'regu_id' => $reguId, 'nama' => $nama] = $this->UserModel->getDataPembayaranWithRegu($token);

		$this->session->set_flashdata('validate', "$reguId - $nama");
		$data['status'] = $data['status'] == 1 ? 'success' : 'error';
		$data['kategori'] = 'Beregu';

		$this->load->view('templates/header', $data);
		$this->load->view('absensi/validasi_view', $data);
		$this->load->view('templates/footer');
	}
}
