<?php

use Model\Evento;

/** @var Evento $evento */
/** @var array $categorias */
/** @var array $dias */
/** @var array $horas */
?>
<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Informacion Evento</legend>
    <!-- section  nombre[inicio] -->
    <div class="formulario__campo">
        <label
            for="nombre"
            class="formulario__label"
        >Nombre Evento</label>
        <input
            type="text"
            class="formulario__input"
            id="nombre"
            name="nombre"
            placeholder="Nombre Evento"
            value="<?= $evento->nombre ?>"
        >
    </div>
    <!-- !section  fin - nombre[fin] -->

    <!-- section1  Descripcion[inicio] -->
    <div class="formulario__campo">
        <label
            for="descripcion"
            class="formulario__label"
        >Descripción</label>
        <textarea
            class="formulario__input"
            id="descripcion"
            name="descripcion"
            placeholder="Descripción Evento"
            rows="8"
        ><?= $evento->descripcion ?></textarea>
    </div>
    <!-- !section1  fin - Descripcion[fin] -->


    <!-- section2  Categoria[inicio] -->
    <div class="formulario__campo">
        <label
            for="categoria"
            class="formulario__label"
        >Categoria o Tipo de Evento</label>
        <select
            class="formulario__select"
            id="categoria"
            name="categoria_id"
        >
            <option value="">-- Seleccionar --</option>

            <?php require __DIR__ . '/partials/opciones_categoria.php'; ?>

        </select>

    </div>
    <!-- !section2  fin - Categoria[fin] -->


    <!-- section3 dias[inicio] -->

    <div class="formulario__campo">
        <label
            for="categoria"
            class="formulario__label"
        >Selecciona el día</label>

        <div class="formulario__radio">

            <?php foreach ($dias as $dia) { ?>
                <div>
                    <label for="<?= strtolower($dia->nombre) ?>"><?= $dia->nombre ?></label>
                    <input
                        type="radio"
                        id="<?= strtolower($dia->nombre) ?>"
                        name="dia"debuguear($user);
                        value="<?= $dia->id ?>"
                    >
                </div>
            <?php } ?>
        </div>
        <input
            type="hidden"
            name="dia_id"
            value=""
        >

    </div>

    <!-- !section3 fin - dias[fin] -->

    <!-- section4 horas[inicio] -->
    <div
        id="horas"
        class="formulario__campo"
    >
        <label
            for="horas"
            class="formulario__label"
        >Seleccionar Hora</label>
        <ul
            id="horas"
            class="horas"
        >
            <?php foreach ($horas as $hora) { ?>
                <li class="horas__hora"><?= $hora->hora ?></li>
            <?php } ?>
        </ul>
    </div>
    <!-- !section4 fin - horas[fin] -->
</fieldset>

<!-- SECTION  [inicio] -->
<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información Extra</legend>

    <!-- section  Ponente[inicio] -->
    <div class="formulario__campo">
        <label
            for="ponentes"
            class="formulario__label"
        >Ponente</label>
        <input
            type="text"
            class="formulario__input"
            id="ponentes"
            placeholder="Buscar Ponente"
        >
    </div>
    <!-- !section  fin - Ponente[fin] -->

    <!-- section  Lugares disponibles[inicio] -->
    <div class="formulario__campo">
        <label
            for="disponibles"
            class="formulario__label"
        >Lugares Disponibles</label>

        <input
            type="number"
            min="1"
            class="formulario__input"
            id="disponibles"
            name="disponibles"
            placeholder="Ej. 20"
            value="<?php echo $evento->disponibles ?>"
        >
    </div>
    <!-- !section  fin - Lugares disponibles[fin] -->
</fieldset>
<!-- !SECTION  fin - [fin] -->