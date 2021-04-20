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
		$this->load->view('v_databuku', $data);
	}

	public function addBuku()
	{
		$this->form_validation->set_rules('judul', 'judul', 'required');
		$this->form_validation->set_rules('category', 'category', 'required');
		$this->form_validation->set_rules('penulis', 'penulis', 'required');
		$this->form_validation->set_rules('total', 'total', 'required');
		$this->form_validation->set_rules('tglmasuk', 'tglmasuk', 'required');
		$this->form_validation->set_rules('hargajual', 'hargajual', 'required');
		$this->form_validation->set_rules('hargabeli', 'hargabeli', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data['judul'] = 'Data Buku';
			$data['buku'] = $this->BukuModel->getAllBuku();

			$this->load->view('v_databuku');
		} else {
			$add = [
				"idbuku" => '',
				"judul" => $this->input->post('judul', true),
				"category" => $this->input->post('category', true),
				"penulis" => $this->input->post('penulis', true),
				"total" => $this->input->post('total', true),
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

	public function cari()
	{
		$data['judul'] = 'Data Buku';
		$data['buku'] = $this->BukuModel->getAllBuku();

		if ($this->input->post('submit')) {
			$data['keyword'] = $this->input->post('keyword');
		} else {
			$data['keyword'] = null;
		}
		redirect('BukuController');
	}
	public function update($id)
	{
		$data['judul'] = 'Buku';
		$data['buku'] = $this->BukuModel->getAllBuku();

		//from library form_validation
		$this->form_validation->set_rules('judul', 'judul', 'required');
		$this->form_validation->set_rules('category', 'category', 'required');
		$this->form_validation->set_rules('penulis', 'penulis', 'required');
		$this->form_validation->set_rules('total', 'total', 'required');
		$this->form_validation->set_rules('tglmasuk', 'tglmasuk', 'required');
		$this->form_validation->set_rules('hargajual', 'hargajual', 'required');
		$this->form_validation->set_rules('hargabeli', 'hargabeli', 'required');

		if ($this->form_validation->run() == false) {

			$this->load->view('v_databuku', $data);
		} else {
			$update = [
				"idbuku" => $id,
				"judul" => $this->input->post('judul', true),
				"category" => $this->input->post('category', true),
				"penulis" => $this->input->post('penulis', true),
				"total" => $this->input->post('total', true),
				"tglmasuk" => $this->input->post('tglmasuk', true),
				"hargajual" => $this->input->post('hargajual', true),
				"hargabeli" => $this->input->post('hargabeli', true)
			];
			$this->BukuModel->updateBuku($id, $update);
			redirect('BukuController');
		}
	}

	public function SearchBuku()
	{
		$keyword = $this->input->post('keyword');
		$data['buku'] = $this->BukuModel->get_keyword($keyword);
		$this->load->view('v_databuku', $data);
	}
}
