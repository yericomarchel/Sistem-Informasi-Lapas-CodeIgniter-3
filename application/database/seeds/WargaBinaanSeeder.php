<?php
class WargaBinaanSeeder {
    protected $CI;

    public function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->model('Warga_binaan_model');
        $this->CI->load->model('Kamar_model');
    }

    public function run() {
        $kamarA1 = $this->CI->Kamar_model->get_kamar_by_id(1);
        $kamarB1 = $this->CI->Kamar_model->get_kamar_by_id(3);

        if ($kamarA1 && $kamarB1) {
            $data = [
                [ 'nama_lengkap' => 'Budi Santoso', 'nomor_registrasi' => 'REG-001', 'status' => 'Aktif', 'kamar_id' => $kamarA1->id ],
                [ 'nama_lengkap' => 'Eko Prasetyo', 'nomor_registrasi' => 'REG-002', 'status' => 'Aktif', 'kamar_id' => $kamarA1->id ],
                [ 'nama_lengkap' => 'Agus Wijaya', 'nomor_registrasi' => 'REG-003', 'status' => 'Aktif', 'kamar_id' => $kamarB1->id ],
                [ 'nama_lengkap' => 'Joko Susilo', 'nomor_registrasi' => 'REG-004', 'status' => 'Tidak Aktif', 'kamar_id' => $kamarB1->id ],
            ];
            foreach ($data as $item) {
                $this->CI->Warga_binaan_model->store_warga_binaan($item);
            }
        }
    }
}
