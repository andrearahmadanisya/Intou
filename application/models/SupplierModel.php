<?php

class SupplierModel extends CI_Model
{
	public function getAllSupplier()
	{
		// get all data
		$query = $this->db->query("SELECT * FROM supplier");
		return $query->result_array();
	}

	public function getById($id)
	{
		$query = $this->db->query("SELECT * FROM supplier WHERE idsupplier = '" . $id . "'");
		return $query->row_array();
	}

	public function addSupplier($data)
	{
		return $this->db->insert('supplier', $data);
	}

	public function updateSupplier($idsupplier, $data)
	{
		$this->db->where('idsupplier', $idsupplier);
		return $this->db->update('supplier', $data);
	}

	public function deleteSupplier($idsupplier)
	{
		return $this->db->delete('supplier', ['idsupplier' => $idsupplier]);
	}
}
