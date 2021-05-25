<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Auth_model', 'auth');
    }

    private function _has_login()
    {
        if ($this->session->has_userdata('login_session')) {
            redirect('dashboard');
        }
    }

    public function index()
    {
        $this->_has_login();

        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Aplikasi';
            $this->template->load('templates/auth', 'auth/login', $data);
        } else {
            $input = $this->input->post(null, true);

            $cek_username = $this->auth->cek_username($input['username']);
            if ($cek_username) {
                $password = $this->auth->get_password($input['username']);
                if ($cek_username['password'] == $password) {
                    // $this->session->set_userdata('user', $cek_username);

                    $user_db = $this->auth->userdata($input['username']);
                    // $userdata = [
                    //     'user'  => $user_db['iduser'],
                    //     // 'role'  => $user_db['role'],
                    //     'timestamp' => time()
                    // ];
                    $this->session->set_userdata('login_session', $user_db);
                    redirect('dashboard');
                }
                set_pesan('password salah', false);
                redirect('auth');
            } else {
                set_pesan('username belum terdaftar', false);
                redirect('auth');
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('login_session');

        set_pesan('anda telah berhasil logout');
        redirect('auth');
    }
}
