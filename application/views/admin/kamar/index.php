<?php $this->load->view('layouts/admin_header'); ?>
<?php $this->load->view('layouts/admin_sidebar'); ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1><?php echo $judul; ?></h1>
    <a href="<?php echo site_url('admin/kamar/create'); ?>" class="btn btn-success">+ Tambah Kamar Baru</a>
</div>

<?php if ($this->session->flashdata('success')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $this->session->flashdata('success'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
<?php endif; ?>

<div class="card">
    <div class="card-header">Daftar Kamar & Blok</div>
    <div class="card-body">
        <table class="table table-bordered table-striped data-table">
            <thead class="thead-dark">
                <tr>
                    <th style="width: 5%;">No</th>
                    <th>Nama Kamar</th>
                    <th>Blok</th>
                    <th>Kapasitas</th>
                    <th style="width: 15%;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($daftar_kamar)) : ?>
                    <?php $no = 1; ?>
                    <?php foreach ($daftar_kamar as $kamar) : ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo htmlspecialchars($kamar->nama_kamar, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($kamar->blok, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($kamar->kapasitas, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td>
                                <a href="<?php echo site_url('admin/kamar/edit/'.$kamar->id); ?>" class="btn btn-sm btn-primary">Edit</a>

                              
                                <?php echo form_open('admin/kamar/destroy/'.$kamar->id, ['class' => 'd-inline delete-form']); ?>
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                <?php echo form_close(); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr><td colspan="5" class="text-center">Data kamar belum tersedia.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php $this->load->view('layouts/admin_footer'); ?>
