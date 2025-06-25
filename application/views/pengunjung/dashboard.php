<?php $this->load->view('layouts/pengunjung_header'); ?>

<?php if ($this->session->flashdata('success')) : ?>
    <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
<?php endif; ?>

<h3>Riwayat Pengajuan Kunjungan Anda</h3>
<table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th>Tgl Pengajuan</th>
            <th>Warga Binaan</th>
            <th>Tgl Rencana Kunjungan</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($kunjungan as $k): ?>
        <tr>
            <td><?php echo date('d M Y', strtotime($k->created_at)); ?></td>
            <td><?php echo $k->nama_wbp; ?></td>
            <td><?php echo date('d M Y', strtotime($k->tanggal_kunjungan)); ?></td>
            <td>
                <?php 
                    $status_class = 'badge-secondary';
                    if($k->status == 'Disetujui') $status_class = 'badge-success';
                    if($k->status == 'Ditolak') $status_class = 'badge-danger';
                    if($k->status == 'Menunggu Persetujuan') $status_class = 'badge-warning';
                ?>
                <span class="badge <?php echo $status_class; ?>"><?php echo $k->status; ?></span>
            </td>
            <td>
                <?php if($k->status == 'Disetujui'): ?>
                    <a href="<?php echo site_url('kunjungan/download_pdf/'.$k->id); ?>" class="btn btn-sm btn-info" target="_blank">Unduh PDF</a>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
        <?php if(empty($kunjungan)): ?>
            <tr><td colspan="5" class="text-center">Anda belum memiliki riwayat pengajuan.</td></tr>
        <?php endif; ?>
    </tbody>
</table>

<?php $this->load->view('layouts/pengunjung_footer'); ?>
