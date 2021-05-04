<?php

class TBarangMasukModel extends CI_Model
{
    //mengambil semua data transaksi yang ada pada db transaksimsk
    public function getAllTransaksi()
    {
        // get all data
        $query = $this->db->query("SELECT * FROM transaksimsk");
        return $query->result_array();
    }

    // menggambil data transaksi menggunakan idtransaksi pada db transaksimsk
    public function getById($id)
    {
        $query = $this->db->query("SELECT * FROM transaksimsk WHERE idtransaksi = '" . $id . "'");
        return $query->row_array();
    }

    // menambahkan data transaksi pada db transaksimsk
    public function addTransaksi($data)
    {
        return $this->db->insert('transaksimsk', $data);
    }

    // meng-update data transaksi pd db transaksimsk menggunakan idtransaksi
    public function updatetraksaksi($id, $data)
    {
        $this->db->where('idtransaksi', $id);
        return $this->db->update('transaksimsk', $data);
    }

    // meng-hapus data transaksi pd db transaksimsk menggunakan idtransaksi
    public function deletetraksaksi($id)
    {
        $this->db->delete('transaksimsk', ['idtransaksi' => $id]);
    }

    // public function get_keyword($keyword)
    // {
    //     $this->db->select('*');
    //     $this->db->from('traksaksi');
    //     $this->db->like('judul', $keyword);
    //     $this->db->or_like('category', $keyword);
    //     $this->db->or_like('penulis', $keyword);
    //     $this->db->or_like('total', $keyword);
    //     $this->db->or_like('tglmasuk', $keyword);
    //     $this->db->or_like('hargajual', $keyword);
    //     $this->db->or_like('hargabeli', $keyword);
    //     return $this->db->get()->result_array();
    // }
}
