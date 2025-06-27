<?= $this->include('front/navbarlogged') ?>
<link rel="stylesheet" href="<?= base_url('public/src/styles/tienda_admin.css') ?>">

<div class="container py-5">
    <h2 class="section-title">Agregar Usuario</h2>

    <?php if (session('errors')): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach (session('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?= site_url('usuarios/guardar') ?>" method="post">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="<?= old('nombre') ?>" required>
        </div>

        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" name="apellido" class="form-control" value="<?= old('apellido') ?>" required>
        </div>

        <div class="mb-3">
            <label for="username" class="form-label">Nombre de usuario</label>
            <input type="text" name="username" class="form-control" value="<?= old('username') ?>" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" name="email" class="form-control" value="<?= old('email') ?>" required>
        </div>

        <div class="mb-3">
            <label for="rol_id" class="form-label">Rol</label>
            <select name="rol_id" class="form-select" required>
                <option value="">Seleccionar</option>
                <?php foreach ($roles as $rol): ?>
                    <option value="<?= $rol['id'] ?>" <?= old('rol_id') == $rol['id'] ? 'selected' : '' ?>>
                        <?= esc($rol['tipo_usuario']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="<?= site_url('usuarios/admin') ?>" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
