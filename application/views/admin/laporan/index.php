<?php $this->load->view('layouts/admin_header'); ?>
<?php $this->load->view('layouts/admin_sidebar'); ?>

<h1><?php echo $judul; ?></h1>
<hr>

<div class="card mb-4">
    <div class="card-header">
        Pilih Periode Laporan
    </div>
    <div class="card-body">
        <form action="<?php echo site_url('admin/laporan'); ?>" method="GET">
            <div class="form-row align-items-end">
                <div class="col">
                    <label>Tanggal Mulai</label>
                    <input type="date" name="tanggal_mulai" class="form-control" value="<?php echo $this->input->get('tanggal_mulai'); ?>" required>
                </div>
                <div class="col">
                    <label>Tanggal Selesai</label>
                    <input type="date" name="tanggal_selesai" class="form-control" value="<?php echo $this->input->get('tanggal_selesai'); ?>" required>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">Tampilkan</button>
                    <?php if ($kunjungan_data) : ?>
                        <a href="<?php echo site_url('admin/laporan/export?tanggal_mulai='.$this->input->get('tanggal_mulai').'&tanggal_selesai='.$this->input->get('tanggal_selesai')); ?>" class="btn btn-danger" target="_blank">Export ke PDF</a>
                    <?php endif; ?>
                </div>
            </div>
        </form>
    </div>
</div>

<?php if ($kunjungan_data) : ?>
<div class="card">
    <div class="card-header">
        Hasil Laporan Periode <?php echo date('d M Y', strtotime($this->input->get('tanggal_mulai'))) . ' - ' . date('d M Y', strtotime($this->input->get('tanggal_selesai'))); ?>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Tgl. Kunjungan</th>
                    <th>Pengunjung</th>
                    <th>Warga Binaan</th>
                    <th>Status</th>
                    <th>Diverifikasi Oleh</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($kunjungan_data)) : ?>
                    <?php $no = 1; ?>
                    <?php foreach ($kunjungan_data as $k) : ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo date('d M Y', strtotime($k->tanggal_kunjungan)); ?></td>
                            <td><?php echo $k->nama_pengunjung; ?></td>
                            <td><?php echo $k->nama_wbp; ?></td>
                            <td><?php echo $k->status; ?></td>
                            <td><?php echo $this->User_model->get_user_by_id($k->approved_by_id)->name ?? '-'; ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr><td colspan="6" class="text-center">Tidak ada data kunjungan pada periode ini.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php endif; ?>

<?php $this->load->view('layouts/admin_footer'); ?>
