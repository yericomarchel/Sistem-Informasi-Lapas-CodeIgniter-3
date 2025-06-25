<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Warga_binaan extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Warga_binaan_model');
        $this->load->model('Kamar_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Manajemen Warga Binaan';
        $data['warga_binaan'] = $this->Warga_binaan_model->get_all_warga_binaan();
        $this->load->view('admin/warga_binaan/index', $data);
    }

    public function create()
    {
        $data['judul'] = 'Form Tambah Data Warga Binaan';
        $data['kamar'] = $this->Kamar_model->get_all_kamar();
        $this->load->view('admin/warga_binaan/create', $data);
    }

    public function store()
    {
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('nomor_registrasi', 'Nomor Registrasi', 'required|is_unique[warga_binaan.nomor_registrasi]');
        $this->form_validation->set_rules('kamar_id', 'Kamar', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = [
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'nomor_registrasi' => $this->input->post('nomor_registrasi'),
                'kamar_id' => $this->input->post('kamar_id'),
                'status' => $this->input->post('status')
            ];
            $this->Warga_binaan_model->store_warga_binaan($data);
            $this->session->set_flashdata('success', 'Data warga binaan berhasil ditambahkan!');
            redirect('admin/warga_binaan');
        }
    }

    public function edit($id)
    {
        $data['judul'] = 'Form Edit Data Warga Binaan';
        $data['wbp'] = $this->Warga_binaan_model->get_warga_binaan_by_id($id);
        $data['kamar'] = $this->Kamar_model->get_all_kamar();
        
        if (!$data['wbp']) show_404();

        $this->load->view('admin/warga_binaan/edit', $data);
    }

    public function update($id)
    {
        // Aturan validasi untuk nomor registrasi sedikit berbeda saat update
        $original_value = $this->Warga_binaan_model->get_warga_binaan_by_id($id)->nomor_registrasi;
        if($this->input->post('nomor_registrasi') != $original_value) {
           $is_unique =  '|is_unique[warga_binaan.nomor_registrasi]';
        } else {
           $is_unique =  '';
        }

        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('nomor_registrasi', 'Nomor Registrasi', 'required'.$is_unique);
        $this->form_validation->set_rules('kamar_id', 'Kamar', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->edit($id);
        } else {
            $data = [
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'nomor_registrasi' => $this->input->post('nomor_registrasi'),
                'kamar_id' => $this->input->post('kamar_id'),
                'status' => $this->input->post('status')
            ];
            $this->Warga_binaan_model->update_warga_binaan($id, $data);
            $this->session->set_flashdata('success', 'Data warga binaan berhasil diupdate!');
            redirect('admin/warga_binaan');
        }
    }

    public function destroy($id)
    {
        $this->Warga_binaan_model->delete_warga_binaan($id);
        $this->session->set_flashdata('success', 'Data warga binaan berhasil dihapus!');
        redirect('admin/warga_binaan');
    }
}
