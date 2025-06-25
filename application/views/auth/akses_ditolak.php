<?php $this->load->view('layouts/pengunjung_header'); ?>

<div class="container text-center" style="margin-top: 50px; margin-bottom: 50px;">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1 class="display-1" style="font-size: 10rem; color: var(--c-primary);">403</h1>
            <h2 class="display-4">Akses Ditolak</h2>
            <p class="lead mt-4">
                Maaf, Anda tidak memiliki hak akses untuk mengunjungi halaman yang Anda tuju.
                <br>
                Halaman ini dikhususkan untuk Staf Admin.
            </p>
            <hr class="my-4">
            <p>Silakan kembali ke halaman yang sesuai untuk Anda.</p>
            <a class="btn btn-primary btn-lg" href="<?php echo site_url('dashboard'); ?>" role="button">Kembali ke Dashboard</a>
            <a class="btn btn-secondary btn-lg" href="<?php echo site_url('logout'); ?>" role="button">Logout</a>
        </div>
    </div>
</div>

<?php $this->load->view('layouts/pengunjung_footer'); ?>
