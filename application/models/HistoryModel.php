<?php

class HistoryModel extends CI_model
{
    // mengambil data buku yang ada pada db
    public function getAllBuku()
    {
        // get all data
        $query = $this->db->query("SELECT * FROM historybuku");
        return $query->result_array();
    }

    // menambahkan data buku kedalam db history
    public function addHistory($data)
    {
        $this->db->insert('historybuku', $data);
    }
}
