<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo isset($judul) ? $judul : 'Dashboard Pengunjung'; ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <style>
        :root {
            --c-primary: #52b2cf;
            --c-secondary: #9cadce;
            --c-accent: #d4afb9;
            --c-light: #d1cfe2;
            --font-main: 'Poppins', sans-serif;
        }
        body {
            font-family: var(--font-main);
            background-color: #f4f7f6;
        }
        .navbar.bg-primary {
            background-color: var(--c-primary) !important;
        }
        .btn-primary {
            background-color: var(--c-primary);
            border-color: var(--c-primary);
        }
        .btn-primary:hover {
            background-color: #4394b0;
            border-color: #4394b0;
        }
        .card-header {
            background-color: var(--c-secondary);
            color: white;
            font-weight: 500;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="#">SIM-LVK Pengunjung</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('dashboard'); ?>">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('kunjungan/create'); ?>">Ajukan Kunjungan</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                 <li class="nav-item">
                    <span class="navbar-text mr-3">
                        Halo, <?php echo $this->session->userdata('name'); ?>
                    </span>
                </li>
                 <li class="nav-item">
                    <a class="nav-link btn btn-sm btn-outline-light" href="<?php echo site_url('logout'); ?>">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container mt-4">
