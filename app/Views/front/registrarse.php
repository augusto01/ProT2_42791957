<!DOCTYPE html>
<html lang="es">
<head>
    <?= $this->include('front/layout/header') ?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse - MMA</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Fuente Bebas Neue -->
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="<?= base_url('public/src/styles/Registrarse.css') ?>">
</head>

<body>

    

    <!-- FORMULARIO DE REGISTRO -->
    <div class="container-form">
        <div class="container-logo">
            <img src="<?= base_url('public/resources/Logo-UFC.png') ?>" alt="logo" style="max-width: 80%; height: auto;">
        </div>

        <!-- Contenedor para las alertas -->
        <div id="alertas"></div>

        <form id="registro-form">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" placeholder="Tu nombre">
            </div>
            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="apellido" placeholder="Tu apellido">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" id="email" placeholder="nombre@ejemplo.com">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" placeholder="Contraseña">
            </div>
            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" id="terminos">
                <label class="form-check-label" for="terminos">Acepto los términos y condiciones</label>
            </div>
            <button type="submit" class="btn btn-primary">Registrarse</button>
        </form>
    </div>

    <!-- Bootstrap y JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <script type="module" src="<?= base_url('public/src/scripts/register.js') ?>"></script>

</body>
</html>
