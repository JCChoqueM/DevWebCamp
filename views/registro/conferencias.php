<h2 class="pagina__heading"><?php echo $titulo; ?></h2>
<p class="pagina__descripcion">Elige hasta 5 eventos para asistir de manera presencial</p>

<div class="eventos-registro">

    <main class="eventos-registro__listado">
        <!-- SECTION  part1[inicio] -->
        <h3 class="eventos-registro__heading--conferencias">&lt;Conferencias /></h3>
        <p class="eventos-registro__fecha">Viernes 5 de Octubre</p>

        <div class="eventos-registro__grid">
            <?php foreach ($eventos['conferencias_v'] as $evento) { ?>
                <?php include __DIR__ . '/evento.php' ?>
            <?php } ?>
        </div>
        <p class="eventos-registro__fecha">Sabado 6 de Octubre</p>
        <div class="eventos-registro__grid">
            <?php foreach ($eventos['conferencias_s'] as $evento) { ?>
                <?php include __DIR__ . '/evento.php' ?>
            <?php } ?>
        </div>
        <!-- !SECTION  fin - part1[fin] -->

        <!-- SECTION1 part2[inicio] -->
        <h3 class="eventos-registro__heading--workshops">&lt;Workshops /></h3>
        <p class="eventos-registro__fecha">Viernes 5 de Octubre</p>

        <div class="eventos-registro__grid eventos--workshops">
            <?php foreach ($eventos['workshops_v'] as $evento) { ?>
                <?php include __DIR__ . '/evento.php' ?>
            <?php } ?>
        </div>
        <p class="eventos-registro__fecha">Sabado 6 de Octubre</p>
        <div class="eventos-registro__grid eventos--workshops">
            <?php foreach ($eventos['workshops_s'] as $evento) { ?>
                <?php include __DIR__ . '/evento.php' ?>
            <?php } ?>
        </div>
        <!-- !SECTION1 fin - part2[fin] -->


    </main>

    <aside class="registro">
        <h2 class="registro__heading">Tu Registro</h2>

        <div id="registro-resumen"
             class="registro__resumen">
        </div>
        <!-- SECTION regalo [inicio] -->
        <div class="registro__regalo">
            <label for="regalo"
                   class="registro__label">Selecciona un regalo:</label>
            <select id="regalo"
                    class="registro__select">
                <option value="">- Seleccione un regalo -</option>
                <?php foreach ($regalos as $regalo) { ?>
                    <option value="<?php echo $regalo->id; ?>"><?php echo $regalo->nombre; ?></option>
                <?php } ?>
            </select>
        </div>
        <!-- !SECTION regalo fin - [fin] -->


        <!-- SECTION1 formulario registro[inicio] -->
        <form id="registro"
              action="formulario">
            <div class="formulario__campo">
                <input type="submit"
                       class="formulario__submit formulario__submit--full"
                       value="Registrarme">
            </div>
        </form>
        <!-- !SECTION1 fin - formulario registro[fin] -->
    </aside>
</div>