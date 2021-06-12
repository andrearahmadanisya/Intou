<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{

    public function cek_username($username)
    {
        $query = $this->db->get_where('account', ['username' => $username]);
        return $query->row_array();
    }

    public function get_password($username)
    {
        $data = $this->db->get_where('account', ['username' => $username])->row_array();
        return $data['password'];
    }

    public function userdata($username)
    {
        return $this->db->get_where('account', ['username' => $username])->row_array();
    }


    /////////////////////////////DATA FUNGSI(BUKU,SUPP,PELANGGAN)//////////////////////////////////////////////////

    public function get($table, $data = null, $where = null)
    {
        if ($data != null) {
            return $this->db->get_where($table, $data)->row_array();
        } else {
            return $this->db->get_where($table, $where)->result_array();
        }
    }

    public function update($table, $pk, $id, $data)
    {
        $this->db->where($pk, $id);
        return $this->db->update($table, $data);
    }

    public function insert($table, $data, $batch = false)
    {
        return $batch ? $this->db->insert_batch($table, $data) : $this->db->insert($table, $data);
    }

    public function delete($table, $pk, $id)
    {
        return $this->db->delete($table, [$pk => $id]);
    }


    public function getbuku()
    {
        $this->db->join('category c', 'b.idcategory = c.idcategory');
        $this->db->order_by('idbuku');
        return $this->db->get('buku b')->result_array();
    }

    public function getbukuMasuk($limit = null,  $id_buku = null, $range = null)
    {
        $this->db->select('*');
        $this->db->join('supplier sp', 'bm.idsupplier = sp.idsupplier');
        $this->db->join('buku b', 'bm.id_buku = b.idbuku');
        $this->db->join('category c', 'b.idcategory = c.idcategory');
        if ($limit != null) {
            $this->db->limit($limit);
        }

        if ($id_buku != null) {
            $this->db->where('idbuku', $id_buku);
        }
        if ($range != null) {
            $this->db->where('tanggal_masuk' . ' >=', $range['mulai']);
            $this->db->where('tanggal_masuk' . ' <=', $range['akhir']);
        }

        $this->db->order_by('idtransaksi', 'DESC');
        return $this->db->get('transaksimsk bm')->result_array();
    }

    public function getbukuKeluar($limit = null, $id_buku = null, $range = null)
    {
        $this->db->select('*');
        $this->db->join('pelanggan p', 'bk.idpelanggan = p.idpelanggan');
        $this->db->join('buku b', 'bk.id_buku = b.idbuku');
        $this->db->join('category c', 'b.idcategory = c.idcategory');
        if ($limit != null) {
            $this->db->limit($limit);
        }
        if ($id_buku != null) {
            $this->db->where('id_buku', $id_buku);
        }
        if ($range != null) {
            $this->db->where('tanggal_keluar' . ' >=', $range['mulai']);
            $this->db->where('tanggal_keluar' . ' <=', $range['akhir']);
        }
        $this->db->order_by('idpenjualan', 'DESC');
        return $this->db->get('transaksipjl bk')->result_array();
    }

    public function getMax($table, $field, $kode = null)
    {
        $this->db->select_max($field);
        if ($kode != null) {
            $this->db->like($field, $kode, 'after');
        }
        return $this->db->get($table)->row_array()[$field];
    }

    public function count($table)
    {
        return $this->db->count_all($table);
    }

    public function sum($table, $field)
    {
        $this->db->select_sum($field);
        return $this->db->get($table)->row_array()[$field];
    }

    public function min($table, $field, $min)
    {
        $field = $field . ' <=';
        $this->db->where($field, $min);
        return $this->db->get($table)->result_array();
    }

    public function chartbukuMasuk($bulan)
    {
        $like = 'T-BM-' . date('y') . $bulan;
        $this->db->like('idtransaksi', $like, 'after');
        return count($this->db->get('transaksimsk')->result_array());
    }

    public function chartbukuKeluar($bulan)
    {
        $like = 'T-BK-' . date('y') . $bulan;
        $this->db->like('idpenjualan', $like, 'after');
        return count($this->db->get('transaksipjl')->result_array());
    }

    public function laporan($table, $mulai, $akhir)
    {
        $tgl = $table == 'transaksimsk' ? 'tanggal_masuk' : 'tanggal_keluar';
        $this->db->where($tgl . ' >=', $mulai);
        $this->db->where($tgl . ' <=', $akhir);
        return $this->db->get($table)->result_array();
    }

    public function cekStok($id)
    {
        $this->db->join('category c', 'b.idcategory=c.idcategory');
        return $this->db->get_where('buku b', ['idbuku' => $id])->row_array();
    }
    ////////////////////HISTORY BUKU///////////////////

    // mengambil data buku yang ada pada db
    public function getAllHistoryBuku()
    {
        // get all data
        $this->db->join('category c', 'h.idcategory = c.idcategory');
        $this->db->order_by('idbuku');
        return $this->db->get('historybuku h')->result_array();
        // $query = $this->db->query("SELECT * FROM historybuku");
        // return $query->result_array();
    }

    // menambahkan data buku kedalam db history
    public function addHistory($data)
    {
        $this->db->insert('historybuku', $data);
    }

    public function getById($id)
    {
        $query = $this->db->query("SELECT * FROM buku WHERE idbuku = '" . $id . "'");
        // return $this->db->get_where('buku b', ['idbuku'])->row_array();
        return  $query->row_array();
    }
}
