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
            ' . $error . '.            
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
        $this->form_validation->set_rules('fullname', 'Nama Lengkap', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('instansi', 'Asal Instansi', 'trim|required');
        $this->form_validation->set_rules('role', 'Sebagai', 'trim|required');
        $this->form_validation->set_rules('telp', 'Nomer telepon', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit profile';
            $data['user'] = $this->UserModel->getDataUser([
                'username' => $this->session->userdata('username')
            ]);
            $this->load->view('templates/header', $data);
            $this->load->view('user/edit_view', $data);
            $this->load->view('templates/footer');
        } else {
            $fullname = $this->input->post('fullname');
            $email = $this->input->post('email');
            $instansi = $this->input->post('instansi');
            $role = $this->input->post('role');
            $telp = $this->input->post('telp');

            $data = [
                'nama_lengkap' => $fullname,
                'email' => $email,
                'instansi' => $instansi,
                'role' => $role,
                'no_telepon' => $telp,
            ];

            $this->UserModel->editProfile($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Edit profile berhasil
            </div>');
            redirect('user');
        }
    }

    public function doEdit()
    {
        $this->form_validation->set_rules('fullname', 'Nama Lengkap', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('instansi', 'Asal Instansi', 'trim|required');
        $this->form_validation->set_rules('role', 'Keterangan', 'trim|required');
        $this->form_validation->set_rules('telp', 'Nomer telepon', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit profile';
            $data['user'] = $this->UserModel->getDataUser([
                'username' => $this->session->userdata('username')
            ]);
            $this->load->view('templates/header', $data);
            $this->load->view('user/edit_view', $data);
            $this->load->view('templates/footer');
        } else {
            $fullname = $this->input->post('fullname');
            $email = $this->input->post('email');
            $instansi = $this->input->post('instansi');
            $role = $this->input->post('role');
            $telp = $this->input->post('telp');

            $data = [
                'nama_lengkap' => $fullname,
                'email' => $email,
                'instansi' => $instansi,
                'role' => $role,
                'no_telepon' => $telp,
            ];

            $this->UserModel->editProfile($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Edit profile success
            </div>');
            redirect('user');
        }
    }

    public function changePassword()
    {
        if (isset($_POST['inputOne']) && isset($_POST['inputTwo']) && isset($_POST['inputThree'])) {
            $oldPass = sha1($this->input->post('inputOne'));
            $newPass = sha1($this->input->post('inputTwo'));
            $confNewPass = sha1($this->input->post('inputThree'));
            $where = [
                'username' => $this->session->userdata('username')
            ];
            // Jika old password benar
            if ($this->UserModel->getDataUser($where)['password'] == $oldPass) {
                // Jika new pass sama dengan conf new pas
                if ($newPass == $confNewPass) {
                    $update = [
                        'password' => $newPass
                    ];
                    $this->UserModel->editProfile($update);
                    $this->session->set_flashdata('message', '<div class="alert alert-success col-12 text-center" role="alert">
                        Password anda berhasil diperbarui
                        </div>');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger col-12 text-center" role="alert">
                        Password baru anda tidak sesuai dengan password konfirmasi yang anda masukkan
                        </div>');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger col-12 text-center" role="alert">
                    Password lama anda salah
                    </div>');
            }
        }
        redirect('user');
    }
}
