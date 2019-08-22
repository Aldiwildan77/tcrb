<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if($this->session->userdata('name_admin') == null){
            redirect('admin');
        }

        $this->load->model('AdminModel');
    }

    public function index()
    {
        $data['user'] = $this->AdminModel->getAllDataPendaftaranUserPerorangan();
        $data['pemain'] = $this->AdminModel->getAllDataPendaftaranPerorangan();
        // print_r($result);
        // return;
        $this->load->view('admin/home_view', $data);
        for ($i=0; $i < 5; $i++) { 
            # code...
        }
    }
}