<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// PASTIKAN CONTROLLER INI EXTENDS 'CI_Controller', BUKAN 'MY_Controller'
class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Karena tidak extend MY_Controller, kita tidak perlu takut redirect loop
        $this->load->model('User_model');
        $this->load->library('form_validation');
        $this->load->helper(['url', 'form']);
    }

    public function login()
    {
        // Jika user SUDAH login, jangan biarkan dia ke halaman login lagi
        if ($this->session->userdata('is_logged_in')) {
            if ($this->session->userdata('role') == 'staf') {
                redirect('admin/kamar');
            } else {
                redirect('dashboard'); // Redirect pengunjung ke dashboard mereka
            }
        }
        
        $data['judul'] = 'Login';
        $this->load->view('auth/login', $data);
    }

    public function process_login()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->login();
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->User_model->get_user_by_email($email);

            if ($user && password_verify($password, $user->password)) {
                
                $session_data = [
                    'user_id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'role' => $user->role,
                    'is_logged_in' => TRUE
                ];
                $this->session->set_userdata($session_data);

                if ($user->role == 'staf') {
                    redirect('admin/dashboard');
                } else {
                    redirect('dashboard');
                }

            } else {
                $this->session->set_flashdata('error', 'Email atau Password salah!');
                redirect('login');
            }
        }
    }

    public function register()
    {
        if ($this->session->userdata('is_logged_in')) {
            redirect('dashboard');
        }
        $data['judul'] = 'Registrasi Akun';
        $this->load->view('auth/register', $data);
    }

    public function process_registration()
    {
        $this->form_validation->set_rules('name', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('nik', 'NIK', 'required|numeric|exact_length[16]|is_unique[users.nik]');
        $this->form_validation->set_rules('phone_number', 'Nomor Telepon', 'required|numeric');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('password_confirm', 'Konfirmasi Password', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $this->register();
        } else {
            $hashed_password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
            $data = [
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'nik' => $this->input->post('nik'),
                'phone_number' => $this->input->post('phone_number'),
                'password' => $hashed_password,
                'role' => 'pengunjung'
            ];
            $this->User_model->create_user($data);
            $this->session->set_flashdata('success', 'Registrasi berhasil! Silakan login dengan akun Anda.');
            redirect('login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('success', 'Anda telah berhasil logout.');
        redirect('login');
    }

	public function akses_ditolak()
{
    $data['judul'] = 'Akses Ditolak';
    // Kita gunakan header pengunjung agar ada tombol logout jika user sudah login
    $this->load->view('auth/akses_ditolak', $data);
}
}
