<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>

<main class="bloques">
    <div class="bloques__grid">
        <!-- SECTION  ultimos registros[inicio] -->
        <div class="bloque">
            <h3 class="bloque__heading">Últimos Registros</h3>

            <?php foreach ($registros as $registro) { ?>
                <div class="bloque__contenido">
                    <p class="bloque__texto">
                        <?php echo $registro->usuario->nombre . " " . $registro->usuario->apellido; ?>
                    </p>
                </div>
            <?php } ?>
        </div>
        <!-- !SECTION  fin - ultimos registros[fin] -->

        <!-- SECTION1 ingresos[inicio] -->
        <div class="bloque">
            <h3 class="bloque__heading">Ingresos</h3>

            <p class="bloque__texto--cantidad">
                <?= $ingresos ?>
            </p>
        </div>
        <!-- !SECTION1 fin - ingresos[fin] -->

        <!-- SECTION2 menos_disponibles[inicio] -->
        <div class="bloque">
            <h3 class="bloque__heading">Eventos con menos lugares disponibles</h3>
            <?php foreach ($menos_disponibles as $evento) { ?>
                <div class="bloque__contenido">
                    <p class="bloque__texto">
                        <?php echo $evento->nombre . " - " . $evento->disponibles . ' Disponibles'; ?>
                    </p>
                </div>
            <?php } ?>

        </div>
        <!-- !SECTION2 fin - menos_disponibles[fin] -->
        <!-- SECTION3 mas_disponibles[inicio] -->
        <div class="bloque">
            <h3 class="bloque__heading">Eventos con menos lugares disponibles</h3>
            <?php foreach ($menos_disponibles as $evento) { ?>
                <div class="bloque__contenido">
                    <p class="bloque__texto">
                        <?php echo $evento->nombre . " - " . $evento->disponibles . ' Disponibles'; ?>
                    </p>
                </div>
            <?php } ?>

        </div>
        <!-- !SECTION3 fin - mas_disponibles[fin] -->
    </div>
</main>