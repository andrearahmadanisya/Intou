<?php

class BukuModel extends CI_Model
{
	public function getAllBuku()
	{
		// get all data
		$query = $this->db->query("SELECT * FROM buku");
		return $query->result_array();
	}

	public function addBuku($data)
	{
		$this->db->insert('buku', $data);
	}

	public function deleteBuku($id)
	{
		return $this->db->delete('buku', ['idbuku' => $id]);
	}

	public function updateBuku($id, $data)
	{

		$this->db->where('idbuku', $id);
		$this->db->update('buku', $data);
	}
}
