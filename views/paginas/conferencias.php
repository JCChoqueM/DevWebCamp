<main class="agenda">
    <h2 class="agenda__heading">Workshops & Conferencias</h2>
    <p class="agenda__descripcion">Talleres 2 y Conferencias dictados por expertos en desarrollo web</p>

    <!-- section  eventos[inicio] -->
    <div class="eventos">
        <h3 class="eventos__heading">&lt;Conferencias /></h3>
        <p class="eventos__fecha">Viernes 5 de Octubre</p>
        <!-- SECTION  slider1 [inicio] -->
        <div class="eventos__listado slider swiper">
            <div class="swiper-wrapper">
                <?php foreach ($eventos['conferencias_v'] as $evento) { ?>
                    <?php include __DIR__ . '../../templates/evento.php' ?>
                <?php } ?>
            </div>

            <!-- Flechas de navegación -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

            <!-- Paginación (puntos) -->
            <div class="swiper-pagination"></div>
        </div>
        <!-- !SECTION  fin - slider1 [fin] -->

        <p class="eventos__fecha">Sábado 6 de Octubre</p>
        <!-- SECTION1 slider2[inicio] -->
        <div class="eventos__listado slider swiper">
            <div class="swiper-wrapper">
                <?php foreach ($eventos['conferencias_s'] as $evento) { ?>
                    <?php include __DIR__ . '../../templates/evento.php' ?>
                <?php } ?>
            </div>
            <!-- Flechas de navegación -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            <!-- Paginación (puntos) -->
            <div class="swiper-pagination"></div>
        </div>
        <!-- !SECTION1 fin - slider2[fin] -->
    </div>
    <!-- !section  fin - eventos[fin] -->

    <!-- section1  eventos__modificacion[inicio] -->
    <div class="eventos eventos--workshops">
        <h3 class="eventos__heading">&lt;Workshops /></h3>
        <p class="eventos__fecha">Viernes 5 de Octubre</p>
        <!-- SECTION2 slider3[inicio] -->
        <div class="eventos__listado slider swiper">
            <div class="swiper-wrapper">
                <?php foreach ($eventos['workshops_v'] as $evento) { ?>
                    <?php include __DIR__ . '../../templates/evento.php' ?>
                <?php } ?>
            </div>
            <!-- Flechas de navegación -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            <!-- Paginación (puntos) -->
            <div class="swiper-pagination"></div>
        </div>
        <!-- !SECTION2 fin - slider3[fin] -->
        <p class="eventos__fecha">Sábado 6 de Octubre</p>
        <!-- SECTION4 slider4[inicio] -->
        <div class="eventos__listado slider swiper">
            <div class="swiper-wrapper">
                <?php foreach ($eventos['workshops_s'] as $evento) { ?>
                    <?php include __DIR__ . '../../templates/evento.php' ?>
                <?php } ?>
            </div>
            <!-- Flechas de navegación -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            <!-- Paginación (puntos) -->
            <div class="swiper-pagination"></div>
        </div>
        <!-- !SECTION4 fin - slider4[fin] -->
    </div>
    <!-- !section1  fin - eventos__modificacion[fin] -->
</main>