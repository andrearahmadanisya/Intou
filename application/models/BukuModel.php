<?php

class BukuModel extends CI_Model
{
	// untuk mengambil semua data buku dari db
	public function getAllBuku()
	{
		// get all data
		$query = $this->db->query("SELECT * FROM buku");
		return $query->result_array();
	}

	// mengambil data buku sesuai dengan id  
	public function getById($id)
	{
		$query = $this->db->query("SELECT * FROM buku WHERE idbuku = '" . $id . "'");
		return $query->row_array();
	}

	// menambah data buku kedalam db
	public function addBuku($data)
	{
		return $this->db->insert('buku', $data);
	}

	// update data buku kedalam db
	public function updateBuku($id_Buku, $data)
	{
		$this->db->where('idbuku', $id_Buku);
		return $this->db->update('buku', $data);
	}

	// menghapus data buku dari db  
	public function deleteBuku($id_Buku)
	{
		$this->db->delete('buku', ['idbuku' => $id_Buku]);
	}

	// public function get_keyword($keyword)
	// {
	// 	$this->db->select('*');
	// 	$this->db->from('buku');
	// 	$this->db->like('judul', $keyword);
	// 	$this->db->or_like('category', $keyword);
	// 	$this->db->or_like('penulis', $keyword);
	// 	$this->db->or_like('total', $keyword);
	// 	$this->db->or_like('tglmasuk', $keyword);
	// 	$this->db->or_like('hargajual', $keyword);
	// 	$this->db->or_like('hargabeli', $keyword);
	// 	return $this->db->get()->result_array();
	// }
}
