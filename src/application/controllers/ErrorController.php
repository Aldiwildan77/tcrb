<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ErrorController extends CI_Controller
{
    public function __construct()
    {
		parent::__construct();
    }

    public function index()
    {
        $this->load->view('errors/404');
    }

    public function jsError()
    {
      $this->load->view('errors/js-error');
    }
}