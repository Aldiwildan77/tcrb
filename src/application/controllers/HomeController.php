<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HomeController extends CI_Controller
{
	public function __construct()
	{
    parent::__construct();
    $this->load->model('AdminModel');
	}

	public function index()
	{
		$data['title'] = 'Home';
		// $output['instagram'] = $this->_loadInstagramPhotos();

		$this->load->view('templates/header', $data);
		$this->load->view('home/home_view');
		$this->load->view('templates/footer');
	}

	public function forceAdminLogin()
	{
		if (isset($_GET['r'])) {
			$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]');
			if ($this->form_validation->run() == false) {
				$data['title'] = 'Force Admin';
				$this->load->view('templates/header', $data);
				$this->load->view('user/force_admin_view');
				$this->load->view('templates/footer');
			}

			$password = $this->input->post('admin-password');
			$checkPassword = getenv('FORCE_ADMIN');

			if ($password === $checkPassword) {
				$userdata = array(
					'name_admin' => 'tcrbsans',
					'isAdmin' => true
				);

				$this->session->set_userdata($userdata);
				redirect('absensi');
			} else {
				redirect('');
			}
		}

		$this->session->sess_destroy();
		$data['title'] = 'Force Admin';
		$this->load->view('templates/header', $data);
		$this->load->view('user/force_admin_view');
		$this->load->view('templates/footer');
	}

	public function adminBayarLogin()
	{
		if ($this->session->userdata('namaAdmin') == 'adminBayar') {
			redirect('admin/home');
		}

		if ($this->session->userdata('id')) {
			redirect('');
		}

		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->load->view('admin/login_view');
		} else {
			$password = $this->input->post('password');
			$checkPassword = getenv('ADMIN');
			// echo $this->input->post('password');
			// return;
			if ($password == $checkPassword) {
				$userdata = array(
					'namaAdmin' => 'adminBayar',
					'isAdmin' => true
				);

				$this->session->set_userdata($userdata);
				redirect('admin/home');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Password salah
                </div>');
				redirect('admin');
			}
		}
  }

  public function lihatJumlahPendaftar()
  {
    $data['user'] = $this->AdminModel->getAllDataUser();
    $data['peroranganRapid'] = $this->AdminModel->getAllDataPemainPeroranganRapid();
    $data['peroranganBlitz'] = $this->AdminModel->getAllDataPemainPeroranganBlitz();
    $data['reguRapid'] = $this->AdminModel->getAllDataReguRapid();
    $data['reguBlitz'] = $this->AdminModel->getAllDataReguBlitz();
    $this->load->view('admin/lihat_jumlah_pendaftar', $data);
  }

	private function _loadInstagramPhotos()
	{
		$token = getenv('INSTA_TOKEN'); # token
		$count = 9; # total post

		// $curl = curl_init();
		// curl_setopt($curl, CURLOPT_URL, "https://api.instagram.com/v1/users/self/media/recent/?access_token=$token&count=$count");
		// curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		// $rawResult = curl_exec($curl);
    // curl_close($curl);

		$rawResult = file_get_contents("https://api.instagram.com/v1/users/self/media/recent/?access_token=$token&count=$count");
		$result = json_decode($rawResult, true);

		// print_r($result);
		// return;

		$output = [];
		for ($i = 0; $i < $count; $i++) {
			$output += array(
				$i => array(
					// 'url' => $result['data'][$i]['images']['low_resolution']['url'],
					'url'       => $result['data'][$i]['images']['standard_resolution']['url'],
					'width'     => $result['data'][$i]['images']['low_resolution']['width'],
					'height'    => $result['data'][$i]['images']['low_resolution']['height'],
					'nomer'     => $i,
					'link'      => $result['data'][$i]['link'],
					'caption'   => $result['data'][$i]['caption']['text']
				)
			);
		}

		return $output;
	}

	function dokumentasi()
	{
		$data['title'] = 'Dokumentasi';

		$this->load->view('templates/header', $data);
		$this->load->view('home/dokumentasi_view');
		$this->load->view('templates/footer');
	}

  function tataCara()
  {
    $data['title'] = 'Tata Cara Pendaftaran';
		$this->load->view('templates/header', $data);
		$this->load->view('home/tata_cara_view');
		$this->load->view('templates/footer');
  }

  function twibbon(){
    $data['title'] = 'Twibbon';
    $this->load->view('home/twibbon', $data);
	}

  function panitia(){
		$data['title'] = 'Pengenalan Panitia';
		$data['listPanitia'] = [
			"Kapel", "Wakapel", "Benpel", "Acara-s",
			"Acara", "DDM-s", "DDM", "Sponsor-s", "Sponsor", "Perkap-s",
			"Perkap", "Medko-s", "Medko", "Kestari-s", "Kestari", "IT-s",
			"IT", "Humas-s", "Humas", "SC-s", "SC", "PH-s", "PH"
		];
    $this->load->view('home/panitia', $data);
  }

	function line()
	{
		redirect('https://line.me/R/ti/p/@trm9176m');
	}

	function instagram()
	{
		redirect('https://www.instagram.com/tcrb_ub/');
	}

  function youtube()
	{
		redirect('https://www.youtube.com/channel/UCq-pgI0KWAISOnfwG-YkOFQ');
  }

  function twibbonManual(){
    redirect('https://drive.google.com/file/d/1-2Nwn75sLWO54hN4eWeyKORpty8GXAOh/view?usp=sharing');
  }
}
