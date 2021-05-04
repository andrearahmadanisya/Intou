<?php

class TPenjualanModel extends CI_Model
{
    //mengambil semua data penjualan pada db transaksipjl
    public function getAllPenjualan()
    {
        // get all data
        $query = $this->db->query("SELECT * FROM transaksipjl");
        return $query->result_array();
    }

    // mengambil data penjualan menggunakan idpenjualan pada db transaksipjl
    public function getById($id)
    {
        $query = $this->db->query("SELECT * FROM transaksipjl WHERE idpenjualan = '" . $id . "'");
        return $query->row_array();
    }

    // menambahkan data penjualan pada db transaksipjl
    public function addPenjualan($data)
    {
        return $this->db->insert('transaksipjl', $data);
    }

    // meng-update data penjualan menggunakan idpenjualan pada db transaksipjl
    public function updatepenjualan($id, $data)
    {
        $this->db->where('idpenjualan', $id);
        return $this->db->update('transaksipjl', $data);
    }

    // meng-hapus data penjualan menggunakan idpenjualan pada db transaksipjl
    public function deletepenjualan($id)
    {
        $this->db->delete('transaksipjl', ['idpenjualan' => $id]);
    }
}
