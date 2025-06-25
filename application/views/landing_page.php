<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Selamat Datang di SIM-LVK Rutan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --c-primary: #52b2cf; /* Biru Cerulean */
            --font-main: 'Poppins', sans-serif;
        }
        body {
            font-family: var(--font-main);
        }
        .jumbotron {
            background: linear-gradient(45deg, rgba(82, 178, 207, 0.9), rgba(156, 173, 206, 0.9)), url('https://images.unsplash.com/photo-1599256872455-5154a2424938?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8Z2F0ZSxwcmlzb24sfGVufDB8fHx8MTYyNjcxNjM4MA&ixlib=rb-1.2.1&q=80&utm_campaign=api-credit&utm_medium=referral&utm_source=unsplash_source&w=1080') no-repeat center center;
            background-size: cover;
            color: white;
            border-radius: 0;
            height: 70vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        .jumbotron h1 {
            font-weight: 700;
            font-size: 3.5rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        .jumbotron p {
            font-size: 1.25rem;
            font-weight: 300;
        }
        .btn-custom-primary {
            background-color: white;
            border-color: white;
            color: var(--c-primary);
            font-weight: 600;
            padding: 10px 30px;
            font-size: 1.1rem;
        }
        .btn-custom-secondary {
            background-color: transparent;
            border-color: white;
            color: white;
            font-weight: 600;
            padding: 10px 30px;
            font-size: 1.1rem;
        }
        .feature-icon {
            font-size: 3rem;
            color: var(--c-primary);
        }
    </style>
</head>
<body>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Sistem Informasi Kunjungan Rutan</h1>
            <p class="lead">Mempermudah proses pengajuan jadwal kunjungan bagi keluarga warga binaan secara online, transparan, dan efisien.</p>
            <hr class="my-4" style="border-color: rgba(255,255,255,0.5);">
            <a class="btn btn-custom-primary btn-lg mx-2" href="<?php echo site_url('login'); ?>" role="button">Login</a>
            <a class="btn btn-custom-secondary btn-lg mx-2" href="<?php echo site_url('register'); ?>" role="button">Daftar Akun Baru</a>
        </div>
    </div>

    <div class="container py-5">
        <div class="row text-center">
            <div class="col-md-4">
                <div class="feature-icon mb-3">🕒</div>
                <h3>Pengajuan Online</h3>
                <p class="text-muted">Ajukan jadwal kunjungan kapan saja dan di mana saja tanpa perlu datang langsung ke Rutan.</p>
            </div>
            <div class="col-md-4">
                <div class="feature-icon mb-3">✅</div>
                <h3>Status Real-time</h3>
                <p class="text-muted">Pantau status pengajuan Anda secara langsung melalui dashboard, apakah disetujui atau ditolak.</p>
            </div>
            <div class="col-md-4">
                <div class="feature-icon mb-3">📄</div>
                <h3>Bukti Digital</h3>
                <p class="text-muted">Unduh bukti persetujuan kunjungan dalam format PDF yang sah untuk ditunjukkan kepada petugas.</p>
            </div>
        </div>
    </div>
    
    <footer class="text-center py-4 bg-light">
        <p class="mb-0">&copy; <?php echo date('Y'); ?> Sistem Informasi Manajemen Layanan Kunjungan Rutan Kelas IIA Batam.</p>
    </footer>

</body>
</html>
