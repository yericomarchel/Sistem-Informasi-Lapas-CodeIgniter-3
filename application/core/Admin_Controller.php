<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Controller ini mewarisi semua sifat dari MY_Controller
class Admin_Controller extends MY_Controller {

    public function __construct()
    {
        parent::__construct(); // Menjalankan pengecekan login dari induknya

        // Logika Penjaga Tambahan: Cek apakah role user adalah 'staf'
        if ($this->session->userdata('role') !== 'staf') {
            // Jika bukan staf, "tendang" ke halaman 'Akses Ditolak'
            // Kita tidak perlu flashdata lagi karena halamannya sudah sangat jelas
            redirect('akses_ditolak');
        }
    }
}
