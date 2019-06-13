<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('loginModel');

        if ($this->session->userdata('username') != null) {
            redirect('user');
        }

        date_default_timezone_set("Asia/Jakarta");
        $time1 = date('d/m/Y'); 
        $time2 = '16/07/2019';
        if($time1 < $time2){ // Tanggal sekarang belum melewati tanggal yang telah ditentukan
            redirect(base_url());
        }    
    }

    public function index()
    {
        $this->form_validation->set_rules('input', 'Username or Email', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $this->load->view('templates/header', $data);
            $this->load->view('login/login_view');
            $this->load->view('templates/footer');
        } else {
            $input = strtolower($this->input->post('input'));
            $password = sha1($this->input->post('password'));
            $data = [
                'user' => $input,
                'password' => $password
            ];
            if ($this->loginModel->login($data)) {
                $data = $this->loginModel->login($data);
                if ($this->loginModel->checkStatusAktif(['id' => $data['id']])) {
                    $array = [
                        'id' => $data['id'],
                        'username' => $data['username'],
                        'fullname' => $data['nama_lengkap']
                    ];
                    $this->session->set_userdata($array);
                    redirect('user');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Your account has not been activated. Please check your email.
                    </div>');
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                The username or password is incorrect.
                </div>');
                redirect('login');
            }
        }
    }

    public function register()
    {
        $this->form_validation->set_rules('fullname', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]|max_length[16]|trim', [
            'is_unique' => 'This username has already taken.'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]|trim', [
            'is_unique' => 'This email has already registered.'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Register';
            $this->load->view('templates/header', $data);
            $this->load->view('login/register_view');
            $this->load->view('templates/footer');
        } else {
            $fullname = $this->input->post('fullname');
            $username = strtolower($this->input->post('username'));
            $email = $this->input->post('email');
            $password = sha1($this->input->post('password'));
            $kode_aktivasi = md5('registertcrbbcc19' . $username);

            $data = [
                'nama_lengkap' => $fullname,
                'username' => $username,
                'email' => $email,
                'password' => $password,
                'kode_aktivasi' => $kode_aktivasi
            ];

            $this->loginModel->insertData($data);

            if ($this->sendActivationEmail($username)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Your account has been created. Please check your email to activate your account.
                </div>');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Send activation email failed. Please contact our support at <b>admin@tcrb.ub.ac.id</b>
                </div>');
            }
            redirect('login');
        }
    }

    public function sendActivationEmail($username)
    {
        $this->load->model('userModel');

        $data = [
            'username' => $username
        ];

        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'no.reply.tcrb@gmail.com',
            'smtp_pass' => 'apayaenaknya123',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];

        $dataUser = $this->userModel->getDataUser($data);
        $data['username'] = $dataUser['username'];
        $data['email'] = $dataUser['email'];
        $data['link'] = base_url('activate/' . $dataUser['kode_aktivasi']);
        $msg = $this->load->view('templates/activation_email', $data, true);

        $this->load->library('email', $config);
        $this->email->from('no.reply.tcrb@gmail.com', 'Turnamen Catur Raja Brawijaya');
        $this->email->to($dataUser['email']);
        $this->email->subject('Account Activation');
        $this->email->message($msg);
        return $this->email->send() ? true : false;
    }

    public function activate($kode)
    {
        $kodeAktivasi = $kode;
        $data = [
            'kode_aktivasi' => $kodeAktivasi
        ];
        if ($this->loginModel->checkActivationCode($data)) {
            if ($this->loginModel->checkStatusAktif($data)) {
                $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">
                Your account is already activated.
                </div>');
                redirect('login');
            } else {
                $update = [
                    'status_aktif' => 1
                ];
                $this->loginModel->updateData($data, $update);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Your account has been activated. You can login now.
                </div>');
                redirect('login');
            }
        } else {
            echo "Your link is incorrect";
        }
    }

    public function forgetPassword()
    {
        $this->form_validation->set_rules('input', 'Username or email', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Recovery';
            $this->load->view('templates/header', $data);
            $this->load->view('login/recovery_view');
            $this->load->view('templates/footer');
        } else {
            $input = $this->input->post('input');
            $dataUser = $this->loginModel->recovery($input);
            if ($dataUser) {
                if ($this->sendRecoveryEmail($dataUser)) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    We\'ve sent you an email with further details on how to recovery your account.
                    </div>');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Send recovery email failed. Please contact our support at <b>admin@tcrb.ub.ac.id</b>
                    </div>');
                }
                redirect('login');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Sorry we can\'t find that username or email. Please enter the correct username or email.
                </div>');
                redirect('recovery');
            }
        }
    }


    public function sendRecoveryEmail($dataUser)
    {
        $recoveryCode = md5('resettcrbbcc' . $dataUser['password']);
        $this->loginModel->setRecoveryCode($recoveryCode);

        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'no.reply.tcrb@gmail.com',
            'smtp_pass' => 'apayaenaknya123',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];

        $data['username'] = $dataUser['username'];
        $data['link'] = base_url('recovery/reset/' . $recoveryCode);
        $msg = $this->load->view('templates/recovery_email', $data, true);

        $this->load->library('email', $config);
        $this->email->from('no.reply.tcrb@gmail.com', 'Turnamen Catur Raja Brawijaya');
        $this->email->to($dataUser['email']);
        $this->email->subject('Recovery Account');
        $this->email->message($msg);
        $this->email->send();
    }

    public function reset($code)
    {
        if ($code != null) {
            $dataUser = $this->loginModel->verifyRecoveryCode($code);
            if ($dataUser != null) {
                $this->form_validation->set_rules('password', 'Password', 'trim|required');
                $this->form_validation->set_rules('passconf', 'Repeat password', 'trim|required|matches[password]');
                if ($this->form_validation->run() == false) {
                    $data['title'] = 'Reset Password';
                    $data['hash'] = $code;
                    $data['username'] = $dataUser['username'];
                    $data['email'] = $dataUser['email'];
                    $this->load->view('templates/header', $data);
                    $this->load->view('login/reset_view', $data);
                    $this->load->view('templates/footer');
                } else {
                    $hash = $this->input->post('hash');
                    $username = strtolower($this->input->post('username'));
                    $password = sha1($this->input->post('password'));

                    if (!isset($_POST['hash']) || strcasecmp($hash, $code) != 0) {
                        die('Error updating your password');
                    }
                    $data = [
                        'recoveryCode' => $code,
                        'username' => $username,
                        'password' => $password,
                    ];

                    $status = $this->loginModel->updatePassword($data);
                    if ($status) {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        Error updating your password. Please contact <b>admin@tcrb.ub.ac.id</b></small>.
                        </div>');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        Your password has been updated! You can login with your new password.
                        </div>');
                    }
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Your link has expired or incorrect. Please request a new one.
                </div>');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Your link has expired or incorrect. Please request a new one.
            </div>');
            redirect('login');
        }
    }
}
