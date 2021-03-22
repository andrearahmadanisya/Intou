<?php

class BukuModel extends CI_Model
{
	public function getAllBuku()
	{
		// get all data
		$query = $this->db->query("SELECT * FROM buku");
		return $query->result_array();
	}

	public function getById($id)
	{
		$query = $this->db->query("SELECT * FROM buku WHERE idbuku = '" . $id . "'");
		return $query->row_array();
	}

	public function addBuku($data)
	{
		return $this->db->insert('buku', $data);
	}

	public function updateBuku($data, $id_Buku)
	{
		$this->db->where('idbuku', $id_Buku);
		return $this->db->update('buku', $data);
	}

	public function deleteBuku($id_Buku)
	{
		return $this->db->delete('buku', ['idbuku' => $id_Buku]);
	}
}
