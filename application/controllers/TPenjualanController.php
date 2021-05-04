<?php

class TPenjualanController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // load BukuMode
        $this->load->model('TPenjualanModel');
        $this->load->library('form_validation');
        $this->load->helper('date');
    }

    public function index()
    {
        $data['user'] = $this->session->userdata('user');

        $data['transaksipjl'] = $this->TPenjualanModel->getAllPenjualan();
        $this->load->view('v_transaksipenjualan', $data);
    }

    public function addPenjualan()
    {
        $this->form_validation->set_rules('judulbuku', 'judulbuku', 'required');
        $this->form_validation->set_rules('qty', 'qty', 'required');
        $this->form_validation->set_rules('biayakirim', 'biayakirim', 'required');
        $this->form_validation->set_rules('hargapcs', 'hargapcs', 'required');
        $this->form_validation->set_rules('hargatotal', 'hargatotal', 'required');
        $this->form_validation->set_rules('tgltransaksi', 'tgltransaksi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = 'Data';
            $data['transaksipjl'] = $this->TPenjualanModel->getAllPenjualan();

            $this->load->view('v_transaksipenjualan');
        } else {
            date_default_timezone_set('Asia/Jakarta');
            $now = date(DATE_RSS, time());
            $format = "Y-m-d H:i a";

            $add = [
                "idpenjualan" => '',
                "judulbuku" => $this->input->post('judulbuku', true),
                "qty" => $this->input->post('qty', true),
                "hargapcs" => $this->input->post('hargapcs', true),
                "biayakirim" => $this->input->post('biayakirim', true),
                "hargatotal" => $this->input->post('hargatotal', true),
                "tgltransaksi" => date($format)
            ];
            $this->TPenjualanModel->addPenjualan($add);
        }
        redirect('TPenjualanController');
    }

    public function update($id)
    {
        $data['judul'] = 'Buku';
        $data['transaksipjl'] = $this->TPenjualanModel->getAllPenjualan();
        //from library form_validation
        $this->form_validation->set_rules('judulbuku', 'judulbuku', 'required');
        $this->form_validation->set_rules('qty', 'qty', 'required');
        $this->form_validation->set_rules('hargapcs', 'hargapcs', 'required');
        $this->form_validation->set_rules('biayakirim', 'biayakirim', 'required');
        $this->form_validation->set_rules('hargatotal', 'hargatotal', 'required');
        $this->form_validation->set_rules('tgltransaksi', 'tgltransaksi', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('v_transaksipenjualan', $data);
        } else {
            date_default_timezone_set('Asia/Jakarta');
            $format = "Y-m-d H:i a";
            $update = [
                "idbuku" => $id,
                "judulbuku" => $this->input->post('judulbuku', true),
                "qty" => $this->input->post('qty', true),
                "hargatotal" => $this->input->post('hargatotal', true),
                "hargapcs" => $this->input->post('hargapcs', true),
                "biayakirim" => $this->input->post('biayakirim', true),
                "tgltransaksi" => date($format)
            ];
            $this->TPenjualanModel->updatepenjualan($id, $update);
            redirect('TPenjualanController');
        }
    }
    public function delete($id)
    {
        $this->TPenjualanModel->deletepenjualan($id);
        redirect('TPenjualanController');
    }
}
