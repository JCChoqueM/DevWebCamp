<?php
include_once __DIR__ . '/conferencias.php';
?>
<section class="resumen">
    <div class="resumen__grid">
        <!-- section  speackers[inicio] -->
        <div class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero"><?= $ponentes ?></p>
            <p class="resumen__texto">Speakers</p>
        </div>
        <!-- !section  fin - speackers[fin] -->

        <!-- section1 conferencias[inicio] -->
        <div class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero"><?= $conferencias ?></p>
            <p class="resumen__texto">conferencias</p>
        </div>
        <!-- !section1 fin - conferencias[fin] -->

        <!-- section2 workshops[inicio] -->
        <div class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero"><?= $workshops ?></p>
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