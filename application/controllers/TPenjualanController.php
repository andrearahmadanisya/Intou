<<<<<<< Updated upstream
<?php

class TPenjualanController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // load BukuMode
        $this->load->model('TPenjualanModel');
        $this->load->library('form_validation');
        $this->load->helper('date');
    }

    public function index()
    {
        $data['user'] = $this->session->userdata('user');

        $data['transaksipjl'] = $this->TPenjualanModel->getAllPenjualan();
        $this->load->view('v_transaksipenjualan', $data);
    }

    public function addPenjualan()
    {
        $this->form_validation->set_rules('judulbuku', 'judulbuku', 'required');
        $this->form_validation->set_rules('qty', 'qty', 'required');
        $this->form_validation->set_rules('biayakirim', 'biayakirim', 'required');
        $this->form_validation->set_rules('hargapcs', 'hargapcs', 'required');
        $this->form_validation->set_rules('hargatotal', 'hargatotal', 'required');
        $this->form_validation->set_rules('tgltransaksi', 'tgltransaksi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = 'Data';
            $data['transaksipjl'] = $this->TPenjualanModel->getAllPenjualan();

            $this->load->view('v_transaksipenjualan');
        } else {
            date_default_timezone_set('Asia/Jakarta');
            $now = date(DATE_RSS, time());
            $format = "Y-m-d H:i a";

            $add = [
                "idpenjualan" => '',
                "judulbuku" => $this->input->post('judulbuku', true),
                "qty" => $this->input->post('qty', true),
                "hargapcs" => $this->input->post('hargapcs', true),
                "biayakirim" => $this->input->post('biayakirim', true),
                "hargatotal" => $this->input->post('hargatotal', true),
                "tgltransaksi" => date($format)
            ];
            $this->TPenjualanModel->addPenjualan($add);
        }
        redirect('TPenjualanController');
    }

    public function update($id)
    {
        $data['judul'] = 'Buku';
        $data['transaksipjl'] = $this->TPenjualanModel->getAllPenjualan();
        //from library form_validation
        $this->form_validation->set_rules('judulbuku', 'judulbuku', 'required');
        $this->form_validation->set_rules('qty', 'qty', 'required');
        $this->form_validation->set_rules('hargapcs', 'hargapcs', 'required');
        $this->form_validation->set_rules('biayakirim', 'biayakirim', 'required');
        $this->form_validation->set_rules('hargatotal', 'hargatotal', 'required');
        $this->form_validation->set_rules('tgltransaksi', 'tgltransaksi', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('v_transaksipenjualan', $data);
        } else {
            date_default_timezone_set('Asia/Jakarta');
            $format = "Y-m-d H:i a";
            $update = [
                "idbuku" => $id,
                "judulbuku" => $this->input->post('judulbuku', true),
                "qty" => $this->input->post('qty', true),
                "hargatotal" => $this->input->post('hargatotal', true),
                "hargapcs" => $this->input->post('hargapcs', true),
                "biayakirim" => $this->input->post('biayakirim', true),
                "tgltransaksi" => date($format)
            ];
            $this->TPenjualanModel->updatepenjualan($id, $update);
            redirect('TPenjualanController');
        }
    }
    public function delete($id)
    {
        $this->TPenjualanModel->deletepenjualan($id);
        redirect('TPenjualanController');
    }
}
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TPenjualanController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();

        $this->load->model('Auth_model', 'admin');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "Penjualan Buku";
        $data['transaksipjl'] = $this->admin->getbukuKeluar();
        $this->template->load('templates/dashboard', 'bukujual/data', $data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('tanggal_keluar', 'Tanggal Keluar', 'required|trim');
        $this->form_validation->set_rules('id_buku', 'buku', 'required');
        $this->form_validation->set_rules('idpelanggan', 'Pelanggan', 'required');
        $this->form_validation->set_rules('qty', 'jumlah keluar', 'required|trim|numeric|greater_than[0]');

        // $input = $this->input->post('id_buku', true);
        // $stok = $this->admin->get('buku', ['idbuku' => $input])['stok'];
        // $stok_valid = $stok + 1;

        // $this->form_validation->set_rules(
        //     'qty',
        //     'Jumlah Keluar',
        //     "required|trim|numeric|greater_than[0]|less_than[{$stok_valid}]",
        //     [
        //         'less_than' => "Jumlah Keluar tidak boleh lebih dari {$stok}"
        //     ]
        // );
    }

    public function add()
    {
        $this->_validasi();
        if ($this->form_validation->run() == false) {
            $data['title'] = "Penjualan Buku";
            $data['pelanggan'] = $this->admin->get('pelanggan');
            $data['buku'] = $this->admin->get('buku', null, ['stok >' => 0]);

            // Mendapatkan dan men-generate kode transaksi barang keluar
            // $kode = 'TPJL-' . date('ymd');
            $kode_terakhir = $this->admin->getMax('transaksipjl', 'idpenjualan');
            $kode_tambah = substr($kode_terakhir, -4, 4);
            $kode_tambah++;
            $number = str_pad($kode_tambah, 4, '0', STR_PAD_LEFT);
            $data['idpenjualan'] = 'TPJ' . $number;

            $this->template->load('templates/dashboard', 'bukujual/add', $data);
        } else {
            $input = $this->input->post(null, true);
            $insert = $this->admin->insert('transaksipjl', $input);

            if ($insert) {
                set_pesan('data berhasil disimpan.');
                redirect('TPenjualanController');
            } else {
                set_pesan('Opps ada kesalahan!');
                redirect('TPenjualanController/add');
            }
        }
    }

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Transaksi Penjualan";
            $data['pelanggan'] = $this->admin->get('pelanggan');
            $data['buku'] = $this->admin->get('buku');
            $data['transaksipjl'] = $this->admin->get('transaksipjl', ['idpenjualan' => $id]);

            $this->template->load('templates/dashboard', 'bukujual/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $update = $this->admin->update('transaksipjl', 'idpenjualan', $id, $input);

            if ($update) {
                set_pesan('data berhasil disimpan');
                redirect('TPenjualanController');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('TPenjualanController/edit/' . $id);
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('transaksipjl', 'idpenjualan', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('TPenjualanController');
    }
}
>>>>>>> Stashed changes
