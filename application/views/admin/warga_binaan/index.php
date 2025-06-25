<?php $this->load->view('layouts/admin_header'); ?>
<?php $this->load->view('layouts/admin_sidebar'); ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1><?php echo $judul; ?></h1>
    <a href="<?php echo site_url('admin/warga_binaan/create'); ?>" class="btn btn-success">+ Tambah Warga Binaan</a>
</div>

<?php if ($this->session->flashdata('success')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $this->session->flashdata('success'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
<?php endif; ?>

<div class="card">
    <div class="card-header">Daftar Warga Binaan</div>
    <div class="card-body">
        <table class="table table-bordered table-striped data-table">
            <thead class="thead-dark">
                <tr>
                    <th style="width: 5%;">No</th>
                    <th>Nama Lengkap</th>
                    <th>No. Registrasi</th>
                    <th>Kamar / Blok</th>
                    <th>Status</th>
                    <th style="width: 15%;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($warga_binaan)) : ?>
                    <?php $no = 1; ?>
                    <?php foreach ($warga_binaan as $wbp) : ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo htmlspecialchars($wbp->nama_lengkap, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($wbp->nomor_registrasi, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo $wbp->nama_kamar ? htmlspecialchars($wbp->nama_kamar . ' (' . $wbp->blok . ')', ENT_QUOTES, 'UTF-8') : '<span class="text-muted">Belum Ditempatkan</span>'; ?></td>
                            <td>
                                <?php if($wbp->status == 'Aktif'): ?>
                                    <span class="badge badge-success">Aktif</span>
                                <?php else: ?>
                                    <span class="badge badge-secondary">Tidak Aktif</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?php echo site_url('admin/warga_binaan/edit/'.$wbp->id); ?>" class="btn btn-sm btn-primary">Edit</a>

                              
                                <?php echo form_open('admin/warga_binaan/destroy/'.$wbp->id, ['class' => 'd-inline delete-form']); ?>
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                <?php echo form_close(); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr><td colspan="6" class="text-center">Data warga binaan belum tersedia.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php $this->load->view('layouts/admin_footer'); ?>
