<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kunjungan extends Pengunjung_Controller {

    public function __construct()
    {
        parent::__construct();
        // Memuat semua model yang dibutuhkan oleh controller ini
        $this->load->model('Warga_binaan_model');
        $this->load->model('Hari_libur_model');
        $this->load->model('Kunjungan_model');
    }

    /**
     * Menampilkan halaman formulir untuk membuat pengajuan kunjungan baru.
     */
    public function create()
    {
        $data['judul'] = 'Formulir Pengajuan Kunjungan';
        
        // Mengambil daftar warga binaan yang aktif untuk ditampilkan di dropdown
        $data['warga_binaan'] = $this->Warga_binaan_model->get_all_warga_binaan();
        
        // Mengambil daftar hari libur untuk dinon-aktifkan di kalender
        $data['hari_libur'] = $this->Hari_libur_model->get_all_libur_array(); 
        
        $this->load->view('pengunjung/kunjungan/create', $data);
    }

    /**
     * Memproses data dari form, memvalidasi, mengupload file, dan menyimpan ke database.
     */
    public function store()
    {
        // Menentukan aturan validasi untuk setiap input form
        $this->form_validation->set_rules('warga_binaan_id', 'Warga Binaan', 'required');
        // 'cek_jadwal' adalah aturan validasi custom yang kita buat di bawah
        $this->form_validation->set_rules('tanggal_kunjungan', 'Tanggal Kunjungan', 'required|callback_cek_jadwal');
        $this->form_validation->set_rules('sesi_kunjungan', 'Sesi Kunjungan', 'required');
        $this->form_validation->set_rules('nama_pengikut', 'Nama Pengikut', 'trim');

        if ($this->form_validation->run() == FALSE) {
            // Jika ada aturan validasi yang gagal, tampilkan kembali form dengan pesan error
            $this->create();
        } else {
            // Konfigurasi untuk proses upload file KTP
            $config['upload_path']   = './uploads/ktp/'; // Pastikan folder ini ada dan writable
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']      = 2048; // 2MB
            $config['encrypt_name']  = TRUE; // Mengubah nama file menjadi acak agar unik

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('path_ktp')) {
                // Jika upload file gagal, kembali ke form dengan pesan error upload
                $this->session->set_flashdata('upload_error', $this->upload->display_errors());
                $this->create();
            } else {
                // Jika upload file berhasil
                $upload_data = $this->upload->data();
                $file_path = 'uploads/ktp/' . $upload_data['file_name'];

                // Siapkan data untuk disimpan ke tabel 'kunjungan'
                $data = [
                    'user_id' => $this->session->userdata('user_id'),
                    'warga_binaan_id' => $this->input->post('warga_binaan_id'),
                    'tanggal_kunjungan' => $this->input->post('tanggal_kunjungan'),
                    'sesi_kunjungan' => $this->input->post('sesi_kunjungan'),
                    'nama_pengikut' => $this->input->post('nama_pengikut'),
                    'path_ktp' => $file_path,
                    'status' => 'Menunggu Persetujuan' // Status awal untuk setiap pengajuan
                ];

                $this->Kunjungan_model->store_kunjungan($data);
                $this->session->set_flashdata('success', 'Pengajuan kunjungan berhasil dikirim! Silakan tunggu konfirmasi dari petugas.');
                redirect('dashboard');
            }
        }
    }

    /**
     * Fungsi callback untuk validasi tanggal yang kompleks.
     * Dipanggil oleh $this->form_validation->set_rules(...'callback_cek_jadwal'...).
     */
    public function cek_jadwal($tanggal)
    {
        // 1. Validasi Weekend (Sabtu/Minggu)
        $dayOfWeek = date('w', strtotime($tanggal)); // 0 untuk Minggu, 6 untuk Sabtu
        if ($dayOfWeek == 0 || $dayOfWeek == 6) {
            $this->form_validation->set_message('cek_jadwal', 'Kunjungan tidak dapat dijadwalkan pada hari Sabtu atau Minggu.');
            return FALSE;
        }

        // 2. Validasi Hari Libur
        $isLibur = $this->Hari_libur_model->is_libur($tanggal);
        if ($isLibur) {
            $this->form_validation->set_message('cek_jadwal', 'Tanggal yang dipilih adalah hari libur.');
            return FALSE;
        }

        // 3. Validasi Kuota Mingguan Warga Binaan
        $wbp_id = $this->input->post('warga_binaan_id');
        // Hanya jalankan jika WBP sudah dipilih
        if ($wbp_id) {
            $isBooked = $this->Kunjungan_model->is_wbp_booked_in_week($wbp_id, $tanggal);
            if ($isBooked) {
                $this->form_validation->set_message('cek_jadwal', 'Warga binaan ini sudah memiliki jadwal kunjungan di minggu yang sama.');
                return FALSE;
            }
        }
        
        return TRUE;
    }

    /**
     * Membuat dan menyediakan file PDF untuk diunduh.
     */
    /**
 * Membuat dan menyediakan file PDF untuk diunduh.
 */
public function download_pdf($id)
{
    // 1. Load library PDF yang sudah kita buat
    $this->load->library('pdf');

    // 2. Ambil data kunjungan yang spesifik
    $kunjungan = $this->Kunjungan_model->get_kunjungan_detail_by_id($id);

    // 3. Pengecekan Keamanan
    if (!$kunjungan || $kunjungan->user_id != $this->session->userdata('user_id') || $kunjungan->status != 'Disetujui') {
        show_404(); // Tampilkan halaman tidak ditemukan jika tidak berhak
    }

    $data['kunjungan'] = $kunjungan;

    // 4. Render view PDF menjadi string HTML
    $html = $this->load->view('pdf/bukti_kunjungan', $data, true);

    // 5. Load HTML tersebut ke DomPDF
    $this->pdf->loadHtml($html);

    // 6. Atur ukuran kertas dan orientasi
    $this->pdf->setPaper('A4', 'portrait');

    // 7. Render HTML menjadi PDF
    $this->pdf->render();

    // 8. Tawarkan file untuk diunduh
    $filename = "bukti-kunjungan-".$kunjungan->id.".pdf";
    $this->pdf->stream($filename, array("Attachment" => 1)); // 1 = download, 0 = preview
}
}
