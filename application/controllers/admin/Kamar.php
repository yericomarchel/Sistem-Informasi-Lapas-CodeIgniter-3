<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Pastikan nama Class adalah "Kamar" (huruf K besar), sama dengan nama file
class Kamar extends Admin_Controller {

    public function __construct()
    {
        // Pastikan baris ini ada dan berada di paling atas method __construct
        parent::__construct(); 

        $this->load->model('Kamar_model');
        $this->load->library('form_validation');
        $this->load->helper('form');
        // Pastikan URL helper sudah di-autoload atau di-load di sini jika belum
        $this->load->helper('url'); 
    }

    public function index()
    {
        $data['daftar_kamar'] = $this->Kamar_model->get_all_kamar();
        $data['judul'] = 'Manajemen Kamar & Blok';
        $this->load->view('admin/kamar/index', $data);
    }

    public function create()
    {
        $data['judul'] = 'Form Tambah Data Kamar';
        $this->load->view('admin/kamar/create', $data);
    }

    public function store()
    {
        $this->form_validation->set_rules('nama_kamar', 'Nama Kamar', 'required|max_length[100]');
        $this->form_validation->set_rules('blok', 'Blok', 'required|max_length[50]');
        $this->form_validation->set_rules('kapasitas', 'Kapasitas', 'required|integer');

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = [
                'nama_kamar' => $this->input->post('nama_kamar'),
                'blok' => $this->input->post('blok'),
                'kapasitas' => $this->input->post('kapasitas')
            ];
            $this->Kamar_model->store_kamar($data);
            $this->session->set_flashdata('success', 'Data kamar berhasil ditambahkan!');
            redirect('admin/kamar');
        }
    }

    public function edit($id)
    {
        $data['judul'] = 'Form Edit Data Kamar';
        $data['kamar'] = $this->Kamar_model->get_kamar_by_id($id);

        if (!$data['kamar']) {
            show_404();
        }

        $this->load->view('admin/kamar/edit', $data);
    }

    public function update($id)
    {
        $this->form_validation->set_rules('nama_kamar', 'Nama Kamar', 'required|max_length[100]');
        $this->form_validation->set_rules('blok', 'Blok', 'required|max_length[50]');
        $this->form_validation->set_rules('kapasitas', 'Kapasitas', 'required|integer');

        if ($this->form_validation->run() == FALSE) {
            $this->edit($id);
        } else {
            $data = [
                'nama_kamar' => $this->input->post('nama_kamar'),
                'blok' => $this->input->post('blok'),
                'kapasitas' => $this->input->post('kapasitas')
            ];
            $this->Kamar_model->update_kamar($id, $data);
            $this->session->set_flashdata('success', 'Data kamar berhasil diupdate!');
            redirect('admin/kamar');
        }
    }

    public function destroy($id)
    {
        $this->Kamar_model->delete_kamar($id);
        $this->session->set_flashdata('success', 'Data kamar berhasil dihapus!');
        redirect('admin/kamar');
    }
}
