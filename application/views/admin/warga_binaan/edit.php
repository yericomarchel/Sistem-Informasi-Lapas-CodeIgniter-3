<?php $this->load->view('layouts/admin_header'); ?>
<?php $this->load->view('layouts/admin_sidebar'); ?>

<h1><?php echo $judul; ?></h1>
<hr>

<div class="card">
    <div class="card-header">
        Formulir Edit Warga Binaan
    </div>
    <div class="card-body">
        <?php echo form_open('admin/warga_binaan/update/'.$wbp->id); ?>
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="form-control <?php echo (form_error('nama_lengkap')) ? 'is-invalid' : ''; ?>" value="<?php echo set_value('nama_lengkap', $wbp->nama_lengkap); ?>">
                <div class="invalid-feedback"><?php echo form_error('nama_lengkap'); ?></div>
            </div>

            <div class="form-group">
                <label>Nomor Registrasi</label>
                <input type="text" name="nomor_registrasi" class="form-control <?php echo (form_error('nomor_registrasi')) ? 'is-invalid' : ''; ?>" value="<?php echo set_value('nomor_registrasi', $wbp->nomor_registrasi); ?>">
                <div class="invalid-feedback"><?php echo form_error('nomor_registrasi'); ?></div>
            </div>

            <div class="form-group">
                <label>Kamar / Sel</label>
                <select name="kamar_id" class="form-control <?php echo (form_error('kamar_id')) ? 'is-invalid' : ''; ?>">
                    <option value="">-- Pilih Kamar --</option>
                    <?php foreach($kamar as $k): ?>
                        <?php 
                            // Cek apakah kamar ini yang sedang dipilih
                            $selected = ($k->id == $wbp->kamar_id);
                        ?>
                        <option value="<?php echo $k->id; ?>" <?php echo set_select('kamar_id', $k->id, $selected); ?>>
                            <?php echo $k->nama_kamar . ' (' . $k->blok . ')'; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <div class="invalid-feedback"><?php echo form_error('kamar_id'); ?></div>
            </div>
            
            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                    <?php
                        $status_aktif = ($wbp->status == 'Aktif');
                        $status_tidak_aktif = ($wbp->status == 'Tidak Aktif');
                    ?>
                    <option value="Aktif" <?php echo set_select('status', 'Aktif', $status_aktif); ?>>Aktif</option>
                    <option value="Tidak Aktif" <?php echo set_select('status', 'Tidak Aktif', $status_tidak_aktif); ?>>Tidak Aktif</option>
                </select>
                <small class="text-danger"><?php echo form_error('status'); ?></small>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="<?php echo site_url('admin/warga_binaan'); ?>" class="btn btn-secondary">Batal</a>
        <?php echo form_close(); ?>
    </div>
</div>

<?php $this->load->view('layouts/admin_footer'); ?>
