<?php

class PelangganModel extends CI_Model
{
	public function getAllPelanggan()
	{
		// get all data
		$query = $this->db->query("SELECT * FROM pelanggan");
		return $query->result_array();
	}

	public function getById($id)
	{
		$query = $this->db->query("SELECT * FROM pelanggan WHERE idpelanggan = '" . $id . "'");
		return $query->row_array();
	}

	public function addPelanggan($data)
	{
		return $this->db->insert('pelanggan', $data);
	}

	public function updatePelanggan($id_Pelanggan, $data)
	{
		$this->db->where('idpelanggan', $id_Pelanggan);
		return $this->db->update('pelanggan', $data);
	}

	public function deletePelanggan($id_Pelanggan)
	{
		return $this->db->delete('pelanggan', ['idpelanggan' => $id_Pelanggan]);
	}
}
