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
  
  public function perorangan(){
    $data['user'] = $this->AdminModel->getAllDataPendaftaranUserPerorangan();
    $data['pemain'] = $this->AdminModel->getAllDataPendaftaranPerorangan();
    $data['count'] = 0;
    $this->load->view('admin/perorangan', $data);
  }
  
  public function beregu(){
    $data['user'] = $this->AdminModel->getAllDataPendaftaranUserBeregu();
    $data['regu'] = $this->AdminModel->getAllDataPendaftaranRegu();
    $data['pemain'] = $this->AdminModel->getAllDataPendataranPemainRegu();
    $data['official'] = $this->AdminModel->getAllDataPendaftaranOfficialRegu();
    $data['count'] = 0;

    $this->load->view('admin/beregu', $data);
  }

  public function user(){
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
}
