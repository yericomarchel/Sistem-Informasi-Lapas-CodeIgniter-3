<?php $this->load->view('layouts/pengunjung_header'); ?>

<h1><?php echo $judul; ?></h1>
<hr>

<div class="card">
    <div class="card-header">
        Formulir Pengajuan Kunjungan
    </div>
    <div class="card-body">
        <?php if ($this->session->flashdata('upload_error')) : ?>
            <div class="alert alert-danger"><?php echo $this->session->flashdata('upload_error'); ?></div>
        <?php endif; ?>

        
        <?php echo form_open_multipart('kunjungan/store', ['id' => 'kunjunganForm']); ?>

            
            <div class="form-group">
                <label for="warga_binaan_id">Nama Warga Binaan yang Dituju <span class="text-danger">*</span></label>
                <select name="warga_binaan_id" id="warga_binaan_id" class="form-control">
                    <option value="">-- Pilih Warga Binaan --</option>
                    <?php foreach($warga_binaan as $wbp): ?>
                        <?php if($wbp->status == 'Aktif'): ?>
                            <option value="<?php echo $wbp->id; ?>" <?php echo set_select('warga_binaan_id', $wbp->id); ?>>
                                <?php echo $wbp->nama_lengkap; ?>
                            </option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
                <small class="text-danger"><?php echo form_error('warga_binaan_id'); ?></small>
            </div>
            <div class="form-group">
                <label>Tanggal Rencana Kunjungan <span class="text-danger">*</span></label>
                <input type="text" name="tanggal_kunjungan" class="form-control datepicker" value="<?php echo set_value('tanggal_kunjungan'); ?>" placeholder="Pilih tanggal..." readonly>
                <small class="text-danger"><?php echo form_error('tanggal_kunjungan'); ?></small>
            </div>
            <div class="form-group">
                <label>Sesi Kunjungan <span class="text-danger">*</span></label>
                <select name="sesi_kunjungan" class="form-control">
                    <option value="Sesi Pagi (09:00 - 11:00)" <?php echo set_select('sesi_kunjungan', 'Sesi Pagi (09:00 - 11:00)'); ?>>Sesi Pagi (09:00 - 11:00)</option>
                    <option value="Sesi Siang (14:00 - 15:00)" <?php echo set_select('sesi_kunjungan', 'Sesi Siang (14:00 - 15:00)'); ?>>Sesi Siang (14:00 - 15:00)</option>
                </select>
            </div>
            <div class="form-group">
                <label>Nama Pengikut (jika ada, pisahkan koma)</label>
                <textarea name="nama_pengikut" class="form-control"><?php echo set_value('nama_pengikut'); ?></textarea>
            </div>
            <div class="form-group">
                <label>Upload Foto KTP <span class="text-danger">*</span></label>
                <input type="file" name="path_ktp" class="form-control-file">
                <small class="text-danger"><?php echo form_error('path_ktp'); ?></small>
            </div>

            <button type="submit" class="btn btn-primary" id="submitBtn">
                
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display: none;"></span>
                <span id="btnText">Kirim Pengajuan</span>
            </button>
            <a href="<?php echo site_url('dashboard'); ?>" class="btn btn-secondary">Batal</a>
            
        <?php echo form_close(); ?>
    </div>
</div>

<?php 
// Siapkan script untuk di-passing ke footer
$script = '
<script>
    // Inisialisasi Flatpickr
    flatpickr(".datepicker", {
        locale: "id",
        altInput: true,
        altFormat: "j F Y",
        dateFormat: "Y-m-d",
        minDate: "today",
        disable: [
            function(date) {
                return (date.getDay() === 0 || date.getDay() === 6);
            },
            ...'.json_encode($hari_libur).'
        ],
    });

    // ============================================== --}}
    // === SCRIPT BARU UNTUK LOADING STATE TOMBOL === --}}
    // ============================================== --}}
    document.getElementById("kunjunganForm").addEventListener("submit", function() {
        var submitBtn = document.getElementById("submitBtn");
        var btnText = document.getElementById("btnText");
        var spinner = submitBtn.querySelector(".spinner-border");

        // Non-aktifkan tombol
        submitBtn.disabled = true;
        
        // Sembunyikan teks, tampilkan spinner
        btnText.style.display = "none";
        spinner.style.display = "inline-block";
    });
</script>
';
?>
<?php $this->load->view('layouts/pengunjung_footer', ['extra_js' => $script]); ?>
