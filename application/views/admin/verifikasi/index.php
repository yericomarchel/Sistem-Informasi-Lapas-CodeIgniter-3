<?php $this->load->view('layouts/admin_header'); ?>
<?php $this->load->view('layouts/admin_sidebar'); ?>

<h1><?php echo $judul; ?></h1>
<hr>
<?php if ($this->session->flashdata('success')) : ?>
    <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
<?php endif; ?>

<div class="card">
    <div class="card-header">Daftar Pengajuan Kunjungan Baru</div>
    <div class="card-body">
        <table class="table table-bordered table-striped data-table">
            <thead class="thead-dark">
                <tr>
                    <th>Tgl Pengajuan</th>
                    <th>Nama Pengunjung</th>
                    <th>Warga Binaan Tujuan</th>
                    <th>Rencana Kunjungan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($requests)): ?>
                    <?php foreach($requests as $req): ?>
                    <tr>
                        <td><?php echo date('d M Y H:i', strtotime($req->created_at)); ?></td>
                        <td><?php echo htmlspecialchars($req->nama_pengunjung, ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($req->nama_wbp, ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo date('d M Y', strtotime($req->tanggal_kunjungan)); ?></td>
                        <td>
                            <a href="<?php echo site_url('admin/verifikasi/show/'.$req->id); ?>" class="btn btn-sm btn-info">Lihat Detail</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="5" class="text-center">Tidak ada pengajuan kunjungan baru.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>


<?php $this->load->view('layouts/admin_footer'); ?>
