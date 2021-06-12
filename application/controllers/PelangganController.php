<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PelangganController extends CI_Controller
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
        $data['title'] = "Pelanggan";
        $data['pelanggan'] = $this->admin->get('pelanggan');
        $this->template->load('templates/dashboard', 'pelanggan/data', $data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('namapelanggan', 'Nama pelanggan', 'required|trim');
        $this->form_validation->set_rules('contactpelanggan', 'Nomor Telepon', 'required|trim|numeric');
        $this->form_validation->set_rules('alamatpelanggan', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('emailpelanggan', 'Email', 'required|trim');
        $this->form_validation->set_rules('kotapelanggan', 'Kota', 'required|trim');
    }

    public function add()
    {
        $this->_validasi();
        if ($this->form_validation->run() == false) {
            $data['title'] = "Pelanggan";
            $this->template->load('templates/dashboard', 'pelanggan/data', $data);
        } else {
            $input = $this->input->post(null, true);
            $save = $this->admin->insert('pelanggan', $input);
            if ($save) {
                set_pesan('data berhasil disimpan.');
                redirect('pelangganController');
            } else {
                set_pesan('data gagal disimpan', false);
                redirect('pelangganController/data');
            }
        }
    }

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Edit Pelanggan";
            $data['pelanggan'] = $this->admin->get('pelanggan', ['idpelanggan' => $id]);
            $this->template->load('templates/dashboard', 'pelanggan/data', $data);
        } else {
            $input = $this->input->post(null, true);
            $update = $this->admin->update('pelanggan', 'idpelanggan', $id, $input);

            if ($update) {
                set_pesan('data berhasil diedit.');
                redirect('pelangganController');
            } else {
                set_pesan('data gagal diedit.');
                redirect('pelangganController/data' . $id);
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('pelanggan', 'idpelanggan', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('pelangganController');
    }
}
