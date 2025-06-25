<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    // Fungsi untuk mengambil data user berdasarkan email (untuk login)
    public function get_user_by_email($email)
    {
        return $this->db->get_where('users', ['email' => $email])->row();
    }

    // Fungsi untuk membuat user baru (untuk registrasi)
    public function create_user($data)
    {
        return $this->db->insert('users', $data);
    }

    // ==========================================================
    // === FUNGSI BARU YANG HILANG, TAMBAHKAN INI ===
    // ==========================================================
    /**
     * Mengambil satu data user berdasarkan ID-nya.
     * Digunakan untuk menampilkan nama staf di laporan.
     */
    public function get_user_by_id($id)
    {
        // Jika tidak ada ID, jangan jalankan query
        if (!$id) {
            return null;
        }
        return $this->db->get_where('users', ['id' => $id])->row();
    }
    // ==========================================================


    /**
     * Mengosongkan tabel untuk keperluan seeder.
     */
    public function truncate() {
        return $this->db->truncate('users');
    }
}
