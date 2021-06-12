<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CategoryController extends CI_Controller
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
        $data['title'] = "Category";
        $data['category'] = $this->admin->get('category');
        $this->template->load('templates/dashboard', 'category/data', $data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('category', 'category', 'required|trim');
    }

    public function add()
    {
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Category";
            $this->template->load('templates/dashboard', 'category/data', $data);
        } else {
            $input = $this->input->post(null, true);
            $insert = $this->admin->insert('category', $input);
            if ($insert) {
                set_pesan('data berhasil disimpan');
                redirect('CategoryController');
            } else {
                set_pesan('data gagal disimpan', false);
                redirect('CategoryController');
            }
        }
    }

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Category";
            $data['category'] = $this->admin->get('category', ['idcategory' => $id]);
            $this->template->load('templates/dashboard', 'category/data', $data);
        } else {
            $input = $this->input->post(null, true);
            $update = $this->admin->update('category', 'idcategory', $id, $input);
            if ($update) {
                set_pesan('data berhasil disimpan');
                redirect('CategoryController');
            } else {
                set_pesan('data gagal disimpan', false);
                redirect('CategoryController');
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('category', 'idcategory', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('CategoryController');
    }
}
