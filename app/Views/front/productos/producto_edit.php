<?= $this->include('front/navbarlogged') ?>
<link rel="stylesheet" href="<?= base_url('public/src/styles/abm_producto.css') ?>">

<div class="container py-5">
    <h2 class="section-title">Editar Producto</h2>

    <?php if (session('errors')): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach (session('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?= site_url('productos/actualizar/' . $producto['id']) ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="<?= esc(old('nombre', $producto['nombre'])) ?>" required>
        </div>

        <div class="mb-3">
            <label for="categoria_id" class="form-label">Categoría</label>
            <select name="categoria_id" class="form-select" required>
                <option value="">Seleccionar</option>
                <?php foreach ($categorias as $categoria): ?>
                    <option value="<?= $categoria['id'] ?>" <?= old('categoria_id', $producto['categoria_id']) == $categoria['id'] ? 'selected' : '' ?>>
                        <?= esc($categoria['nombre']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="talle_id" class="form-label">Talle</label>
            <select name="talle_id" class="form-select" required>
                <option value="">Seleccionar</option>
                <?php foreach ($talles as $talle): ?>
                    <option value="<?= $talle['id'] ?>" <?= old('talle_id', $producto['talle_id']) == $talle['id'] ? 'selected' : '' ?>>
                        <?= esc($talle['nombre']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" class="form-control" required><?= esc(old('descripcion', $producto['descripcion'])) ?></textarea>
        </div>

        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" name="precio" step="0.01" class="form-control" value="<?= esc(old('precio', $producto['precio'])) ?>" required>
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Foto actual</label><br>
            <?php if (!empty($producto['foto'])): ?>
                <img src="<?= base_url('public/uploads/' . $producto['foto']) ?>" alt="Foto actual" class="img-fluid" style="max-height: 150px;">
            <?php else: ?>
                <span>No tiene imagen</span>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Nueva Foto (opcional)</label>
            <input type="file" name="foto" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="<?= site_url('productos/admin') ?>" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
