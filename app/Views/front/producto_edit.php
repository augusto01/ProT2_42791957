<?= $this->include('front/navbarlogged') ?>
<link rel="stylesheet" href="<?= base_url('public/src/styles/tienda_admin.css') ?>">

<section class="container py-5">
    <h2 class="section-title">Editar Producto</h2>

    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?= site_url('productos/actualizar/' . $producto['id']) ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?= esc($producto['nombre']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="categoria" class="form-label">Categoría:</label>
            <input type="text" class="form-control" id="categoria" name="categoria" value="<?= esc($producto['categoria']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción:</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required><?= esc($producto['descripcion']) ?></textarea>
        </div>

        <div class="mb-3">
            <label for="talle" class="form-label">Talle:</label>
            <input type="text" class="form-control" id="talle" name="talle" value="<?= esc($producto['talle']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Foto actual:</label><br>
            <img src="<?= base_url('uploads/' . $producto['foto']) ?>" class="product-img mb-2" alt="">
            <input type="file" class="form-control" id="foto" name="foto">
            <small class="text-muted">Opcional: subir solo si deseas reemplazar la imagen actual.</small>
        </div>

        <button type="submit" class="btn-admin btn-add">Actualizar Producto</button>
        <a href="<?= site_url('productos/admin') ?>" class="btn-admin btn-delete">Cancelar</a>
    </form>
</section>
