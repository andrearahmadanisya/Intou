<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('AccountModel');
		$this->load->library('form_validation');
		$this->load->library('session');
	}

	public function index()
	{
		$data['judul'] = 'Login';
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('Login');
			$this->load->view('templates/footer');
		} else {
			$uname = $this->input->post('username', true);
			$user = $this->AccountModel->getAccountByUsername($uname);
			if ($user) {
				$pass = $this->input->post('password');
				if ($user['password'] == $pass) {
					$this->session->set_userdata('user', $user);
					redirect('BukuController');
				} else {
					redirect('LoginController'); //pass salah
				}
			} else {
				redirect('LoginController'); //email salah
			}
		}
	}
}
