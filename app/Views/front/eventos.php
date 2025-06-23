<?php /** @var string $title */ ?>
<?= $this->include('front/layout/header') ?>
<head>
        <link rel="stylesheet" href="<?= base_url('public/src/styles/eventos.css') ?>">

</head>

 <header>
     <div class="container">
        <h1 class="ufc-main-title">PRÓXIMOS EVENTOS UFC</h1>
        <p class="ufc-subtitle">No te pierdas las emocionantes peleas que vienen</p>
    </div>
 </header>

<!-- Hero Section -->
   
<!-- Eventos Destacados -->
<section class="container py-5">
    <h2 class="section-title">EVENTOS DESTACADOS</h2>
    <div class="row">
        <!-- Evento 1 -->
        <div class="col-lg-6 mb-4">
            <div class="ufc-event-card featured">
                <div class="event-date">
                    <span class="date-day">15</span><span class="date-month">JUL</span><span class="date-year">2024</span>
                </div>
                <div class="event-info">
                    <h3 class="event-title">UFC 300: Edwards vs. Muhammad</h3>
                    <div class="event-location"><i class="fas fa-map-marker-alt"></i> T-Mobile Arena, Las Vegas</div>
                    <div class="main-event">
                        <div class="fighters">
                            <div class="fighter">
                                <img src="<?= base_url('public/resources/leonedwards.webp') ?>" alt="Leon Edwards" class="fighter-img">
                                <span class="fighter-name">Leon Edwards</span><span class="fighter-record">20-3-0</span>
                            </div>
                            <span class="vs-badge">VS</span>
                            <div class="fighter">
                                <img src="<?= base_url('public/resources/200x1.webp') ?>" alt="Belal Muhammad" class="fighter-img">
                                <span class="fighter-name">Belal Muhammad</span><span class="fighter-record">23-3-0</span>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="btn btn-ufc">COMPRAR ENTRADAS</a>
                </div>
            </div>
        </div>
        <!-- Evento 2 -->
        <div class="col-lg-6 mb-4">
            <div class="ufc-event-card">
                <div class="event-date">
                    <span class="date-day">22</span><span class="date-month">JUL</span><span class="date-year">2024</span>
                </div>
                <div class="event-info">
                    <h3 class="event-title">UFC Fight Night: Volkanovski vs. Topuria</h3>
                    <div class="event-location"><i class="fas fa-map-marker-alt"></i> Accor Arena, París</div>
                    <div class="main-event">
                        <div class="fighters">
                            <div class="fighter">
                                <img src="<?= base_url('public/resources/VOLKANOVSKI_ALEXANDER_BELT_02-17.avif') ?>" alt="Alexander Volkanovski" class="fighter-img">
                                <span class="fighter-name">Alexander Volkanovski</span><span class="fighter-record">26-3-0</span>
                            </div>
                            <span class="vs-badge">VS</span>
                            <div class="fighter">
                                <img src="<?= base_url('public/resources/topuria_event.webp') ?>" alt="Ilia Topuria" class="fighter-img">
                                <span class="fighter-name">Ilia Topuria</span><span class="fighter-record">14-0-0</span>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="btn btn-ufc">COMPRAR ENTRADAS</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Calendario de Eventos -->
<section class="container py-5">
    <h2 class="section-title">CALENDARIO DE EVENTOS</h2>
    <div class="table-responsive">
        <table class="table ufc-events-table">
            <thead>
                <tr><th>Fecha</th><th>Evento</th><th>Ubicación</th><th>Pelea Estelar</th><th>Acción</th></tr>
            </thead>
            <tbody>
                <tr><td>15 JUL 2024</td><td>UFC 300: Edwards vs. Muhammad</td><td>Las Vegas, NV</td><td>Edwards vs. Muhammad</td><td><a href="#" class="btn btn-sm btn-ufc">Detalles</a></td></tr>
                <tr><td>22 JUL 2024</td><td>UFC Fight Night: Volkanovski vs. Topuria</td><td>París, Francia</td><td>Volkanovski vs. Topuria</td><td><a href="#" class="btn btn-sm btn-ufc">Detalles</a></td></tr>
                <tr><td>05 AGO 2024</td><td>UFC 301: Adesanya vs. Du Plessis</td><td>Miami, FL</td><td>Adesanya vs. Du Plessis</td><td><a href="#" class="btn btn-sm btn-ufc">Detalles</a></td></tr>
                <tr><td>19 AGO 2024</td><td>UFC Fight Night: Shevchenko vs. Grasso</td><td>Boston, MA</td><td>Shevchenko vs. Grasso</td><td><a href="#" class="btn btn-sm btn-ufc">Detalles</a></td></tr>
            </tbody>
        </table>
    </div>
</section>

<?= $this->include('front/layout/footer') ?>
