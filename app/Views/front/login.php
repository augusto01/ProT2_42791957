<?= $this->include('front/layout/header') ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Estilos -->
    <link rel="stylesheet" href="<?= base_url('public/src/styles/login.css') ?>">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="container-form">
        <form action="<?= site_url('login/process') ?>" method="post">
            <div class="container-logo">
                <img src="<?= base_url('public/resources/Logo-UFC.png') ?>" alt="logo" style="max-width: 100%; height: auto;">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" required>
                <div id="emailHelp" class="form-text">Nunca compartiremos tu correo con nadie más.</div>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="password" name="password" required>
                    <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                        <i class="fas fa-eye" id="eyeIcon"></i>
                    </span>
                </div>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">Recuérdame</label>
            </div>

            <button type="submit" class="btn btn-primary mb-2">Iniciar sesión</button>
        </form>

        <label>No tienes una cuenta? <a href="<?= site_url('registrarse') ?>" class="link-primary">Registrate</a></label>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url('public/src/scripts/Login.js') ?>?v=<?= time() ?>"></script>
    
</body>
</html>

<?= $this->include('front/layout/footer') ?>
