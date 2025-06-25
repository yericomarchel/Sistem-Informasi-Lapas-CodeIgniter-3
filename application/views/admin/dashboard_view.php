<?php $this->load->view('layouts/admin_header'); ?>
<?php $this->load->view('layouts/admin_sidebar'); ?>

<h1 class="mb-4"><?php echo $judul; ?></h1>

<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pengajuan Baru (Menunggu)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlah_pengajuan_baru; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-inbox fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Kunjungan Disetujui (Hari Ini)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $kunjungan_hari_ini; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar-check fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Warga Binaan (Aktif)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_warga_binaan; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-7 mb-4">
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Pengajuan Terbaru (Perlu Diverifikasi)</h6>
            </div>
            <div class="card-body">
                <?php if(!empty($pengajuan_terbaru)): ?>
                    <ul class="list-group list-group-flush">
                        <?php foreach($pengajuan_terbaru as $p): ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <strong><?php echo $p->nama_pengunjung; ?></strong><br>
                                <small>ingin mengunjungi <?php echo $p->nama_wbp; ?></small>
                            </div>
                            <a href="<?php echo site_url('admin/verifikasi/show/'.$p->id); ?>" class="btn btn-sm btn-outline-info">Lihat</a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p class="text-center text-muted">Tidak ada pengajuan baru.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="col-lg-5 mb-4">
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Jadwal Kunjungan Hari Ini</h6>
            </div>
            <div class="card-body">
                 <?php if(!empty($jadwal_hari_ini)): ?>
                    <ul class="list-group list-group-flush">
                        <?php foreach($jadwal_hari_ini as $j): ?>
                        <li class="list-group-item">
                            <strong><?php echo $j->nama_pengunjung; ?></strong><br>
                            <small>mengunjungi <?php echo $j->nama_wbp; ?> (<?php echo $j->sesi_kunjungan; ?>)</small>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p class="text-center text-muted">Tidak ada jadwal kunjungan untuk hari ini.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<style>
/* CSS sederhana untuk border warna di kartu */
.border-left-primary { border-left: 0.25rem solid #4e73df !important; }
.border-left-success { border-left: 0.25rem solid #1cc88a !important; }
.border-left-info { border-left: 0.25rem solid #36b9cc !important; }
</style>

<?php $this->load->view('layouts/admin_footer', ['extra_js' => '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />']); ?>
