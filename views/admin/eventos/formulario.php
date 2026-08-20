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
        ></textarea>
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
            name="categora_id"
        >
            <option value="">-- Seleccionar --</option>
            <?php foreach ($categorias as $categoria) { ?>
                <option value="<?= $categoria->id ?>"><?= $categoria->nombre ?></option>
            <?php } ?>

        </select>

    </div>
    <!-- !section2  fin - Categoria[fin] -->
</fieldset>