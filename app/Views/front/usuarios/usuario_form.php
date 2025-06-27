<?= $this->include('front/layout/header') ?>
<link rel="stylesheet" href="<?= base_url('public/src/styles/tienda_admin.css') ?>">


<div class="container mt-4">
    <h2 class="text-center mb-4">Registrar nuevo usuario</h2>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session('success') ?></div>
    <?php endif; ?>

    <form action="<?= site_url('usuarios/guardar') ?>" method="post">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" required>
        </div>

        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" class="form-control" name="apellido" required>
        </div>

        <div class="mb-3">
            <label for="username" class="form-label">Nombre de usuario</label>
            <input type="text" class="form-control" name="username" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" name="email" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" name="password" required>
        </div>

        <div class="mb-3">
            <label for="rol_id" class="form-label">Rol</label>
            <select class="form-select" name="rol_id" required>
                <option value="">Seleccione un rol</option>
                <?php foreach ($roles as $rol): ?>
                    <option value="<?= $rol['id'] ?>"><?= esc($rol['tipo_usuario']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Usuario</button>
    </form>
</div>

<?= $this->include('front/layout/footer') ?>
