<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Pengunjung_Controller { // <-- Mewarisi Pengunjung_Controller

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kunjungan_model'); // Kita akan buat model ini
    }

    public function index()
    {
        $data['judul'] = 'Dashboard Pengunjung';
        $user_id = $this->session->userdata('user_id');
        $data['kunjungan'] = $this->Kunjungan_model->get_kunjungan_by_user($user_id);

        $this->load->view('pengunjung/dashboard', $data);
    }
}
