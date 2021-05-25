<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SupplierController extends CI_Controller
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
        $data['title'] = "Supplier";
        $data['supplier'] = $this->admin->get('supplier');
        $this->template->load('templates/dashboard', 'supplier/data', $data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('namasupplier', 'Nama Supplier', 'required|trim');
        $this->form_validation->set_rules('contactsupplier', 'Nomor Telepon', 'required|trim|numeric');
        $this->form_validation->set_rules('alamatsupplier', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('emailsupplier', 'Email', 'required|trim');
        $this->form_validation->set_rules('kotasupplier', 'Kota', 'required|trim');
    }

    public function add()
    {
        $this->_validasi();
        if ($this->form_validation->run() == false) {
            $data['title'] = "Supplier";
            $this->template->load('templates/dashboard', 'supplier/data', $data);
        } else {
            $input = $this->input->post(null, true);
            $save = $this->admin->insert('supplier', $input);
            if ($save) {
                set_pesan('data berhasil disimpan.');
                redirect('SupplierController');
            } else {
                set_pesan('data gagal disimpan', false);
                redirect('SupplierController/data');
            }
        }
    }


    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Supplier";
            $data['supplier'] = $this->admin->get('supplier', ['idsupplier' => $id]);
            $this->template->load('templates/dashboard', 'supplier/data', $data);
        } else {
            $input = $this->input->post(null, true);
            $update = $this->admin->update('supplier', 'idsupplier', $id, $input);

            if ($update) {
                set_pesan('data berhasil diedit.');
                redirect('SupplierController');
            } else {
                set_pesan('data gagal diedit.');
                redirect('SupplierController/data' . $id);
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('supplier', 'idsupplier', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('SupplierController');
    }
}
