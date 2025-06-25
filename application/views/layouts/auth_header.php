<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo isset($judul) ? $judul . ' - SIM-LVK' : 'SIM-LVK'; ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --c-primary: #52b2cf; /* Biru Cerulean */
            --c-secondary: #9cadce; /* Biru Baja Muda */
            --font-main: 'Poppins', sans-serif;
        }
        body {
            font-family: var(--font-main);
            background-color: #e9ecef;
        }
        .auth-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .auth-card {
            width: 100%;
            max-width: 420px;
            border-radius: 10px;
            border: none;
            box-shadow: 0 4px 25px rgba(0,0,0,0.1);
        }
        .btn-primary {
            background-color: var(--c-primary);
            border-color: var(--c-primary);
            font-weight: 500;
        }
        .btn-primary:hover {
            background-color: #4394b0;
            border-color: #4394b0;
        }
    </style>
</head>
<body>
<div class="auth-container">
