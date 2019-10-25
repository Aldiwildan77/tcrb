<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminController extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    if ($this->session->userdata('namaAdmin') == null) {
      redirect('admin');
    }

    if ($this->session->userdata('id')) {
      redirect('');
    }

    $this->load->model('AdminModel');
  }

  public function index()
  {
    $this->load->view('admin/home_view');
  }

  public function perorangan()
  {
    $rapid = 0;
    $blitz = 0;

    $arrPerorangan = [
      ['Belum bayar', 0],
      ['Belum divalidasi', 0],
      ['Sudah divalidasi', 0]
    ];


    $userPerorangan = $this->AdminModel->getAllDataPendaftaranUserPerorangan();
    $perorangan = $this->AdminModel->getAllDataPendaftaranPerorangan();

    for ($i = 0; $i < sizeof($userPerorangan); $i++) {
      if ($userPerorangan[$i]['status_bayar'] == 0) {
        $arrPerorangan[0][1]++;
      } elseif ($userPerorangan[$i]['status_bayar'] == 1) {
        $arrPerorangan[1][1]++;
      } else {
        $arrPerorangan[2][1]++;
      }
    }
    for ($i = 0; $i < sizeof($perorangan); $i++) {
      if (in_array($perorangan[$i]['kategori_id'], [1, 2, 13, 14, 17, 18])) {
        $rapid++;
      } elseif (in_array($perorangan[$i]['kategori_id'], [3, 4, 15, 16, 19, 20])) {
        $blitz++;
      }
    }
    // print_r($peroranganBlitz);
    // return;

    $data['arrPerorangan'] = $arrPerorangan;
    $data['rapid'] = $rapid;
    $data['blitz'] = $blitz;
    $this->load->view('admin/perorangan/index', $data);
  }

  public function peroranganSemua()
  {
    $data['user'] = $this->AdminModel->getAllDataPendaftaranUserPerorangan();
    $data['pemain'] = $this->AdminModel->getAllDataPendaftaranPerorangan();
    $data['count'] = 0;
    $this->load->view('admin/perorangan/semua', $data);
  }

  public function perorangan0()
  {
    $data['user'] = $this->AdminModel->getAllDataPendaftaranUserPerorangan();
    $data['pemain'] = $this->AdminModel->getAllDataPendaftaranPerorangan();
    $data['count'] = 0;
    $data['no'] = 1;
    // print_r($data['user']);
    // return;
    $this->load->view('admin/perorangan/0', $data);
  }

  public function perorangan1()
  {
    $data['user'] = $this->AdminModel->getAllDataPendaftaranUserPerorangan();
    $data['pemain'] = $this->AdminModel->getAllDataPendaftaranPerorangan();
    $data['count'] = 0;
    $data['no'] = 1;
    $this->load->view('admin/perorangan/1', $data);
  }

  public function perorangan2()
  {
    $data['user'] = $this->AdminModel->getAllDataPendaftaranUserPerorangan();
    $data['pemain'] = $this->AdminModel->getAllDataPendaftaranPerorangan();
    $data['count'] = 0;
    $data['no'] = 1;
    $this->load->view('admin/perorangan/2', $data);
  }

  public function beregu()
  {
    $rapid = 0;
    $blitz = 0;
    $arrBeregu = [
      ['Belum bayar', 0],
      ['Belum divalidasi', 0],
      ['Sudah divalidasi', 0]
    ];
    $userBeregu = $this->AdminModel->getAllDataPendaftaranUserBeregu();
    $beregu = $this->AdminModel->getAllDataPendaftaranRegu();
    for ($i = 0; $i < sizeof($userBeregu); $i++) {
      if ($userBeregu[$i]['status_bayar'] == 0) {
        $arrBeregu[0][1]++;
      } elseif ($userBeregu[$i]['status_bayar'] == 1) {
        $arrBeregu[1][1]++;
      } else {
        $arrBeregu[2][1]++;
      }
    }

    for ($i = 0; $i < sizeof($beregu); $i++) {
      if (in_array($beregu[$i]['kategori_id'], [5, 6, 7, 21])) {
        $rapid++;
      } elseif (in_array($beregu[$i]['kategori_id'], [8])) {
        $blitz++;
      }
    }

    // print_r($userBeregu);
    // return;
    $data['arrBeregu'] = $arrBeregu;
    $data['rapid'] = $rapid;
    $data['blitz'] = $blitz;

    $this->load->view('admin/beregu/index', $data);
  }

  public function bereguSemua()
  {
    $data['user'] = $this->AdminModel->getAllDataPendaftaranUserBeregu();
    $data['regu'] = $this->AdminModel->getAllDataPendaftaranRegu();
    $data['pemain'] = $this->AdminModel->getAllDataPendataranPemainRegu();
    $data['official'] = $this->AdminModel->getAllDataPendaftaranOfficialRegu();
    $data['count'] = 0;

    $this->load->view('admin/beregu/semua', $data);
  }

  public function user()
  {
    $data['user'] = $this->AdminModel->getAllDataUser();

    $this->load->view('admin/user', $data);
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect('admin');
  }

  public function validasiPembayaranPerorangan($id)
  {
    $data['user'] = $this->AdminModel->getDataUserUntukEmailByIdPendaftaran('orang', $id);
    $data['link'] = base_url('user/bukti-pendaftaran');
    $data['check'] = 'perorangan';
    if ($this->AdminModel->validasiPembayaranPerorangan($id)) {
      if ($this->_kirimEmail($data)) {
        $this->session->set_flashdata('message', "<script>Swal.fire({
					type: 'success',
					title: 'Berhasil',
					html: 'Pembayaran kategori perorangan dengan username <b>" . $data['user']['username'] . "</b>',
				})</script>");
        redirect('admin/orang');
      }
    }
  }

  public function validasiPembayaranBeregu($id)
  {
    $data['user'] = $this->AdminModel->getDataUserUntukEmailByIdPendaftaran('regu', $id);
    $data['link'] = base_url('user/bukti-pendaftaran');
    $data['check'] = 'beregu';
    if ($this->AdminModel->validasiPembayaranBeregu($id)) {
      if ($this->_kirimEmail($data)) {
        $this->session->set_flashdata('message', "<script>Swal.fire({
					type: 'success',
					title: 'Berhasil',
					html: 'Pembayaran kategori beregu dengan username <b>" . $data['user']['username'] . "</b>',
				})</script>");
        redirect('admin/regu');
      }
    }
  }

  private function recoveryConfig()
  {
    require_once 'src/application/helpers/Email.php';
    $mail = new Email();

    return $mail->getConfig();
  }

  private function _kirimEmail($data)
  {
    $msg = $this->load->view('templates/payment_accepted', $data, true);

    $this->load->library('email', $this->recoveryConfig());
    $this->email->from($this->recoveryConfig()['smtp_user'], 'Turnamen Catur Raja Brawijaya');
    $this->email->to($data['user']['email']);
    $this->email->subject('Pembayaran Diterima TCRB');
    $this->email->message($msg);
    return $this->email->send() ? true : false;
  }

  public function pemainRapid(){
    $data['pemain'] = $this->AdminModel->getAllDataPemainPeroranganRapidLunas();
    $data['kategori'] = 'Rapid';

    $this->load->view('admin/perorangan/pemain', $data);
  }

  public function pemainBlitz(){
    $data['pemain'] = $this->AdminModel->getAllDataPemainPeroranganBlitzLunas();
    $data['kategori'] = 'Blitz';

    $this->load->view('admin/perorangan/pemain', $data);
  }

  public function pemainBereguRapid(){
    $data['pemain'] = $this->AdminModel->getAllDataPemainBereguRapidLunas();    
    $data['kategori'] = 'Blitz';
    print_r($data['pemain']);
    return;

    $this->load->view('admin/perorangan/pemain', $data);
  }
}