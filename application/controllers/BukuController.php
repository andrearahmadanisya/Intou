<?php

class BukuController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// load BukuMode
		$this->load->model('BukuModel');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['judul'] = 'Data Buku';
		$data['user'] = $this->session->userdata('user');

		$data['buku'] = $this->BukuModel->getAllBuku();
		$this->load->view('templates/header', $data);
		$this->load->view('Buku', $data);
		$this->load->view('templates/footer');
	}

	public function addBuku()
	{
		$this->form_validation->set_rules('judul', 'judul', 'required');
		$this->form_validation->set_rules('category', 'category', 'required');
		$this->form_validation->set_rules('penulis', 'penulis', 'required');
		$this->form_validation->set_rules('tglmasuk', 'tglmasuk', 'required');
		$this->form_validation->set_rules('hargajual', 'hargajual', 'required');
		$this->form_validation->set_rules('hargabeli', 'hargabeli', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data['judul'] = 'Rumah Sakit';
			$data['buku'] = $this->BukuModel->getAllBuku();

			$this->load->view('templates/header', $data);
			$this->load->view('Buku');
			$this->load->view('templates/footer');
		} else {
			$add = [
				"idBuku" => '',
				"judul" => $this->input->post('judul', true),
				"category" => $this->input->post('category', true),
				"penulis" => $this->input->post('penulis', true),
				"tglmasuk" => $this->input->post('tglmasuk', true),
				"hargajual" => $this->input->post('hargajual', true),
				"hargabeli" => $this->input->post('hargabeli', true)
			];
			$this->BukuModel->addBuku($add);
			// load Bukucon

		}
		redirect('BukuController');
	}

	public function delete($id)
	{
		$this->BukuModel->deleteBuku($id);
		redirect('BukuController');
	}

	public function update($id)
	{
		$data['judul'] = 'Rumah Sakit';
		$data['Buku'] = $this->BukuModel->getAllBuku();

		//from library form_validation
		$this->form_validation->set_rules('judul', 'judul', 'required');
		$this->form_validation->set_rules('category', 'category', 'required');
		$this->form_validation->set_rules('penulis', 'penulis', 'required');
		$this->form_validation->set_rules('tglmasuk', 'tglmasuk', 'required');
		$this->form_validation->set_rules('hargajual', 'hargajual', 'required');
		$this->form_validation->set_rules('hargabeli', 'hargabeli', 'required');

		if ($this->form_validation->run() == false) {

			$this->load->view('templates/header', $data);
			$this->load->view('Buku', $data);
			$this->load->view('templates/footer');
		} else {
			$update = [
				"idBuku" => '',
				"judul" => $this->input->post('judul', true),
				"category" => $this->input->post('category', true),
				"penulis" => $this->input->post('penulis', true),
				"tglmasuk" => $this->input->post('tglmasuk', true),
				"hargajual" => $this->input->post('hargajual', true),
				"hargabeli" => $this->input->post('hargabeli', true)
			];
			$this->BukuModel->updateBuku($id, $update);
			redirect('BukuController');
		}
	}
}
