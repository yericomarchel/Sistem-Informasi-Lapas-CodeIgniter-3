<?php
class UserSeeder {
    protected $CI;

    public function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->model('User_model');
    }

    public function run() {
        $hashed_password = password_hash('password123', PASSWORD_BCRYPT);
        $data = [
            [
                'name' => 'Staf Admin Rutan', 'email' => 'staf@rutan.com',
                'password' => $hashed_password, 'role' => 'staf', 'nik' => '1000000000000001', 'phone_number' => '081200000001'
            ],
            [
                'name' => 'Ahmad Pengunjung', 'email' => 'pengunjung1@example.com',
                'password' => $hashed_password, 'role' => 'pengunjung', 'nik' => '2000000000000001', 'phone_number' => '081200000002'
            ],
            [
                'name' => 'Budi Setiawan', 'email' => 'pengunjung2@example.com',
                'password' => $hashed_password, 'role' => 'pengunjung', 'nik' => '2000000000000002', 'phone_number' => '081200000003'
            ],
        ];
        foreach ($data as $item) {
            $this->CI->User_model->create_user($item);
        }
    }
}
