<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hari_libur extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Hari_libur_model');
    }

    public function index()
    {
        $data['judul'] = 'Kelola Hari Libur';
        $data['hari_libur'] = $this->Hari_libur_model->get_all();
        $this->load->view('admin/hari_libur/index', $data);
    }

    public function store()
    {
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required|is_unique[hari_libur.tanggal]');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|max_length[255]');

        if ($this->form_validation->run() == FALSE) {
            $this->index(); // Jika gagal, tampilkan kembali halaman index dengan errornya
        } else {
            $data = [
                'tanggal' => $this->input->post('tanggal'),
                'keterangan' => $this->input->post('keterangan')
            ];
            $this->Hari_libur_model->store($data);
            $this->session->set_flashdata('success', 'Hari libur berhasil ditambahkan.');
            redirect('admin/hari-libur');
        }
    }

    public function destroy($id)
    {
        $this->Hari_libur_model->delete($id);
        $this->session->set_flashdata('success', 'Hari libur berhasil dihapus.');
        redirect('admin/hari-libur');
    }
}
