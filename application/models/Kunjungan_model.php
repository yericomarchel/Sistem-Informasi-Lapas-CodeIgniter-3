<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kunjungan_model extends CI_Model {

    public function store_kunjungan($data)
    {
        return $this->db->insert('kunjungan', $data);
    }

    public function get_kunjungan_by_user($user_id)
    {
        $this->db->select('kunjungan.*, warga_binaan.nama_lengkap as nama_wbp');
        $this->db->from('kunjungan');
        $this->db->join('warga_binaan', 'kunjungan.warga_binaan_id = warga_binaan.id', 'left');
        $this->db->where('kunjungan.user_id', $user_id);
        $this->db->order_by('kunjungan.created_at', 'DESC');
        return $this->db->get()->result();
    }

    public function get_pending_kunjungan()
    {
        $this->db->select('kunjungan.*, users.name as nama_pengunjung, warga_binaan.nama_lengkap as nama_wbp');
        $this->db->from('kunjungan');
        $this->db->join('users', 'kunjungan.user_id = users.id');
        $this->db->join('warga_binaan', 'kunjungan.warga_binaan_id = warga_binaan.id');
        $this->db->where('kunjungan.status', 'Menunggu Persetujuan'); // <-- Sudah benar
        $this->db->order_by('kunjungan.created_at', 'ASC');
        return $this->db->get()->result();
    }

    public function get_kunjungan_detail_by_id($id)
    {
        $this->db->select('kunjungan.*, users.name as nama_pengunjung, warga_binaan.nama_lengkap as nama_wbp, approver.name as nama_staf');
        $this->db->from('kunjungan');
        $this->db->join('users', 'kunjungan.user_id = users.id');
        $this->db->join('warga_binaan', 'kunjungan.warga_binaan_id = warga_binaan.id');
        $this->db->join('users as approver', 'kunjungan.approved_by_id = approver.id', 'left');
        $this->db->where('kunjungan.id', $id);
        return $this->db->get()->row();
    }

    public function update_status($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('kunjungan', $data);
    }

    public function is_wbp_booked_in_week($wbp_id, $tanggal)
    {
        $tanggal = new DateTime($tanggal);
        $dayOfWeek = $tanggal->format('w');
        $offset = ($dayOfWeek == 0) ? 6 : $dayOfWeek - 1;

        $startOfWeek = clone $tanggal;
        $startOfWeek->modify("-$offset days");

        $endOfWeek = clone $startOfWeek;
        $endOfWeek->modify("+6 days");

        $this->db->where('warga_binaan_id', $wbp_id);
        $this->db->where('tanggal_kunjungan >=', $startOfWeek->format('Y-m-d'));
        $this->db->where('tanggal_kunjungan <=', $endOfWeek->format('Y-m-d'));
        // DIPERBARUI: tambahkan nama tabel 'kunjungan'
        $this->db->where_in('kunjungan.status', ['Menunggu Persetujuan', 'Disetujui']);
        
        return $this->db->get('kunjungan')->num_rows() > 0;
    }

    public function count_pending()
    {
        // DIPERBARUI: tambahkan nama tabel 'kunjungan'
        $this->db->where('kunjungan.status', 'Menunggu Persetujuan');
        return $this->db->count_all_results('kunjungan');
    }

    public function count_approved_today()
    {
        // DIPERBARUI: tambahkan nama tabel 'kunjungan'
        $this->db->where('kunjungan.status', 'Disetujui');
        $this->db->where('kunjungan.tanggal_kunjungan', date('Y-m-d'));
        return $this->db->count_all_results('kunjungan');
    }

    public function get_latest_pending($limit)
    {
        $this->db->select('kunjungan.*, users.name as nama_pengunjung, warga_binaan.nama_lengkap as nama_wbp');
        $this->db->from('kunjungan');
        $this->db->join('users', 'kunjungan.user_id = users.id');
        $this->db->join('warga_binaan', 'kunjungan.warga_binaan_id = warga_binaan.id');
        $this->db->where('kunjungan.status', 'Menunggu Persetujuan'); // <-- Sudah benar
        $this->db->order_by('kunjungan.created_at', 'DESC');
        $this->db->limit($limit);
        return $this->db->get()->result();
    }

    public function get_scheduled_today()
    {
        $this->db->select('kunjungan.*, users.name as nama_pengunjung, warga_binaan.nama_lengkap as nama_wbp');
        $this->db->from('kunjungan');
        $this->db->join('users', 'kunjungan.user_id = users.id');
        $this->db->join('warga_binaan', 'kunjungan.warga_binaan_id = warga_binaan.id');
        // DIPERBARUI: tambahkan nama tabel 'kunjungan'
        $this->db->where('kunjungan.status', 'Disetujui');
        $this->db->where('kunjungan.tanggal_kunjungan', date('Y-m-d'));
        $this->db->order_by('kunjungan.sesi_kunjungan', 'ASC');
        return $this->db->get()->result();
    }

    public function get_laporan($tgl_mulai, $tgl_selesai)
    {
        $this->db->select('kunjungan.*, users.name as nama_pengunjung, warga_binaan.nama_lengkap as nama_wbp, approver.name as nama_staf');
        $this->db->from('kunjungan');
        $this->db->join('users', 'kunjungan.user_id = users.id');
        $this->db->join('warga_binaan', 'kunjungan.warga_binaan_id = warga_binaan.id');
        $this->db->join('users as approver', 'kunjungan.approved_by_id = approver.id', 'left');
        $this->db->where('kunjungan.tanggal_kunjungan >=', $tgl_mulai);
        $this->db->where('kunjungan.tanggal_kunjungan <=', $tgl_selesai);
        return $this->db->get()->result();
    }

    public function truncate() {
        return $this->db->truncate('kunjungan');
    }

}
