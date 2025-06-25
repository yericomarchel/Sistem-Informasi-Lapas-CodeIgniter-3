<?php $this->load->view('layouts/admin_header'); ?>

<h1><?php echo $judul; ?></h1>
<hr>

<?php echo form_open('admin/warga_binaan/store'); ?>
    <div class="form-group">
        <label>Nama Lengkap</label>
        <input type="text" name="nama_lengkap" class="form-control" value="<?php echo set_value('nama_lengkap'); ?>">
        <small class="text-danger"><?php echo form_error('nama_lengkap'); ?></small>
    </div>
    <div class="form-group">
        <label>Nomor Registrasi</label>
        <input type="text" name="nomor_registrasi" class="form-control" value="<?php echo set_value('nomor_registrasi'); ?>">
        <small class="text-danger"><?php echo form_error('nomor_registrasi'); ?></small>
    </div>
    <div class="form-group">
        <label>Kamar / Sel</label>
        <select name="kamar_id" class="form-control">
            <option value="">-- Pilih Kamar --</option>
            <?php foreach($kamar as $k): ?>
                <option value="<?php echo $k->id; ?>" <?php echo set_select('kamar_id', $k->id); ?>><?php echo $k->nama_kamar . ' (' . $k->blok . ')'; ?></option>
            <?php endforeach; ?>
        </select>
        <small class="text-danger"><?php echo form_error('kamar_id'); ?></small>
    </div>
    <div class="form-group">
        <label>Status</label>
        <select name="status" class="form-control">
            <option value="Aktif" <?php echo set_select('status', 'Aktif', TRUE); ?>>Aktif</option>
            <option value="Tidak Aktif" <?php echo set_select('status', 'Tidak Aktif'); ?>>Tidak Aktif</option>
        </select>
        <small class="text-danger"><?php echo form_error('status'); ?></small>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="<?php echo site_url('admin/warga_binaan'); ?>" class="btn btn-secondary">Batal</a>
<?php echo form_close(); ?>

<?php $this->load->view('layouts/admin_footer'); ?>
