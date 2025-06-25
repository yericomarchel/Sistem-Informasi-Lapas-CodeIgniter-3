<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        // Autoload akan memuat model-model ini secara otomatis
    }

    public function index()
    {
        $data['judul'] = 'Dashboard Admin';

        // 1. Ambil data untuk Kartu Statistik
        $data['jumlah_pengajuan_baru'] = $this->Kunjungan_model->count_pending();
        $data['kunjungan_hari_ini'] = $this->Kunjungan_model->count_approved_today();
        $data['total_warga_binaan'] = $this->Warga_binaan_model->count_active();

        // 2. Ambil 5 pengajuan terbaru untuk "To-Do List"
        $data['pengajuan_terbaru'] = $this->Kunjungan_model->get_latest_pending(5);

        // 3. Ambil jadwal kunjungan yang disetujui untuk hari ini
        $data['jadwal_hari_ini'] = $this->Kunjungan_model->get_scheduled_today();

        $this->load->view('admin/dashboard_view', $data);
    }
}
