<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seed extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Keamanan: Pastikan controller ini hanya bisa diakses di mode development
        if (ENVIRONMENT !== 'development') {
            show_404();
        }
        
        // Load semua model yang akan kita gunakan
        $this->load->model([
            'User_model', 
            'Kamar_model', 
            'Warga_binaan_model',
            'Kunjungan_model',
            'Hari_libur_model'
        ]);

        // Load semua file seeder
        require_once APPPATH . 'database/seeds/UserSeeder.php';
        require_once APPPATH . 'database/seeds/KamarSeeder.php';
        require_once APPPATH . 'database/seeds/WargaBinaanSeeder.php';
    }

    public function index() {
        echo "<h1>Seeding Database...</h1>";

        // ==========================================================
        // === BAGIAN YANG DIPERBARUI ADA DI SINI ===
        // ==========================================================
        
        // 1. Non-aktifkan foreign key check
        $this->db->query('SET FOREIGN_KEY_CHECKS = 0');
        echo "<p>Foreign key checks disabled.</p>";

        // 2. Kosongkan semua tabel. Urutan tidak lagi terlalu penting sekarang.
        $this->Kunjungan_model->truncate();
        $this->Warga_binaan_model->truncate();
        $this->Kamar_model->truncate();
        $this->User_model->truncate();
        $this->Hari_libur_model->truncate();
        // Kosongkan juga tabel bawaan CI untuk session jika perlu
        // $this->db->truncate('ci_sessions'); 
        echo "<p>All tables truncated.</p>";

        // 3. Aktifkan kembali foreign key check
        $this->db->query('SET FOREIGN_KEY_CHECKS = 1');
        echo "<p>Foreign key checks enabled.</p>";

        // ==========================================================
        // === AKHIR BAGIAN YANG DIPERBARUI ===
        // ==========================================================
        
        // 4. Jalankan seeder dengan urutan yang benar (induk dulu, baru anak)
        $kamarSeeder = new KamarSeeder();
        $kamarSeeder->run();
        echo "<p>Kamar table seeded.</p>";

        $userSeeder = new UserSeeder();
        $userSeeder->run();
        echo "<p>Users table seeded.</p>";
        
        $wargaBinaanSeeder = new WargaBinaanSeeder();
        $wargaBinaanSeeder->run();
        echo "<p>Warga Binaan table seeded.</p>";

        echo "<h2>Seeding complete!</h2>";
    }
}
