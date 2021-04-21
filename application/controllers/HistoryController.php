<?php

class HistoryController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // load BukuMode
        $this->load->model('HistoryModel');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Data Buku';
        $data['user'] = $this->session->userdata('user');

        $data['buku'] = $this->HistoryModel->getAllBuku();
        $this->load->view('v_historybuku', $data);
    }
}
