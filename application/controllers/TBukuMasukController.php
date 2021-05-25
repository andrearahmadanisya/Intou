<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TBukuMasukController extends CI_Controller
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
        $data['title'] = "Transaksi Buku Masuk";
        $data['transaksimsk'] = $this->admin->getbukuMasuk();
        $this->template->load('templates/dashboard', 'bukumasuk/data', $data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('tanggal_masuk', 'Tanggal Masuk', 'required|trim');
        $this->form_validation->set_rules('idsupplier', 'Supplier', 'required');
        $this->form_validation->set_rules('id_buku', 'Buku', 'required');
        $this->form_validation->set_rules('totalmasuk', 'Jumlah Masuk', 'required|trim|numeric|greater_than[0]');
    }

    public function add()
    {
        $this->_validasi();
        if ($this->form_validation->run() == false) {
            $data['title'] = "Buku Masuk";
            $data['supplier'] = $this->admin->get('supplier');
            $data['buku'] = $this->admin->get('buku');

            // Mendapatkan dan men-generate kode transaksi barang masuk
            $kode_terakhir = $this->admin->getMax('transaksimsk', 'idtransaksi');
            $kode_tambah = substr($kode_terakhir, -4, 4);
            $kode_tambah++;
            $number = str_pad($kode_tambah, 4, '0', STR_PAD_LEFT);
            $data['idtransaksi'] = 'TBM-' . $number;

            $this->template->load('templates/dashboard', 'bukumasuk/add', $data);
        } else {
            $input = $this->input->post(null, true);
            $insert = $this->admin->insert('transaksimsk', $input);

            if ($insert) {
                set_pesan('data berhasil disimpan.');
                redirect('TBukuMasukController');
            } else {
                set_pesan('Opps ada kesalahan!');
                redirect('TBukuMasukController/add');
            }
        }
    }

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Transaksi Buku Masuk";
            $data['supplier'] = $this->admin->get('supplier');
            $data['buku'] = $this->admin->get('buku');
            $data['transaksimsk'] = $this->admin->get('transaksimsk', ['idtransaksi' => $id]);

            $this->template->load('templates/dashboard', 'bukumasuk/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $update = $this->admin->update('transaksimsk', 'idtransaksi', $id, $input);

            if ($update) {
                set_pesan('data berhasil disimpan');
                redirect('TBukuMasukController');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('TBukuMasukController/edit/' . $id);
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('transaksimsk', 'idtransaksi', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('TBukuMasukController');
    }
}
