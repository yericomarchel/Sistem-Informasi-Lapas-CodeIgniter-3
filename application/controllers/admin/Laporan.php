<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kunjungan_model');
    }

    public function index()
    {
        $data['judul'] = 'Laporan Kunjungan';
        $data['kunjungan_data'] = null;

        if ($this->input->get('tanggal_mulai') && $this->input->get('tanggal_selesai')) {
            $tgl_mulai = $this->input->get('tanggal_mulai');
            $tgl_selesai = $this->input->get('tanggal_selesai');
            $data['kunjungan_data'] = $this->Kunjungan_model->get_laporan($tgl_mulai, $tgl_selesai);
        }

        $this->load->view('admin/laporan/index', $data);
    }

    public function export_pdf()
    {
        $this->load->library('pdf');

        $tgl_mulai = $this->input->get('tanggal_mulai');
        $tgl_selesai = $this->input->get('tanggal_selesai');

        if ($tgl_mulai && $tgl_selesai) {
             $data['kunjungan_data'] = $this->Kunjungan_model->get_laporan($tgl_mulai, $tgl_selesai);
             $data['tanggal_mulai'] = $tgl_mulai;
             $data['tanggal_selesai'] = $tgl_selesai;

             $this->pdf->setPaper('A4', 'landscape');
             $this->pdf->filename = "laporan-kunjungan-".date('Ymd').".pdf";
             $this->pdf->load_view('pdf/laporan_kunjungan', $data);
        } else {
            // Redirect jika tidak ada tanggal
            redirect('admin/laporan');
        }
    }
}
