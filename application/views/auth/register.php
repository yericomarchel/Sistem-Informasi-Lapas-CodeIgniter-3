<?php $this->load->view('layouts/auth_header'); ?>

<div class="card auth-card">
    <div class="card-body p-4 p-md-5">
        <h3 class="text-center mb-4">Registrasi Akun Baru</h3>
        
        <?php echo form_open('auth/process_registration'); ?>
            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" name="name" class="form-control" value="<?php echo set_value('name'); ?>">
                <small class="text-danger"><?php echo form_error('name'); ?></small>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo set_value('email'); ?>">
                <small class="text-danger"><?php echo form_error('email'); ?></small>
            </div>
            <div class="form-group">
                <label for="nik">NIK</label>
                <input type="text" name="nik" class="form-control" value="<?php echo set_value('nik'); ?>" placeholder="16 digit NIK">
                <small class="text-danger"><?php echo form_error('nik'); ?></small>
            </div>
            <div class="form-group">
                <label for="phone_number">Nomor Telepon</label>
                <input type="text" name="phone_number" class="form-control" value="<?php echo set_value('phone_number'); ?>" placeholder="Contoh: 08123456789">
                <small class="text-danger"><?php echo form_error('phone_number'); ?></small>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control">
                <small class="text-danger"><?php echo form_error('password'); ?></small>
            </div>
            <div class="form-group">
                <label for="password_confirm">Konfirmasi Password</label>
                <input type="password" name="password_confirm" class="form-control">
                <small class="text-danger"><?php echo form_error('password_confirm'); ?></small>
            </div>
            <button type="submit" class="btn btn-primary btn-block btn-lg mt-4">Daftar</button>
            <div class="text-center mt-3">
                <small class="text-muted">Sudah punya akun? <a href="<?php echo site_url('login'); ?>">Login di sini</a></small>
            </div>
        <?php echo form_close(); ?>
    </div>
</div>

<?php $this->load->view('layouts/auth_footer'); ?>
