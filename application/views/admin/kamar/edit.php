<?php $this->load->view('layouts/admin_header'); ?>
<?php $this->load->view('layouts/admin_sidebar'); ?>

<h1><?php echo $judul; ?></h1>
<hr>

<div class="card">
    <div class="card-header">
        Formulir Edit Kamar
    </div>
    <div class="card-body">
        <?php echo form_open('admin/kamar/update/'.$kamar->id); ?>

            <div class="form-group">
                <label for="nama_kamar">Nama Kamar</label>
                <input type="text" name="nama_kamar" class="form-control <?php echo (form_error('nama_kamar')) ? 'is-invalid' : ''; ?>" id="nama_kamar" value="<?php echo set_value('nama_kamar', $kamar->nama_kamar); ?>">
                <div class="invalid-feedback"><?php echo form_error('nama_kamar'); ?></div>
            </div>

            <div class="form-group">
                <label for="blok">Blok</label>
                <input type="text" name="blok" class="form-control <?php echo (form_error('blok')) ? 'is-invalid' : ''; ?>" id="blok" value="<?php echo set_value('blok', $kamar->blok); ?>">
                <div class="invalid-feedback"><?php echo form_error('blok'); ?></div>
            </div>

            <div class="form-group">
                <label for="kapasitas">Kapasitas</label>
                <input type="number" name="kapasitas" class="form-control <?php echo (form_error('kapasitas')) ? 'is-invalid' : ''; ?>" id="kapasitas" value="<?php echo set_value('kapasitas', $kamar->kapasitas); ?>">
                <div class="invalid-feedback"><?php echo form_error('kapasitas'); ?></div>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="<?php echo site_url('admin/kamar'); ?>" class="btn btn-secondary">Batal</a>

        <?php echo form_close(); ?>
    </div>
</div>


<?php $this->load->view('layouts/admin_footer'); ?>
