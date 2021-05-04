<?php

class PelangganModel extends CI_Model
{
	// mengambil data pelanggan yang ada pada db pelanggan
	public function getAllPelanggan()
	{
		// get all data
		$query = $this->db->query("SELECT * FROM pelanggan");
		return $query->result_array();
	}

	// mengambil data pelanggan menggunakan idpelanggan pada db pelanggan
	public function getById($id)
	{
		$query = $this->db->query("SELECT * FROM pelanggan WHERE idpelanggan = '" . $id . "'");
		return $query->row_array();
	}

	// menambahkan data pelanggan pada db pelangggan 
	public function addPelanggan($data)
	{
		return $this->db->insert('pelanggan', $data);
	}

	// men-update data pelanggan menggunakan idpelanggan pada db pelanggan 
	public function updatePelanggan($id_Pelanggan, $data)
	{
		$this->db->where('idpelanggan', $id_Pelanggan);
		return $this->db->update('pelanggan', $data);
	}

	// meng hapus data pelanggan menggunakan idpelanggan pada db pelanggan
	public function deletePelanggan($id_Pelanggan)
	{
		return $this->db->delete('pelanggan', ['idpelanggan' => $id_Pelanggan]);
	}

	// public function get_keyword($keyword)
	// {
	// 	$this->db->select('*');
	// 	$this->db->from('pelanggan');
	// 	$this->db->like('Namapelanggan', $keyword);
	// 	$this->db->or_like('alamatpelanggan', $keyword);
	// 	$this->db->or_like('contactpelanggan', $keyword);
	// 	$this->db->or_like('emailpelanggan', $keyword);
	// 	$this->db->or_like('kotapelanggan', $keyword);
	// 	return $this->db->get()->result_array();
	// }
}
