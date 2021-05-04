<?php

class TBarangMasukController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // load BukuMode
        $this->load->model('TBarangMasukModel');
        $this->load->library('form_validation');
        $this->load->helper('date');
    }

    public function index()
    {
        $data['user'] = $this->session->userdata('user');

        $data['transaksimsk'] = $this->TBarangMasukModel->getAllTransaksi();
        $this->load->view('v_transaksibarangmasuk', $data);
    }

    public function addTransaksi()
    {
        $this->form_validation->set_rules('judulbuku', 'judulbuku', 'required');
        $this->form_validation->set_rules('total', 'total', 'required');
        $this->form_validation->set_rules('hargapcs', 'hargapcs', 'required');
        $this->form_validation->set_rules('hargatotal', 'hargatotal', 'required');
        $this->form_validation->set_rules('tgltransaksi', 'tgltransaksi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = 'Data';
            $data['transaksimsk'] = $this->TBarangMasukModel->getAllTransaksi();

            $this->load->view('v_transaksibarangmasuk');
        } else {
            date_default_timezone_set('Asia/Jakarta');
            $now = date(DATE_RSS, time());
            $format = "Y-m-d H:i a";

            $add = [
                "judulbuku" => $this->input->post('judulbuku', true),
                "total" => $this->input->post('total', true),
                "hargapcs" => $this->input->post('hargapcs', true),
                "hargatotal" => $this->input->post('hargatotal', true),
                "tgltransaksi" => date($format)
                // date($format)
            ];
            // $this->db->insert('buku', $add);
            $this->TBarangMasukModel->addTransaksi($add);
        }
        redirect('TBarangMasukController');
    }

    public function update($id)
    {
        $data['judul'] = 'Buku';
        $data['transaksimsk'] = $this->TBarangMasukModel->getAllTransaksi();
        //from library form_validation
        $this->form_validation->set_rules('judulbuku', 'judulbuku', 'required');
        $this->form_validation->set_rules('total', 'total', 'required');
        $this->form_validation->set_rules('hargapcs', 'hargapcs', 'required');
        $this->form_validation->set_rules('hargatotal', 'hargatotal', 'required');
        $this->form_validation->set_rules('tgltransaksi', 'tgltransaksi', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('v_transaksibarangmasuk', $data);
        } else {
            $update = [
                "idbuku" => $id,
                "judulbuku" => $this->input->post('judulbuku', true),
                "total" => $this->input->post('total', true),
                "hargapcs" => $this->input->post('hargapcs', true),
                "hargatotal" => $this->input->post('hargatotal', true),
                "tgltransaksi" => $this->input->post('tgltransaksi', true),
            ];
            $this->TBarangMasukModel->updatetraksaksi($id, $update);
            redirect('TBarangMasukController');
        }
    }
    public function delete($id)
    {
        $this->TBarangMasukModel->deletetraksaksi($id);
        redirect('TBarangMasukController');
    }
}
