<?php

class HistoryController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // load Model
        $this->load->model('Auth_model', 'admin');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'History Data Buku';
        $data['user'] = $this->session->userdata('user');

        $data['buku'] = $this->admin->getAllHistoryBuku();
        $this->template->load('templates/dashboard', 'buku/history', $data);
    }
}
