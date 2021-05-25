<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BukuController extends CI_Controller
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
        $data['title'] = "Buku";
        $data['buku'] = $this->admin->getbuku();
        $this->template->load('templates/dashboard', 'buku/data', $data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('idcategory', 'idcategory', 'required');
    }

    public function add()
    {
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Buku";
            // $data['buku'] = $this->admin->getbuku();
            $data['category'] = $this->admin->get('category');
            // $data['satuan'] = $this->admin->get('satuan');

            // Mengenerate ID buku
            $kode_terakhir = $this->admin->getMax('buku', 'idbuku');
            $kode_tambah = substr($kode_terakhir, -6, 6);
            $kode_tambah++;
            $number = str_pad($kode_tambah, 6, '0', STR_PAD_LEFT);
            $data['idbuku'] = 'B' . $number;

            $this->template->load('templates/dashboard', 'buku/add', $data);
        } else {
            $input = $this->input->post(null, true);
            $insert = $this->admin->insert('buku', $input);

            if ($insert) {
                set_pesan('data berhasil disimpan');
                redirect('BukuController');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('BukuController/add');
            }
        }
    }

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "buku";
            $data['category'] = $this->admin->get('category');
            $data['buku'] = $this->admin->get('buku', ['idbuku' => $id]);
            $this->template->load('templates/dashboard', 'buku/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $update = $this->admin->update('buku', 'idbuku', $id, $input);

            if ($update) {
                set_pesan('data berhasil disimpan');
                redirect('BukuController');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('buku/edit/' . $id);
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        $buku = $this->admin->getById($id);
        $this->admin->addHistory($buku);
        // memindahkannya ke database history
        if ($this->admin->delete('buku', 'idbuku', $id)) {
            // $this->admin->delete('buku', 'idbuku', $id);
            set_pesan('data berhasil dipindahkan kedalam HistoryBuku.');
        } else {
            set_pesan('data gagal dipindahkan.', false);
        }
        redirect('BukuController');
    }

    public function getstok($getId)
    {
        $id = encode_php_tags($getId);
        $query = $this->admin->cekStok($id);
        output_json($query);
    }
}
