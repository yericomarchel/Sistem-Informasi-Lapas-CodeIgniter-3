<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hari_libur_model extends CI_Model {

    public function get_all()
    {
        $this->db->order_by('tanggal', 'DESC');
        return $this->db->get('hari_libur')->result();
    }

    public function store($data)
    {
        return $this->db->insert('hari_libur', $data);
    }

    public function delete($id)
    {
        return $this->db->delete('hari_libur', ['id' => $id]);
    }
    
    // Fungsi-fungsi di bawah ini sudah ada sebelumnya, pastikan tetap ada
    public function get_all_libur_array()
    {
        $query = $this->db->get('hari_libur');
        $libur_dates = [];
        foreach($query->result() as $row){
            $libur_dates[] = $row->tanggal;
        }
        return $libur_dates;
    }

    public function is_libur($tanggal)
    {
        $this->db->where('tanggal', $tanggal);
        return $this->db->get('hari_libur')->num_rows() > 0;
    }

    public function truncate() {
        return $this->db->truncate('hari_libur');
    }
}
