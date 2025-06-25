<?php $this->load->view('layouts/admin_header'); ?>
<?php $this->load->view('layouts/admin_sidebar'); ?>

<h1><?php echo $judul; ?></h1>
<hr>
<div class="row">
    <div class="col-md-8">
        <table class="table table-striped">
            <tr><th>Nama Pengunjung</th><td><?php echo $kunjungan->nama_pengunjung; ?></td></tr>
            <tr><th>Warga Binaan Tujuan</th><td><?php echo $kunjungan->nama_wbp; ?></td></tr>
            <tr><th>Tanggal Rencana Kunjungan</th><td><?php echo date('d F Y', strtotime($kunjungan->tanggal_kunjungan)); ?></td></tr>
            <tr><th>Sesi Kunjungan</th><td><?php echo $kunjungan->sesi_kunjungan; ?></td></tr>
            <tr><th>Pengikut Lain</th><td><?php echo !empty($kunjungan->nama_pengikut) ? $kunjungan->nama_pengikut : '-'; ?></td></tr>
        </table>
        <div class="mt-4">
            <?php echo form_open('admin/verifikasi/approve/'.$kunjungan->id, ['class' => 'd-inline']); ?>
                <button type="submit" class="btn btn-success">Setujui</button>
            <?php echo form_close(); ?>

            <?php echo form_open('admin/verifikasi/reject/'.$kunjungan->id, ['class' => 'd-inline']); ?>
                <button type="submit" class="btn btn-danger">Tolak</button>
            <?php echo form_close(); ?>

            <a href="<?php echo site_url('admin/verifikasi'); ?>" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
    <div class="col-md-4">
        <h5>Foto KTP Penanggung Jawab</h5>
        <img src="<?php echo base_url($kunjungan->path_ktp); ?>" class="img-fluid img-thumbnail" alt="Foto KTP">
    </div>
</div>

<?php $this->load->view('layouts/admin_footer'); ?>
