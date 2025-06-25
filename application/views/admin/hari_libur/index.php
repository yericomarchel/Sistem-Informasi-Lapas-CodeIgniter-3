<?php $this->load->view('layouts/admin_header'); ?>
<?php $this->load->view('layouts/admin_sidebar'); ?>

<h1><?php echo $judul; ?></h1>
<hr>

<div class="card mb-4">
    <div class="card-header">
        Tambah Hari Libur Baru
    </div>
    <div class="card-body">
        <?php echo form_open('admin/hari-libur/store'); ?>
            <div class="form-row">
                <div class="col-md-4">
                    <input type="date" name="tanggal" class="form-control" required>
                    <small class="text-danger"><?php echo form_error('tanggal'); ?></small>
                </div>
                <div class="col-md-6">
                    <input type="text" name="keterangan" class="form-control" placeholder="Keterangan Hari Libur" required>
                    <small class="text-danger"><?php echo form_error('keterangan'); ?></small>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                </div>
            </div>
        <?php echo form_close(); ?>
    </div>
</div>

<div class="card">
    <div class="card-header">
        Daftar Hari Libur
    </div>
    <div class="card-body">
        <?php if ($this->session->flashdata('success')) : ?>
            <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
        <?php endif; ?>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($hari_libur as $libur): ?>
                <tr>
                    <td><?php echo date('d F Y', strtotime($libur->tanggal)); ?></td>
                    <td><?php echo $libur->keterangan; ?></td>
                    <td>
                        <?php echo form_open('admin/hari-libur/destroy/'.$libur->id, ['onsubmit' => "return confirm('Yakin hapus tanggal ini?');"]); ?>
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        <?php echo form_close(); ?>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php if(empty($hari_libur)): ?>
                    <tr><td colspan="3" class="text-center">Belum ada data hari libur.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>


<?php $this->load->view('layouts/admin_footer'); ?>
