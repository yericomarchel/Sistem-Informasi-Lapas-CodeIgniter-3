<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // Logika Penjaga: Cek apakah ada data 'user_id' di session
        if ( ! $this->session->userdata('user_id')) {
            // Jika tidak ada, artinya belum login
            $this->session->set_flashdata('error', 'Anda harus login terlebih dahulu untuk mengakses halaman ini.');
            redirect('login');
        }
    }
}
