<?= $this->include('front/navbarlogged') ?>

<!-- Estilos personalizados -->
<link rel="stylesheet" href="<?= base_url('public/src/styles/tienda_admin.css') ?>">

<section class="container py-5">
    <h2 class="section-title">Artículos registrados</h2>
    <div class="table-responsive">

        <!-- Formulario de búsqueda -->
        <form method="get" class="mb-4">
            <div class="input-group">
                <input type="text" name="buscar" class="form-control" placeholder="Buscar producto..." value="<?= esc($buscar ?? '') ?>">
                <button class="btn-admin btn-delete" type="submit">Buscar</button>
            </div>
        </form>

        <!-- Botón de agregar producto -->
        <a href="<?= site_url('productos/crear') ?>" class="btn-admin btn-add mb-3">Agregar Producto</a>

        <table class="table-admin">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Categoría</th>
                    <th>Descripción</th>
                    <th>Talle</th>
                    <th>Precio</th>
                    <th>Foto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($productos)): ?>
                    <?php foreach ($productos as $producto): ?>
                        <tr>
                            <td><?= esc($producto['nombre']) ?></td>
                            <td><?= esc($producto['categoria']) ?></td>
                            <td><?= esc($producto['descripcion']) ?></td>
                            <td><?= esc($producto['talle']) ?></td>
                            <td>$<?= esc(number_format($producto['precio'], 2, ',', '.')) ?></td>
                            <td>
                                <?php if (!empty($producto['foto'])): ?>
                                    <img src="<?= base_url('public/uploads/' . $producto['foto']) ?>" alt="<?= esc($producto['nombre']) ?>" class="img-fluid" style="max-height: 150px; object-fit: cover;">
                                <?php else: ?>
                                    <span>Sin imagen</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="<?= site_url('productos/editar/' . $producto['id']) ?>" class="btn-admin btn-edit">
                                        <span class="icon">✏️</span> Editar
                                    </a>
                                    <!-- Botón para abrir el modal -->
                                        <button type="button" class="btn-admin btn-delete" onclick="document.getElementById('modal-<?= $producto['id'] ?>').style.display='flex'">
                                            <span class="icon">🗑️</span> Eliminar
                                        </button>

                                        <!-- Modal de confirmación -->
                                        <div id="modal-<?= $producto['id'] ?>" class="modal-confirm">
                                            <div class="modal-content">
                                                <p>¿Seguro que desea eliminar <strong><?= esc($producto['nombre']) ?></strong>?</p>
                                                <div class="modal-actions">
                                                    <a href="<?= site_url('productos/eliminar/' . $producto['id']) ?>" class="btn-admin btn-delete">
                                                        <span class="icon">🗑️</span> Sí, eliminar
                                                    </a>
                                                    <button class="btn-admin btn-cancel" onclick="document.getElementById('modal-<?= $producto['id'] ?>').style.display='none'">Cancelar</button>
                                                </div>
                                            </div>
                                        </div>


                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center">No se encontraron productos.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

    </div>
</section>
