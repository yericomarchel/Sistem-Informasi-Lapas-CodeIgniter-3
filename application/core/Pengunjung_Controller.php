<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengunjung_Controller extends MY_Controller {

    public function __construct()
    {
        parent::__construct(); // Menjalankan pengecekan login dari induknya

        // Cek role user, pastikan adalah 'pengunjung'
        if ($this->session->userdata('role') !== 'pengunjung') {
            // Jika bukan pengunjung, "tendang" keluar
            $this->session->set_flashdata('error', 'Anda tidak memiliki hak akses ke halaman ini.');
            redirect('/'); 
        }
    }
}
