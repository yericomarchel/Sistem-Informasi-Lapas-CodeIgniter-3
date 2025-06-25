<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kamar_model extends CI_Model {

    // Fungsi untuk mengambil semua data dari tabel 'kamar'
    public function get_all_kamar()
    {
        $this->db->order_by('blok', 'ASC');
        $this->db->order_by('nama_kamar', 'ASC');
        $query = $this->db->get('kamar');
        return $query->result();
    }

    // Fungsi untuk menyimpan data kamar baru
    public function store_kamar($data)
    {
        return $this->db->insert('kamar', $data);
    }
    
    // Fungsi untuk mengambil satu data kamar berdasarkan ID
    public function get_kamar_by_id($id)
    {
        return $this->db->get_where('kamar', ['id' => $id])->row();
    }

    // Fungsi untuk mengupdate data kamar berdasarkan ID
    public function update_kamar($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('kamar', $data);
    }

    // Fungsi untuk menghapus data kamar berdasarkan ID
    public function delete_kamar($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('kamar');
    }

	public function truncate() { $this->db->truncate('kamar'); }
}
