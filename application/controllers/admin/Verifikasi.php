<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verifikasi extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kunjungan_model');
    }

    public function index()
    {
        $data['judul'] = 'Verifikasi Kunjungan Masuk';
        $data['requests'] = $this->Kunjungan_model->get_pending_kunjungan();
        $this->load->view('admin/verifikasi/index', $data);
    }

    public function show($id)
    {
        $data['judul'] = 'Detail Pengajuan Kunjungan';
        $data['kunjungan'] = $this->Kunjungan_model->get_kunjungan_detail_by_id($id);
        if (!$data['kunjungan']) show_404();
        $this->load->view('admin/verifikasi/show', $data);
    }

    public function approve($id)
    {
        $data = [
            'status' => 'Disetujui',
            'approved_by_id' => $this->session->userdata('user_id')
        ];
        $this->Kunjungan_model->update_status($id, $data);
        $this->session->set_flashdata('success', 'Kunjungan telah disetujui.');
        redirect('admin/verifikasi');
    }

    public function reject($id)
    {
        $data = [
            'status' => 'Ditolak',
            'approved_by_id' => $this->session->userdata('user_id')
        ];
        $this->Kunjungan_model->update_status($id, $data);
        $this->session->set_flashdata('success', 'Kunjungan telah ditolak.');
        redirect('admin/verifikasi');
    }
}
