<?php
include_once __DIR__ . '/conferencias.php';
?>
<section class="resumen">
    <div class="resumen__grid">
        <!-- section  speackers[inicio] -->
        <div class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero"><?= $ponentes_total ?></p>
            <p class="resumen__texto">Speakers</p>
        </div>
        <!-- !section  fin - speackers[fin] -->

        <!-- section1 conferencias[inicio] -->
        <div class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero"><?= $conferencias_total ?></p>
            <p class="resumen__texto">conferencias</p>
        </div>
        <!-- !section1 fin - conferencias[fin] -->

        <!-- section2 workshops[inicio] -->
        <div class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero"><?= $workshops_total ?></p>
            <p class="resumen__texto">Workshops</p>
        </div>
        <!-- !section2 fin - workshops[fin] -->

        <!-- section3 Asistentes[inicio] -->
        <div class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero">18</p>
            <p class="resumen__texto">Asistentes</p>
        </div>
        <!-- !section3 fin - Asistentes[fin] -->

    </div>
</section>

<section class="speakers">
    <h2 class="speakers__heading">Speakers</h2>
    <p class="speakers__descripcion">Conoce a nuestros expertos de DevWebCamp</p>

    <div class="speakers__grid">
        <?php foreach ($ponentes as $ponente) { ?>
            <div class="speaker">
                <picture>
                    <source srcset="<?= $_ENV['APP_URL'] . '/img/speakers/' . $ponente->imagen ?>.webp"
                            type="image/webp">
                    <source srcset="<?= $_ENV['APP_URL'] . '/img/speakers/' . $ponente->imagen ?>.png"
                            type="image/png">
                    <img class="speaker__imagen"
                         loading="lazy"
                         width="200"
                         height="300"
                         src="<?= $_ENV['APP_URL'] . '/img/speakers/' . $ponente->imagen ?>.png"
                         alt="Imagen Ponente">
                </picture>
                <div class="speaker__informacion">
                    <h4 class="speaker__nombre">
                        <?= $ponente->nombre . ' ' . $ponente->apellido ?>
                    </h4>

                    <p class="speaker__ubicacion">
                        <?= $ponente->ciudad . ', ' . $ponente->pais ?>
                    </p>
                    <nav class="speaker-sociales">
                        <?php
                        $redes = json_decode($ponente->redes);
                        ?>
                        <!-- SECTION  if para redes solciales[inicio] -->
                        <!-- section1 facebook [inicio] -->
                        <?php if (!empty($redes->facebook)) { ?>
                            <a class="speaker-sociales__enlace"
                               rel="noopener noreferrer"
                               target="_blank"
                               href="<?= $redes->facebook ?>">
                                <span class="speaker-sociales__ocultar">Facebook</span>
                            </a>
                        <?php } ?>
                        <!-- !section1  facebookfin - [fin] -->

                        <!-- section2 twitter[inicio] -->
                        <?php if (!empty($redes->twitter)) { ?>

                            <a class="speaker-sociales__enlace"
                               rel="noopener noreferrer"
                               target="_blank"
                               href="<?= $redes->twitter ?>">
                                <span class="speaker-sociales__ocultar">Twitter</span>
                            </a>
                        <?php } ?>
                        <!-- !section2 fin - twitter[fin] -->

                        <!-- section3 youtube[inicio] -->
                        <?php if (!empty($redes->youtube)) { ?>

                            <a class="speaker-sociales__enlace"
                               rel="noopener noreferrer"
                               target="_blank"
                               href="<?= $redes->youtube ?>">
                                <span class="speaker-sociales__ocultar">YouTube</span>
                            </a>
                        <?php } ?>
                        <!-- !section3 fin - youtube[fin] -->

                        <!-- section4 instagram[inicio] -->
                        <?php if (!empty($redes->instagram)) { ?>

                            <a class="speaker-sociales__enlace"
                               rel="noopener noreferrer"
                               target="_blank"
                               href="<?= $redes->instagram ?>">
                                <span class="speaker-sociales__ocultar">Instagram</span>
                            </a>
                        <?php } ?>
                        <!-- !section4 fin - instagram[fin] -->

                        <!-- section5 tiktok [inicio] -->
                        <?php if (!empty($redes->tiktok)) { ?>
                            <a class="speaker-sociales__enlace"
                               rel="noopener noreferrer"
                               target="_blank"
                               href="<?= $redes->tiktok ?>">
                                <span class="speaker-sociales__ocultar">Tiktok</span>
                            </a>
                        <?php } ?>
                        <!-- !section5 tiktok fin - [fin] -->

                        <!-- section6 github [inicio] -->
                        <?php if (!empty($redes->github)) { ?>

                            <a class="speaker-sociales__enlace"
                               rel="noopener noreferrer"
                               target="_blank"
                               href="<?= $redes->github ?>">
                                <span class="speaker-sociales__ocultar">github</span>
                            </a>
                        <?php } ?>
                        <!-- !section6 github fin - [fin] -->
                        <!-- !SECTION  fin - if para redes solciales[fin] -->

                    </nav>


                    <ul class="speaker__listado-skills">

                        <?php
                        $tags = explode(',', $ponente->tags);
                        foreach ($tags as $tag) { ?>

                            <li class="speaker__skill"><?= $tag ?></li>
                        <?php } ?>

                    </ul>
                </div>
            </div>
        <?php } ?>
    </div>
</section>


<div id="mapa"
     class="mapa">

</div>