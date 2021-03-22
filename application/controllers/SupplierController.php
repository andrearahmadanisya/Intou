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
		$this->load->view('templates/sidebar', $data);
		$this->load->view('Supplier', $data);
		$this->load->view('templates/footer');
	}

	public function addSupplier()
	{
		$this->form_validation->set_rules('namasupplier', 'namasupplier', 'required');
		$this->form_validation->set_rules('alamatsupplier', 'alamatsupplier', 'required');
		$this->form_validation->set_rules('contactsupplier', 'contactsupplier', 'required');
		$this->form_validation->set_rules('emailsupplier', 'emailsupplier', 'required');
		$this->form_validation->set_rules('kotasupplier', 'kotasupplier', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data['judul'] = 'Supplier';
			$data['supplier'] = $this->SupplierModel->getAllSupplier();

			$this->load->view('templates/sidebar', $data);
			$this->load->view('Supplier');
			$this->load->view('templates/footer');
		} else {
			$add = [
				"idSupplier" => '',
				"namasupplier" => $this->input->post('namasupplier', true),
				"alamatsupplier" => $this->input->post('alamatsupplier', true),
				"contactsupplier" => $this->input->post('contactsupplier', true),
				"emailsupplier" => $this->input->post('emailsupplier', true),
				"kotasupplier" => $this->input->post('kotasupplier', true),
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
		$this->form_validation->set_rules('contactsupplier', 'contactsupplier', 'required');
		$this->form_validation->set_rules('emailsupplier', 'emailsupplier', 'required');
		$this->form_validation->set_rules('kotasupplier', 'kotasupplier', 'required');

		if ($this->form_validation->run() == false) {

			$this->load->view('templates/sidebar', $data);
			$this->load->view('Supplier', $data);
			$this->load->view('templates/footer');
		} else {
			$update = [
				"idsupplier" => $id,
				"namasupplier" => $this->input->post('namasupplier', true),
				"alamatsupplier" => $this->input->post('alamatsupplier', true),
				"contactsupplier" => $this->input->post('contactsupplier', true),
				"emailsupplier" => $this->input->post('emailsupplier', true),
				"kotasupplier" => $this->input->post('kotasupplier', true),
			];
			$this->SupplierModel->updateSupplier($id, $update);
			redirect('SupplierController');
		}
	}
}
