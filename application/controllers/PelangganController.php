<?php

class PelangganController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('PelangganModel');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['judul'] = 'Data Pelanggan';
		$data['user'] = $this->session->userdata('user');

		$data['pelanggan'] = $this->PelangganModel->getAllPelanggan();
		$this->load->view('templates/sidebar', $data);
		$this->load->view('Pelanggan', $data);
		$this->load->view('templates/footer');
	}

	public function addPelanggan()
	{
		$this->form_validation->set_rules('namapelanggan', 'namapelanggan', 'required');
		$this->form_validation->set_rules('alamatpelanggan', 'alamatpelanggan', 'required');
		$this->form_validation->set_rules('contactpelanggan', 'contactpelanggan', 'required');
		$this->form_validation->set_rules('emailpelanggan', 'emailpelanggan', 'required');
		$this->form_validation->set_rules('kotapelanggan', 'kotapelanggan', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data['judul'] = 'Data Pelanggan';
			$data['pelanggan'] = $this->PelangganModel->getAllPelanggan();

			$this->load->view('templates/sidebar', $data);
			$this->load->view('Pelanggan');
			$this->load->view('templates/footer');
		} else {
			$add = [
				"idpelanggan" => '',
				"namapelanggan" => $this->input->post('namapelanggan', true),
				"alamatpelanggan" => $this->input->post('alamatpelanggan', true),
				"contactpelanggan" => $this->input->post('contactpelanggan', true),
				"emailpelanggan" => $this->input->post('emailpelanggan', true),
				"kotapelanggan" => $this->input->post('kotapelanggan', true),
			];
			$this->PelangganModel->addPelanggan($add);
		}
		redirect('PelangganController');
	}

	public function delete($id)
	{
		$this->PelangganModel->deletePelanggan($id);
		redirect('PelangganController');
	}

	public function update($id)
	{
		$data['judul'] = 'Data Pelanggan';
		$data['pelanggan'] = $this->PelangganModel->getAllPelanggan();

		//from library form_validation
		$this->form_validation->set_rules('namapelanggan', 'namapelanggan', 'required');
		$this->form_validation->set_rules('alamatpelanggan', 'alamatpelanggan', 'required');
		$this->form_validation->set_rules('contactpelanggan', 'contactpelanggan', 'required');
		$this->form_validation->set_rules('emailpelanggan', 'emailpelanggan', 'required');
		$this->form_validation->set_rules('kotapelanggan', 'kotapelanggan', 'required');

		if ($this->form_validation->run() == false) {

			$this->load->view('templates/sidebar', $data);
			$this->load->view('Pelanggan', $data);
			$this->load->view('templates/footer');
		} else {
			$update = [
				"idpelanggan" => '',
				"namapelanggan" => $this->input->post('namapelanggan', true),
				"alamatpelanggan" => $this->input->post('alamatpelanggan', true),
				"contactpelanggan" => $this->input->post('contactpelanggan', true),
				"emailpelanggan" => $this->input->post('emailpelanggan', true),
				"kotapelanggan" => $this->input->post('kotapelanggan', true),
			];
			$this->PelangganModel->updatePelanggan($id, $update);
			redirect('PelangganController');
		}
	}
	
	public function SearchPelanggan()
	{
		$keyword = $this->input->post('keyword');
		$data['pelanggan'] = $this->PelangganModel->get_keyword($keyword);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('Pelanggan', $data);
		$this->load->view('templates/footer');
	}
}
