<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UFC</title>

    <!-- INSTALACION DE BOOSTRAP 5.3.6 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

    <!-- FUENTES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Fira+Code:wght@300..700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- HOJAS DE ESTILO PERSONALIZADAS -->
    <link rel="stylesheet" href="<?= base_url('public/src/styles/nav.css') ?>">
    <link rel="stylesheet" href="<?= base_url('public/src/styles/miestilo.css') ?>">


</head>

<body>
    <!-- NAVBAR DE BOOTSTRAP -->
    <?= $this->include('front/layout/header') ?>

    <!-- CONTENIDO PRINCIPAL -->
    <section class="content-cartelera text-center mt-5">
        <h6 class="pretitulo-cartelera">Pelea por el título del peso ligero</h6>
        <h1 class="titulo-cartelera">TOPURIA VS OLIVEIRA</h1>
        <div class="button-container">
            <button class="btn">Donde ver</button>
            <button class="btn">Comprar Entradas</button>
        </div>
    </section>

    <!-- CARRUSEL -->
    <section id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <h1 class="text-center h1-section">VIDEOS, ARTÍCULOS Y GALERÍAS</h1>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?= base_url('public/resources/event1.avif') ?>" class="d-block w-100" alt="Evento 1">
            </div>
            <div class="carousel-item">
                <img src="<?= base_url('public/resources/event2.avif') ?>" class="d-block w-100" alt="Evento 2">
            </div>
            <div class="carousel-item">
                <img src="<?= base_url('public/resources/event3.avif') ?>" class="d-block w-100" alt="Evento 3">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </section>

<h1 class="text-center h1-section">DIVISIONES</h1>
    
        <div class="container">
    <div class="row">
        <!-- Campeón Mosca -->
        <div class="col-md-4 mb-4">
            <div class="card champion-card">
                <div class="champion-badge">CAMPEÓN</div>
                <div class="champion-header">
                    <div class="weight-class">PESO MOSCA</div>
                    <div>125 lb (56.7 kg)</div>
                </div>
                <div class="card-body text-center">
                    <div class="nickname">"THE GAMBLE"</div>
                    <h3 class="fighter-name">ALEXANDER PANTOJA</h3>
                    <div class="record">27-5-0 (W< 1G)</div>
                    <div class="last-fight mt-3">Última pelea: vs Brandon Royval</div>
                    <img src="<?= base_url('public/resources/PANTOJA_ALEXANDRE_BELT_12-07.avif') ?>" alt="Alexander Pantoja" class="img-fluid mt-3">
                </div>
            </div>
        </div>

        <!-- Campeón Gallo -->
        <div class="col-md-4 mb-4">
            <div class="card champion-card">
                <div class="champion-badge">CAMPEÓN</div>
                <div class="champion-header">
                    <div class="weight-class">PESO GALLO</div>
                    <div>135 lb (61.2 kg)</div>
                </div>
                <div class="card-body text-center">
                    <div class="nickname">"THE BLEEDER"</div>
                    <h3 class="fighter-name">MERAB DVALISHVILI</h3>
                    <div class="record">30-4-0 (W< 1G)</div>
                    <div class="last-fight mt-3">Última pelea: vs Henry Cejudo</div>
                    <img src="<?= base_url('public/resources/DVALISHVILI_MERAB_BELT_01-18.avif') ?>" alt="Merab Dvalishvili" class="img-fluid mt-3">
                </div>
            </div>
        </div>

        <!-- Campeón Pluma -->
        <div class="col-md-4 mb-4">
            <div class="card champion-card">
                <div class="champion-badge">CAMPEÓN</div>
                <div class="champion-header">
                    <div class="weight-class">PESO PLUMA</div>
                    <div>145 lb (65.8 kg)</div>
                </div>
                <div class="card-body text-center">
                    <div class="nickname">"THE DELFT"</div>
                    <h3 class="fighter-name">ALEXANDER VOLKANOVSKI</h3>
                    <div class="record">25-4-0 (W< 1G)</div>
                    <div class="last-fight mt-3">Última pelea: vs Ilia Topuria</div>
                    <img src="<?= base_url('public/resources/VOLKANOVSKI_ALEXANDER_BELT_02-17.avif') ?>" alt="Alexander Volkanovski" class="img-fluid mt-3">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container py-5">
    <div class="row">
        <!-- Campeona Gallo -->
        <div class="col-md-4 mb-4">
            <div class="card champion-card">
                <div class="champion-badge">CAMPEONA</div>
                <div class="champion-header">
                    <div class="weight-class">Gallo de las mujeres</div>
                    <div>135 lb (61.36 kg)</div>
                </div>
                <div class="card-body text-center">
                    <div class="nickname">"The Venezuelan Vixen"</div>
                    <h3 class="fighter-name">Julianna Peña</h3>
                    <div class="record">27-5-0 (W< 1G)</div>
                    <div class="last-fight mt-3">Última pelea: vs Raquel Pennington </div>
                    <img src="<?= base_url('public/resources/PENA_JULIANNA_BELT_07-30.avif') ?>" alt="Julianna Peña" class="img-fluid mt-3">
                </div>
            </div>
        </div>

        <!-- Campeona Peso Paja -->
        <div class="col-md-4 mb-4">
            <div class="card champion-card">
                <div class="champion-badge">CAMPEONA</div>
                <div class="champion-header">
                    <div class="weight-class">Peso de la mujer</div>
                    <div>115 lb (52.27 kg)</div>
                </div>
                <div class="card-body text-center">
                    <div class="nickname">"MAGNUM"</div>
                    <h3 class="fighter-name">ZHANG WEILI</h3>
                    <div class="record">30-4-0 (W< 1G)</div>
                    <div class="last-fight mt-3">Última pelea: vs Tatiana Suarez</div>
                    <img src="<?= base_url('public/resources/ZHANG_WEILI_BELT_02-08.avif') ?>" alt="Zhang Weili" class="img-fluid mt-3">
                </div>
            </div>
        </div>

        <!-- Campeona Flyweight -->
        <div class="col-md-4 mb-4">
            <div class="card champion-card">
                <div class="champion-badge">CAMPEONA</div>
                <div class="champion-header">
                    <div class="weight-class">Flyweight</div>
                    <div>124 lb (56.36 kg)</div>
                </div>
                <div class="card-body text-center">
                    <div class="nickname">"Bullet"</div>
                    <h3 class="fighter-name">Valentina Shevchenko</h3>
                    <div class="record">25-4-0 (W< 1G)</div>
                    <div class="last-fight mt-3">Última pelea: vs Manon Fiorot</div>
                    <img src="<?= base_url('public/resources/SHEVCHENKO_VALENTINA_BELT_05-10.avif') ?>" alt="Valentina Shevchenko" class="img-fluid mt-3">
                </div>
            </div>
        </div>
    </div>
</div>    


    <!-- FOOTER -->
    <?= $this->include('front/layout/footer') ?>
    <script src="<?= base_url('public/src/scripts/index.js') ?>"></script>
</body>
</html>
