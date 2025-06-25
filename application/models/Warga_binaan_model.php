<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Warga_binaan_model extends CI_Model {

    public function get_all_warga_binaan()
    {
        $this->db->select('warga_binaan.*, kamar.nama_kamar, kamar.blok');
        $this->db->from('warga_binaan');
        $this->db->join('kamar', 'warga_binaan.kamar_id = kamar.id', 'left');
        $this->db->order_by('nama_lengkap', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_warga_binaan_by_id($id)
    {
        return $this->db->get_where('warga_binaan', ['id' => $id])->row();
    }

    public function store_warga_binaan($data)
    {
        return $this->db->insert('warga_binaan', $data);
    }

    public function update_warga_binaan($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('warga_binaan', $data);
    }

    public function delete_warga_binaan($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('warga_binaan');
    }
	public function truncate() { $this->db->truncate('warga_binaan'); }

	public function count_active()
{
    $this->db->where('status', 'Aktif');
    return $this->db->count_all_results('warga_binaan');
}
}
