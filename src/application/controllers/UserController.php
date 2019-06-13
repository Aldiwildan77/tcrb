<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');
        $this->load->model('LoginModel');

        if ($this->session->userdata('username') == null) {
            redirect('login');
        }
    }

    public function index()
    {
        $data['title'] = 'User';
        $data['user'] = $this->UserModel->getDataUser([
            'username' => $this->session->userdata['username']
        ]);
        $this->load->view('templates/header', $data);
        $this->load->view('user/user_view', $data);
        $this->load->view('templates/footer');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

    public function upload()
    {
        $data['title'] = 'Upload bukti pembayaran';

        $this->load->view('templates/header', $data);
        $this->load->view('user/uploadFile_view', $data);
        $this->load->view('templates/footer');
    }

    public function doUpload()
    {
        $config['upload_path']      = realpath('./bukti-bayar/');
        $config['allowed_types']    = 'png|jpeg|jpg';
        $config['file_name']        = $this->session->userdata('username');
        $config['remove_spaces']    = true;
        $config['overwrite']        = true;
        $config['max_sizes']        = '512';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('message', '<div class="alert alert-danger pb-0" role="alert">
            '.$error.'.            
            </div>');
            redirect('user');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Your file has been succesfully uploaded.
            </div>');
            $where = [
                'username' => $this->session->userdata('username')
            ];
            $update = [
                'bukti_bayar' => $this->upload->data()['file_name']
            ];
            $this->LoginModel->updateData($where, $update);

            redirect('user/upload');
        }
    }

    public function edit()
    {
        $data['title'] = 'Edit profile';
        $data['user'] = $this->UserModel->getDataUser([
            'username' => $this->session->userdata['username']
        ]);
        $this->load->view('templates/header', $data);
        $this->load->view('user/edit_view', $data);
        $this->load->view('templates/footer');
    }

}
