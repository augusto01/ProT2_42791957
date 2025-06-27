<?= $this->include('front/layout/header') ?>


<div class="container mt-4">
    <h2 class="text-center mb-4">Subir nuevo producto</h2>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session('success') ?></div>
    <?php endif; ?>

    <form action="<?= site_url('productos/guardar') ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" required>
        </div>

        <div class="mb-3">
            <label for="categoria" class="form-label">Categoría</label>
            <input type="text" class="form-control" name="categoria" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" name="descripcion" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="talle" class="form-label">Talle</label>
            <input type="text" class="form-control" name="talle" required>
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" class="form-control" name="foto" accept="image/*" required>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Producto</button>
    </form>
</div>

<?= $this->include('front/layout/footer') ?>
