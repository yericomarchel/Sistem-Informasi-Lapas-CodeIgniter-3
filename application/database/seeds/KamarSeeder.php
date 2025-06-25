<?php
class KamarSeeder {
    protected $CI;

    public function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->model('Kamar_model');
    }

    public function run() {
        $data = [
            ['nama_kamar' => 'Kamar 101', 'blok' => 'A (Mawar)', 'kapasitas' => 4],
            ['nama_kamar' => 'Kamar 102', 'blok' => 'A (Mawar)', 'kapasitas' => 4],
            ['nama_kamar' => 'Kamar 201', 'blok' => 'B (Melati)', 'kapasitas' => 2],
            ['nama_kamar' => 'Kamar 202', 'blok' => 'B (Melati)', 'kapasitas' => 2],
            ['nama_kamar' => 'Sel Isolasi', 'blok' => 'C (Khusus)', 'kapasitas' => 1],
        ];
        foreach ($data as $item) {
            $this->CI->Kamar_model->store_kamar($item);
        }
    }
}
