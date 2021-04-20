<?php

class HomeController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// load HomeModel
		//$this->load->model('HomeModel');
	}

	public function index()
	{
		$data['judul'] = 'Home';
		$data['user'] = $this->session->userdata('user');

		$this->load->view('v_home', $data);
	}

	public function login()
	{
		$data['judul'] = 'Login';
		$this->load->view('Login');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('LoginController');
	}
}
