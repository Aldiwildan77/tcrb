<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HomeController extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'Turnamen Catur Raja Brawijaya';
        $this->load->view('templates/header', $data);
        $this->load->view('home/home_view');
        $this->load->view('templates/footer');
    }
}
