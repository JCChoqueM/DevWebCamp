<main class="agenda">
    <h2 class="agenda__heading">Workshops & Conferencias</h2>
    <p class="agenda__descripcion">Talleres 2 y Conferencias dictados por expertos en desarrollo web</p>

    <!-- section  eventos[inicio] -->
    <div class="eventos">
        <h3 class="eventos__heading">&lt;Conferencias /></h3>
        <p class="eventos__fecha">Viernes 5 de Octubre</p>
        <div class="eventos__listado slider swiper">
            <div class="swiper-wrapper">


                <?php foreach ($eventos['conferencias_v'] as $evento) { ?>
                    <div class="evento swiper-slide">
                        <p class="evento__hora"><?= $evento->hora->hora ?></p>

                        <div class="evento__informacion">
                            <h4 class="evento__nombre"><?= $evento->nombre ?></h4>
                            <p class="evento__introduccion"><?= $evento->descripcion ?></p>

                            <div class="evento__autor-info">
                                <picture>
                                    <source
                                        srcset="<?= $_ENV['APP_URL'] . '/img/speakers/' . $evento->ponente->imagen ?>.webp"
                                        type="image/webp"
                                    >
                                    <source
                                        srcset="<?= $_ENV['APP_URL'] . '/img/speakers/' . $evento->ponente->imagen ?>.png"
                                        type="image/png"
                                    >
                                    <img
                                        class="evento__imagen-autor"
                                        loading="lazy"
                                        width="200"
                                        height="300"
                                        src="<?= $_ENV['APP_URL'] . '/img/speakers/' . $evento->ponente->imagen ?>.png"
                                        alt="Imagen Ponente"
                                    >
                                </picture>
                                <p class="evento__autor-nombre">
                                    <?= $evento->ponente->nombre . " " . $evento->ponente->apellido ?>
                                </p>
                            </div>
                        </div>
                    </div> <!-- ✅ ahora se cierra aquí -->
                <?php } ?>
            </div>

            <!-- Flechas de navegación -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

            <!-- Paginación (puntos) -->
            <div class="swiper-pagination"></div>
        </div>
        <p class="eventos__fecha">Sábado 6 de Octubre</p>
        <div class="eventos__listado">

        </div>
    </div>
    <!-- !section  fin - eventos[fin] -->

    <!-- section1  eventos__modificacion[inicio] -->
    <div class="eventos eventos--workshops">
        <h3 class="eventos__heading">&lt;Workshops /></h3>
        <p class="eventos__fecha">Viernes 5 de Octubre</p>
        <div class="eventos__listado">

        </div>
        <p class="eventos__fecha">Sábado 6 de Octubre</p>
        <div class="eventos__listado">

        </div>
    </div>
    <!-- !section1  fin - eventos__modificacion[fin] -->
</main>