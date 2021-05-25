<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PelangganController extends CI_Controller
{
<<<<<<< Updated upstream
	public function __construct()
	{
		// load pelanggan model sebagai parent
		parent::__construct();
		$this->load->model('PelangganModel');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = 'Data Pelanggan';
		//mengambil session dari data user login 
		$data['user'] = $this->session->userdata('user');
		// mengambbil data pelanggan yang ada pada db 
		$data['pelanggan'] = $this->PelangganModel->getAllPelanggan();
		//load v_datapelanggan dari view
		$this->load->view('v_datapelanggan', $data);
	}

	// menambahkan data pelanggan pada db
	public function addPelanggan()
	{
		// membuat form validation untuk input sesuai dengan kolom yang ada pada db
		$this->form_validation->set_rules('namapelanggan', 'namapelanggan', 'required');
		$this->form_validation->set_rules('alamatpelanggan', 'alamatpelanggan', 'required');
		$this->form_validation->set_rules('kotapelanggan', 'kotapelanggan', 'required');
		$this->form_validation->set_rules('emailpelanggan', 'emailpelanggan', 'required');
		$this->form_validation->set_rules('contactpelanggan', 'contactpelanggan', 'required');

		// dicek terlebih dahulu kalau false akan kembali ke view v_datapelanggan, else akan menampilkan form yag akan diinputkan
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Data Pelanggan';
			$data['pelanggan'] = $this->PelangganModel->getAllPelanggan();

			$this->load->view('v_datapelanggan');
		} else {
			$add = [
				"idpelanggan" => '',
				"namapelanggan" => $this->input->post('namapelanggan', true),
				"alamatpelanggan" => $this->input->post('alamatpelanggan', true),
				"kotapelanggan" => $this->input->post('kotapelanggan', true),
				"emailpelanggan" => $this->input->post('emailpelanggan', true),
				"contactpelanggan" => $this->input->post('contactpelanggan', true),
			];
			$this->PelangganModel->addPelanggan($add);
		}
		redirect('PelangganController');
	}

	// menghapus data pelanggan pada db 
	public function delete($id)
	{
		$this->PelangganModel->deletePelanggan($id);
		redirect('PelangganController');
	}

	// meng-edit data pelanggan 
	public function update($id)
	{
		$data['title'] = 'Data Pelanggan';
		$data['pelanggan'] = $this->PelangganModel->getAllPelanggan();

		//from library form_validation
		$this->form_validation->set_rules('namapelanggan', 'namapelanggan', 'required');
		$this->form_validation->set_rules('alamatpelanggan', 'alamatpelanggan', 'required');
		$this->form_validation->set_rules('kotapelanggan', 'kotapelanggan', 'required');
		$this->form_validation->set_rules('emailpelanggan', 'emailpelanggan', 'required');
		$this->form_validation->set_rules('contactpelanggan', 'contactpelanggan', 'required');

		if ($this->form_validation->run() == false) {

			$this->load->view('v_datapelanggan', $data);
		} else {
			$update = [
				"idpelanggan" => $id, //diambil sesuai idpelanggan yang ingin di edit
				"namapelanggan" => $this->input->post('namapelanggan', true),
				"alamatpelanggan" => $this->input->post('alamatpelanggan', true),
				"kotapelanggan" => $this->input->post('kotapelanggan', true),
				"emailpelanggan" => $this->input->post('emailpelanggan', true),
				"contactpelanggan" => $this->input->post('contactpelanggan', true),
			];
			$this->PelangganModel->updatePelanggan($id, $update);
			redirect('PelangganController');
		}
	}

	// public function SearchPelanggan()
	// {
	// 	$keyword = $this->input->post('keyword');
	// 	$data['pelanggan'] = $this->PelangganModel->get_keyword($keyword);
	// 	$this->load->view('v_datapelanggan', $data);
	// }
=======
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
            $data['title'] = "pelanggan";
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
>>>>>>> Stashed changes
}
