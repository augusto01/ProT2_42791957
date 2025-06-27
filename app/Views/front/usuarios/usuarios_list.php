<?= $this->include('front/navbarlogged') ?>

<!-- Estilos personalizados -->
<link rel="stylesheet" href="<?= base_url('public/src/styles/tienda_admin.css') ?>">

<section class="container py-5">
    <h2 class="section-title">Usuarios registrados</h2>
    <div class="table-responsive">

        <!-- Formulario de búsqueda -->
        <form method="get" class="filtro-form" id="form-filtros">
            <div class="input-group">
                <input type="text" name="buscar" class="form-control" placeholder="Buscar por nombre, apellido o username..." value="<?= esc($buscar ?? '') ?>">

                <!-- Filtro por rol -->
                <select name="rol" class="form-select" onchange="document.getElementById('form-filtros').submit()">
                    <option value="">Todos los roles</option>
                    <?php foreach ($roles as $rol): ?>
                        <option value="<?= $rol['id'] ?>" <?= (isset($rolSeleccionado) && $rolSeleccionado == $rol['id']) ? 'selected' : '' ?>>
                            <?= esc($rol['tipo_usuario']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <button type="submit" class="btn-admin btn-red">Buscar</button>
            </div>
        </form>

        <!-- Botón de agregar usuario -->
        <a href="<?= site_url('usuarios/crear') ?>" class="btn-admin btn-add mb-3">Agregar Usuario</a>

        <table class="table-admin">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($usuarios)): ?>
                    <?php foreach ($usuarios as $usuario): ?>
                        <tr>
                            <td><?= esc($usuario['nombre']) ?></td>
                            <td><?= esc($usuario['apellido']) ?></td>
                            <td><?= esc($usuario['username']) ?></td>
                            <td><?= esc($usuario['email']) ?></td>
                            <td><?= esc($usuario['tipo_usuario']) ?></td>
                            <td>
                                <div class="btn-group">
                                    <a href="<?= site_url('usuarios/editar/' . $usuario['id']) ?>" class="btn-admin btn-edit">
                                        <span class="icon">✏️</span> Editar
                                    </a>

                                    <button type="button" class="btn-admin btn-delete" onclick="document.getElementById('modal-<?= $usuario['id'] ?>').style.display='flex'">
                                        <span class="icon">🗑️</span> Eliminar
                                    </button>

                                    <!-- Modal de confirmación -->
                                    <div id="modal-<?= $usuario['id'] ?>" class="modal-confirm" style="display:none;">
                                        <div class="modal-content">
                                            <p>¿Seguro que desea eliminar <strong><?= esc($usuario['nombre'] . ' ' . $usuario['apellido']) ?></strong>?</p>
                                            <div class="modal-actions">
                                                <a href="<?= site_url('usuarios/eliminar/' . $usuario['id']) ?>" class="btn-admin btn-delete">
                                                    <span class="icon">🗑️</span> Sí, eliminar
                                                </a>
                                                <button class="btn-admin btn-cancel" onclick="document.getElementById('modal-<?= $usuario['id'] ?>').style.display='none'">Cancelar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">No se encontraron usuarios.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

    </div>
</section>
