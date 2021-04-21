<?php

class HistoryModel extends CI_model
{
    public function getAllBuku()
    {
        // get all data
        $query = $this->db->query("SELECT * FROM historybuku");
        return $query->result_array();
    }

    public function addHistory($data)
    {
        $this->db->insert('historybuku', $data);
    }
}
