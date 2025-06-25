<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo isset($judul) ? $judul . ' | Admin Panel' : 'Admin Panel'; ?></title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">

    <style>
        :root {
            --c-primary: #52b2cf;   /* Biru Cerulean */
            --c-secondary: #9cadce; /* Biru Baja Muda */
            --c-dark-blue: #23272b;  /* Warna Sidebar Aktif */
            --font-main: 'Poppins', sans-serif;
        }
        body { font-family: var(--font-main); background-color: #f8f9fa; }
        h1, h2, h3, h4, h5, h6 { font-weight: 600; }
        .btn-primary { background-color: var(--c-primary); border-color: var(--c-primary); }
        .btn-primary:hover { background-color: #4394b0; border-color: #4394b0; }
        .card-header { background-color: #f8f9fa; border-bottom: 1px solid #e3e6f0; font-weight: 600; color: var(--c-primary); }
        
        /* === STYLE BARU UNTUK SIDEBAR === */
        .wrapper { display: flex; width: 100%; align-items: stretch; }
        #sidebar { min-width: 250px; max-width: 250px; background: #343a40; color: #fff; transition: all 0.3s; }
        #sidebar.active { margin-left: -250px; }
        #sidebar .sidebar-header { padding: 20px; background: var(--c-dark-blue); }
        #sidebar ul.components { padding: 15px 0; }
        #sidebar ul li a { padding: 12px 20px; font-size: 0.95em; display: flex; align-items: center; color: #adb5bd; transition: all 0.2s; }
        #sidebar ul li a:hover { color: #fff; background: #454d55; text-decoration: none; }
        #sidebar ul li.active > a, a[aria-expanded="true"] { color: #fff; background: var(--c-primary); }
        #sidebar ul li a svg { margin-right: 15px; flex-shrink: 0; }
        /* === AKHIR STYLE BARU === */

        #content { width: 100%; padding: 20px; min-height: 100vh; transition: all 0.3s; }
    </style>
</head>
<body>
<div class="wrapper">
