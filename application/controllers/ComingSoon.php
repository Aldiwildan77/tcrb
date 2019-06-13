<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ComingSoon extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = "Turnamen Catur Raja Brawijaya";
        $this->load->view('comingSoon/comingSoon_view', $data);
    }

    public function form()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('fitur', 'Fitur', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['title'] = "Turnamen Catur Raja Brawijaya";
            $data['fitur'] = $this->input->post('fitur', true);
            $this->load->view('comingSoon/comingSoon_form', $data);
        } else {
            $data = [
                'nama' => $this->input->post('nama', true),
                'fitur' => $this->input->post('fitur', true)
            ];

            $this->db->insert('fitur', $data);
            $this->session->set_flashdata('message', 'dimasukkan');
            redirect('form');
        }
    }

    public function hasilForm()
    {
        $data['fitur'] = $this->db->get('fitur')->result_array();
        // var_dump($data['fitur']);
        // return;
        
        $data['i'] = 1;
        $this->load->view('comingSoon/comingSoon_hasil', $data);
    }
}
