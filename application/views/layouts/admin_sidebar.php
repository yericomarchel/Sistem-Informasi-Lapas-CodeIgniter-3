<nav id="sidebar">
    <div class="sidebar-header">
        <h3>SIM-LVK Admin</h3>
        <strong>SA</strong>
    </div>

    <ul class="list-unstyled components">
        <p>Menu Utama</p>
        <li>
            <a href="<?php echo site_url('admin/dashboard'); ?>">
                🏠 Dashboard
            </a>
        </li>
        <li>
            <a href="<?php echo site_url('admin/verifikasi'); ?>">
                ✅ Verifikasi Kunjungan
            </a>
        </li>
        <li>
            <a href="<?php echo site_url('admin/warga_binaan'); ?>">
                👥 Kelola Warga Binaan
            </a>
        </li>
        <li>
            <a href="<?php echo site_url('admin/kamar'); ?>">
                🚪 Kelola Kamar & Blok
            </a>
        </li>
        <li>
            <a href="<?php echo site_url('admin/hari-libur'); ?>">
                📅 Kelola Hari Libur
            </a>
        </li>
        <li>
            <a href="<?php echo site_url('admin/laporan'); ?>">
                📊 Laporan
            </a>
        </li>
    </ul>

    <ul class="list-unstyled CTAs">
        <li>
            <a href="<?php echo site_url('logout'); ?>" class="article">Logout</a>
        </li>
    </ul>
</nav>

<div id="content">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button type="button" id="sidebarCollapse" class="btn btn-info">
                <i class="fas fa-align-left"></i>
                <span>Toggle Menu</span>
            </button>
        </div>
    </nav>
    
    <div class="container-fluid">
