<?= $this->include('front/navbarlogged') ?>

<div class="container mt-4">
    <h2 class="text-center mb-4">Tienda UFC</h2>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th>Foto</th>
                    <th>Nombre</th>
                    <th>Categoría</th>
                    <th>Descripción</th>
                    <th>Talle</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $producto): ?>
                    <tr>
                        <td>
                            <img src="<?= base_url('public/uploads/' . $producto['foto']) ?>" alt="Foto producto" height="80">
                        </td>
                        <td><?= esc($producto['nombre']) ?></td>
                        <td><?= esc($producto['categoria']) ?></td>
                        <td><?= esc($producto['descripcion']) ?></td>
                        <td><?= esc($producto['talle']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->include('front/layout/footer') ?>
