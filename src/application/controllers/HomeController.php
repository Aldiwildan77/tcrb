<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HomeController extends CI_Controller
{
    
    public function index()
    {
        // $this->view->load('templates/header');
        $this->view->load('home/home_view');
        // $this->view->load('templates/footer');
    }
}
