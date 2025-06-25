<?php $this->load->view('layouts/auth_header'); ?>

<div class="card auth-card">
    <div class="card-body p-4 p-md-5">
        <h3 class="text-center mb-4">Login Akun</h3>
        
        <?php if ($this->session->flashdata('error')) : ?>
            <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
        <?php endif; ?>
        
        <?php if ($this->session->flashdata('success')) : ?>
            <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
        <?php endif; ?>

        <?php echo form_open('auth/process_login'); ?>
            <div class="form-group">
                <label for="email">Alamat Email</label>
                <input type="email" name="email" class="form-control form-control-lg" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control form-control-lg" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block btn-lg mt-4">Login</button>
            <div class="text-center mt-3">
                <small class="text-muted">Belum punya akun? <a href="<?php echo site_url('register'); ?>">Daftar di sini</a></small>
            </div>
        <?php echo form_close(); ?>
    </div>
</div>

<?php $this->load->view('layouts/auth_footer'); ?>
