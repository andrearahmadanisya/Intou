<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();

        $this->load->model('Auth_model', 'admin');
    }

    public function index()
    {
        $data['title'] = "Dashboard";
        $data['buku'] = $this->admin->count('buku');
        $data['transaksimsk'] = $this->admin->count('transaksimsk');
        $data['transaksipjl'] = $this->admin->count('transaksipjl');
        $data['supplier'] = $this->admin->count('supplier');
        $data['pelanggan'] = $this->admin->count('pelanggan');
        $data['account'] = $this->admin->count('account');
        $data['stok'] = $this->admin->sum('buku', 'stok');
        $data['buku_min'] = $this->admin->min('buku', 'stok', 10);
        $data['transaksi'] = [
            'transaksimsk' => $this->admin->getbukuMasuk(5),
            'transaksipjl' => $this->admin->getbukuKeluar(5)
        ];

        // Line Chart
        $bln = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
        $data['cbm'] = [];
        $data['cbk'] = [];

        foreach ($bln as $b) {
            $data['cbm'][] = $this->admin->chartbukuMasuk($b);
            $data['cbk'][] = $this->admin->chartbukuKeluar($b);
        }

        $this->template->load('templates/dashboard', 'dashboard', $data);
    }
}
