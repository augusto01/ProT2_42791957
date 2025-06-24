<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?= esc($title ?? 'UFC') ?></title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Fuente Bebas Neue -->
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet" />
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="<?= base_url('public/src/styles/nav.css') ?>" />
</head>
<body>
    <!-- NAVBAR DE BOOTSTRAP -->
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="d-flex justify-content-center w-100 d-lg-none">
                <div class="nav-item">
                <a class="navbar-brand logo-ufc" href="<?= site_url('/') ?>">                        
                    <img src="<?= base_url('public/resources/Logo-UFC.png') ?>" alt="Logo UFC" height="50">
                    </a>
                    <div class="hover"></div>
                </div>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('ranking') ?>">Peleadores</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('ranking') ?>">Rankings</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('eventos') ?>">Eventos</a></li>
                </ul>

                <div class="nav-item d-none d-lg-block">
                <a class="navbar-brand logo-ufc" href="<?= site_url('/') ?>">                        
                        <img src="<?= base_url('public/resources/Logo-UFC.png') ?>" alt="Logo UFC" height="50">
                    </a>
                </div>

                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('quienes-somos') ?>">Quienes Somos</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('acerca-de') ?>">Acerca de</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('login') ?>">Iniciar Sesión</a></li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="searchIcon">
                            <i class="bi bi-search"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

