<head>
     <!-- Bootstrap CSS (si no está cargado en otro lugar) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('public/src/styles/nav.css') ?>">
   
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">

            <!-- Logo móvil (solo visible en pantallas chicas) -->
            <div class="d-flex justify-content-center w-100 d-lg-none">
                <div class="nav-item">
                    <a class="navbar-brand logo-ufc" href="<?= site_url('/') ?>">
                        <img src="<?= base_url('public/resources/Logo-UFC.png') ?>" alt="Logo UFC" height="50">
                    </a>
                    <div class="hover"></div>
                </div>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarTogglerDemo03">
                <?php if (!session()->get('logged_in')): ?>
                    <!-- Menú izquierdo (antes del logo) -->
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="<?= site_url('ranking') ?>">Rankings</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= site_url('eventos') ?>">Eventos</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= site_url('ranking') ?>">Peleadores</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= site_url('tienda') ?>">Tienda</a></li>
                    </ul>

                    <!-- Logo centrado (visible solo en pantallas grandes) -->
                    <div class="nav-item d-none d-lg-block">
                        <a class="navbar-brand logo-ufc" href="<?= site_url('/') ?>">
                            <img src="<?= base_url('public/resources/Logo-UFC.png') ?>" alt="Logo UFC" height="50">
                        </a>
                    </div>

                    <!-- Menú derecho (después del logo) -->
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="<?= site_url('quienes-somos') ?>">Quienes Somos</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= site_url('acerca-de') ?>">Acerca de</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= site_url('login') ?>">Iniciar Sesión</a></li>
                    </ul>
                <?php else: ?>
                    <!-- Menú completo para usuarios logueados -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="<?= site_url('ranking') ?>">Rankings</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= site_url('eventos') ?>">Eventos</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= site_url('ranking') ?>">Peleadores</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= site_url('tienda') ?>">Tienda</a></li>

                        <?php if (session()->get('rol') === 'admin'): ?>
                            <li class="nav-item"><a class="nav-link" href="<?= site_url('productos/admin') ?>">Artículos</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?= site_url('usuarios/admin') ?>">Usuarios</a></li>
                        <?php endif; ?>
                    </ul>

                    <!-- Logo centrado (solo en pantallas grandes) -->
                    <div class="nav-item d-none d-lg-block mx-auto">
                        <a class="navbar-brand logo-ufc" href="<?= site_url('/') ?>">
                            <img src="<?= base_url('public/resources/Logo-UFC.png') ?>" alt="Logo UFC" height="50">
                        </a>
                    </div>

                    <!-- Usuario logueado y logout -->
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <span class="nav-link saludo-usuario">¡Hola, <?= esc(session('usuario')) ?>!</span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= site_url('logout') ?>">Cerrar Sesión</a>
                        </li>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <!-- Bootstrap JS Bundle (incluye Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>  
</body>
