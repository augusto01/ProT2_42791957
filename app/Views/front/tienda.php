<?= $this->include('front/navbarlogged') ?>
<link rel="stylesheet" href="<?= base_url('public/src/styles/tienda_cliente.css') ?>">

<div class="container py-5">
    <h2 class="section-title">Nuestros Productos</h2>
    <div class="row">
        <?php foreach ($productos as $producto): ?>
            <div class="col-md-4 mb-4">
                <div class="product-card text-center">
                    
                    <div class="product-header">
                        <span class="product-category"><?= esc($producto['categoria']) ?></span>
                        <span class="product-size"><?= esc($producto['talle']) ?></span>
                    </div>

                    <h3 class="product-name"><?= esc($producto['nombre']) ?></h3>
                    <div class="product-description"><?= esc($producto['descripcion']) ?></div>
                    <div class="product-price">$<?= number_format($producto['precio'], 2) ?></div>

                    <img src="<?= base_url('uploads/' . $producto['foto']) ?>" alt="<?= esc($producto['nombre']) ?>" class="product-img">

                    <div class="text-center mt-3">
                        <a href="#" class="btn-comprar">COMPRAR</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
