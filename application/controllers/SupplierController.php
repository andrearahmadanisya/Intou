<?php

class SupplierController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // load SupplierMode
        $this->load->model('SupplierModel');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Data Supplier';
        $data['user'] = $this->session->userdata('user');

        $data['supplier'] = $this->SupplierModel->getAllSupplier();
        $this->load->view('v_datasupplier', $data);
    }
    public function addSupplier()
    {
        $this->form_validation->set_rules('namasupplier', 'namasupplier', 'required');
        $this->form_validation->set_rules('alamatsupplier', 'alamatsupplier', 'required');
        $this->form_validation->set_rules('kotasupplier', 'kotasupplier', 'required');
        $this->form_validation->set_rules('emailsupplier', 'emailsupplier', 'required');
        $this->form_validation->set_rules('contactsupplier', 'contactsupplier', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = 'Supplier';
            $data['supplier'] = $this->SupplierModel->getAllSupplier();

            $this->load->view('v_datasupplier');
        } else {
            $add = [
                "idSupplier" => '',
                "namasupplier" => $this->input->post('namasupplier', true),
                "alamatsupplier" => $this->input->post('alamatsupplier', true),
                "kotasupplier" => $this->input->post('kotasupplier', true),
                "emailsupplier" => $this->input->post('emailsupplier', true),
                "contactsupplier" => $this->input->post('contactsupplier', true),
            ];
            $this->SupplierModel->addSupplier($add);
            // load Suppliercon

        }
        redirect('SupplierController');
    }

    public function delete($id)
    {
        $this->SupplierModel->deleteSupplier($id);
        redirect('SupplierController');
    }

    public function update($id)
    {
        $data['judul'] = 'Supplier';
        $data['supplier'] = $this->SupplierModel->getAllSupplier();

        //from library form_validation
        $this->form_validation->set_rules('namasupplier', 'namasupplier', 'required');
        $this->form_validation->set_rules('alamatsupplier', 'alamatsupplier', 'required');
        $this->form_validation->set_rules('kotasupplier', 'kotasupplier', 'required');
        $this->form_validation->set_rules('emailsupplier', 'emailsupplier', 'required');
        $this->form_validation->set_rules('contactsupplier', 'contactsupplier', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('v_datasupplier', $data);
        } else {
            $update = [
                "idsupplier" => $id,
                "namasupplier" => $this->input->post('namasupplier', true),
                "alamatsupplier" => $this->input->post('alamatsupplier', true),
                "kotasupplier" => $this->input->post('kotasupplier', true),
                "emailsupplier" => $this->input->post('emailsupplier', true),
                "contactsupplier" => $this->input->post('contactsupplier', true),
            ];
            $this->SupplierModel->updateSupplier($id, $update);
            redirect('SupplierController');
        }
    }

    public function SearchSupplier()
    {
        $keyword = $this->input->post('keyword');
        $data['supplier'] = $this->SupplierModel->get_keyword($keyword);
        $this->load->view('v_datasupplier', $data);
    }
}
