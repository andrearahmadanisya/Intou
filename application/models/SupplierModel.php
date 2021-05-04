<?php

class SupplierModel extends CI_Model
{
	// mengambil data supplier yang ada pada db supplier
	public function getAllSupplier()
	{
		// get all data
		$query = $this->db->query("SELECT * FROM supplier");
		return $query->result_array();
	}

	// mengambil data supplier menggunakan idsupplier pada db supplier
	public function getById($id)
	{
		$query = $this->db->query("SELECT * FROM supplier WHERE idsupplier = '" . $id . "'");
		return $query->row_array(); //akan menampilkan secara array
	}

	// menambah data supplier pada db supplier
	public function addSupplier($data)
	{
		return $this->db->insert('supplier', $data);
	}

	// meng-update data supplier menggunakan idsupplier pada db supplier
	public function updateSupplier($idsupplier, $data)
	{
		$this->db->where('idsupplier', $idsupplier);
		return $this->db->update('supplier', $data);
	}

	// menghapus data supplier dari db supplier menggunakan id supplier
	public function deleteSupplier($idsupplier)
	{
		return $this->db->delete('supplier', ['idsupplier' => $idsupplier]);
	}

	// public function get_keyword($keyword)
	// {
	// 	$this->db->select('*');
	// 	$this->db->from('supplier');
	// 	$this->db->like('Namasupplier', $keyword);
	// 	$this->db->or_like('alamatsupplier', $keyword);
	// 	$this->db->or_like('contactsupplier', $keyword);
	// 	$this->db->or_like('emailsupplier', $keyword);
	// 	$this->db->or_like('kotasupplier', $keyword);
	// 	return $this->db->get()->result_array();
	// }
}
