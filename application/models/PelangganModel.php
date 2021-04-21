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

	public function get_keyword($keyword)
	{
		$this->db->select('*');
		$this->db->from('pelanggan');
		$this->db->like('Namapelanggan', $keyword);
		$this->db->or_like('alamatpelanggan', $keyword);
		$this->db->or_like('contactpelanggan', $keyword);
		$this->db->or_like('emailpelanggan', $keyword);
		$this->db->or_like('kotapelanggan', $keyword);
		return $this->db->get()->result_array();
	}
}
