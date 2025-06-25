<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Muat URL helper agar bisa menggunakan site_url() di view
        $this->load->helper('url');
    }

    public function index()
    {
        // Tampilkan view landing page baru kita
        $this->load->view('landing_page');
    }
}
