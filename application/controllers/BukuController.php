<?php

class BukuController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// load BukuModel sebagai parent
		$this->load->model('BukuModel');
		$this->load->model('HistoryModel');
		$this->load->library('form_validation');
		$this->load->helper('date');
	}

	public function index()
	{
		// untu judul 
		$data['judul'] = 'Data Buku';
		// session yang menampung login user
		$data['user'] = $this->session->userdata('user');
		// mengambil data buku yang ada pada db dan menampilkannya pada view v_databuku
		$data['buku'] = $this->BukuModel->getAllBuku();
		$this->load->view('v_databuku', $data);
	}

	// FUngsi ini untuk menambahkan data buku pada Database
	public function addBuku()
	{
		// membuat form validation untuk input sesuai dengan kolom yang ada pada db
		$this->form_validation->set_rules('judul', 'judul', 'required');
		$this->form_validation->set_rules('category', 'category', 'required');
		$this->form_validation->set_rules('penulis', 'penulis', 'required');
		$this->form_validation->set_rules('total', 'total', 'required');
		$this->form_validation->set_rules('tglmasuk', 'tglmasuk', 'required');
		$this->form_validation->set_rules('hargajual', 'hargajual', 'required');
		$this->form_validation->set_rules('hargabeli', 'hargabeli', 'required');

		// dicek terlebih dahulu kalau false akan kembali ke view v_data buku, else akan menampilkan form yag akan diinputkan
		if ($this->form_validation->run() == FALSE) {
			$data['buku'] = $this->BukuModel->getAllBuku();

			$this->load->view('v_databuku');
		} else {
			date_default_timezone_set('Asia/Jakarta');
			$format = "Y-m-d H:i a";

			$add = [
				"idbuku" => '',
				"judul" => $this->input->post('judul', true),
				"category" => $this->input->post('category', true),
				"penulis" => $this->input->post('penulis', true),
				"total" => $this->input->post('total', true),
				"tglmasuk" => date($format),
				"hargajual" => $this->input->post('hargajual', true),
				"hargabeli" => $this->input->post('hargabeli', true)
			];
			$this->BukuModel->addBuku($add);
		}
		redirect('BukuController');
	}

	// fungsi ini untuk menhapus data buku yang ada pada database dan dipindahkan ke database hiistory buku
	public function delete($id)
	{
		// mengambil id buku yang akan di hapus
		$buku = $this->BukuModel->getById($id);
		// memindahkannya ke database history
		$this->HistoryModel->addHistory($buku);
		// menghapus dari db buku
		$this->BukuModel->deleteBuku($id);

		redirect('BukuController');
	}

	// fungsi ini untuk mengedit/update data buku 
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

	// public function SearchBuku()
	// {
	// 	$keyword = $this->input->post('keyword');
	// 	$data['buku'] = $this->BukuModel->get_keyword($keyword);
	// 	$this->load->view('v_databuku', $data);
	// }

	// public function cari()
	// {
	// 	$data['judul'] = 'Data Buku';
	// 	$data['buku'] = $this->BukuModel->getAllBuku();

	// 	if ($this->input->post('submit')) {
	// 		$data['keyword'] = $this->input->post('keyword');
	// 	} else {
	// 		$data['keyword'] = null;
	// 	}
	// 	redirect('BukuController');
	// }
}
