<?= $this->include('front/navbarlogged') ?>
 <!-- Estilos personalizados -->
    <link rel="stylesheet" href="<?= base_url('public/src/styles/tienda_admin.css') ?>">

<section class="container py-5">
    <h2 class="section-title">TIENDA DE PRODUCTOS</h2>
    <div class="table-responsive">

    <form method="get" class="mb-4">
        <div class="input-group">
                <input type="text" name="buscar" class="form-control" placeholder="Buscar producto..." value="<?= esc($buscar ?? '') ?>">
                <button class="btn-admin btn-delete " type="submit">Buscar</button>
        </div>
    </form>

    <table class="table-admin">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Descripción</th>
                <th>Talle</th>
                <th>Foto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $producto): ?>
                <tr>
                    <td><?= esc($producto['nombre']) ?></td>
                    <td><?= esc($producto['categoria']) ?></td>
                    <td><?= esc($producto['descripcion']) ?></td>
                    <td><?= esc($producto['talle']) ?></td>
                    <td><img src="<?= base_url('uploads/' . $producto['foto']) ?>" class="product-img" alt=""></td>
                    <td>
                        <a href="<?= site_url('productos/editar/' . $producto['id']) ?>" class="btn-admin btn-edit">Editar</a>
                        <a href="<?= site_url('productos/eliminar/' . $producto['id']) ?>" class="btn-admin btn-delete" onclick="return confirm('¿Eliminar producto?')">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
</table>

    </div>
</section>
