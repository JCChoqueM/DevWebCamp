<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información Personal</legend>

    <!-- section  nombre[inicio] -->
    <div class="formulario__campo">
        <label
            for="nombre"
            class="formulario__label"
        >Nombre</label>
        <input
            type="text"
            class="formulario__input"
            id="nombre"
            name="nombre"
            placeholder="Nombre Ponente"
            value="<?= $ponente->nombre ?? '' ?>"
        >
    </div>
    <!-- !section  fin - nombre[fin] -->

    <!-- section1 Apellido[inicio] -->
    <div class="formulario__campo">
        <label
            for="apellido"
            class="formulario__label"
        >Apellido</label>
        <input
            type="text"
            class="formulario__input"
            id="apellido"
            name="apellido"
            placeholder="Apellido Ponente"
            value="<?= $ponente->apellido ?? '' ?>"
        >
    </div>
    <!-- !section1 fin - Apellido[fin] -->

    <!-- section2 ciudad[inicio] -->
    <div class="formulario__campo">
        <label
            for="ciudad"
            class="formulario__label"
        >Ciudad</label>
        <input
            type="text"
            class="formulario__input"
            id="ciudad"
            name="ciudad"
            placeholder="Ciudad Ponente"
            value="<?= $ponente->ciudad ?? '' ?>"
        >
    </div>
    <!-- !section2 fin - ciudad[fin] -->

    <!-- section3 pais[inicio] -->
    <div class="formulario__campo">
        <label
            for="pais"
            class="formulario__label"
        >Pais</label>
        <input
            type="text"
            class="formulario__input"
            id="pais"
            name="pais"
            placeholder="Pais Ponente"
            value="<?= $ponente->pais ?? '' ?>"
        >
    </div>
    <!-- !section3 fin - pais[fin] -->

    <!-- section4 imagen [inicio] -->
    <div class="formulario__campo">
        <label
            for="imagen"
            class="formulario__label"
        >Imagen</label>
        <input
            type="file"
            class="formulario__input formulario__input--file"
            id="imagen"
            name="imagen"
        >
    </div>
    <!-- !section4 fin - imagen [fin] -->

    <!-- section5 editar imagen [inicio] -->
    <?php if (isset($ponente->imagen_actual)) { ?>
        <p class="formulario__texto">Imagen Actual:</p>
        <div class="formulario__imagen">
            <picture>
                <source
                    srcset="<?= $_ENV['APP_URL'] . '/img/speakers/' . $ponente->imagen ?>.webp"
                    type="image/webp"
                >
                <source
                    srcset="<?= $_ENV['APP_URL'] . '/img/speakers/' . $ponente->imagen ?>.png"
                    type="image/png"
                >
                <img
                    src="<?= $_ENV['APP_URL'] . '/img/speakers/' . $ponente->imagen ?>.png"
                    alt="Imagen Ponente"
                >
            </picture>

        </div>
    <?php } ?>
    <!-- !section5 fin - editar imagen [fin] -->


</fieldset>


<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información Personal</legend>

    <!-- section  areas de experiencia (separadas por coma)[inicio] -->
    <div class="formulario__campo">
        <label
            for="tags_input"
            class="formulario__label"
        >Áreas de Experiencia (separadas por coma)</label>
        <input
            type="text"
            class="formulario__input"
            id="tags_input"
            placeholder="Ej. Node.js, PHP, CSS, Laravel, UX/UI"
        >
        <!-- SECTION  se llenara con JavaScript[inicio] -->
        <div
            id="tags"
            class="formulario__listado"
        ></div>
        <!-- !SECTION  fin - se llenara con JavaScript[fin] -->
        <input
            type="hidden"
            name="tags"
            value="<?= $ponente->tags ?? '' ?>"
        >
    </div>
    <!-- !section  fin - areas de experiencia (separadas por coma)[fin] -->

</fieldset>


<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Redes Sociales</legend>

    <!-- section  facebook[inicio] -->
    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-facebook"></i>
            </div>
            <input
                type="text"
                class="formulario__input--sociales"
                name="redes[facebook]"
                placeholder="Facebook"
                value="<?= $ponente->facebook ?? '' ?>"
            >
        </div>
    </div>
    <!-- !section  fin - facebook[fin] -->

    <!-- section1 Twitter[inicio] -->
    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-twitter"></i>
            </div>
            <input
                type="text"
                class="formulario__input--sociales"
                name="redes[twitter]"
                placeholder="Twitter"
                value="<?= $ponente->twitter ?? '' ?>"
            >
        </div>
    </div>
    <!-- !section1 fin - Twitter[fin] -->

    <!-- section2 youtube[inicio] -->
    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-youtube"></i>
            </div>
            <input
                type="text"
                class="formulario__input--sociales"
                name="redes[youtube]"
                placeholder="Youtube"
                value="<?= $ponente->youtube ?? '' ?>"
            >
        </div>
    </div>
    <!-- !section2 fin - youtube[fin] -->

    <!-- section3 Instagram[inicio] -->
    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-instagram"></i>
            </div>
            <input
                type="text"
                class="formulario__input--sociales"
                name="redes[instagram]"
                placeholder="Instagram"
                value="<?= $ponente->instagram ?? '' ?>"
            >
        </div>
    </div>
    <!-- !section3 fin - Instagram[fin] -->

    <!-- section4 TikTok[inicio] -->
    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-tiktok"></i>
            </div>
            <input
                type="text"
                class="formulario__input--sociales"
                name="redes[tiktok]"
                placeholder="TikTok"
                value="<?= $ponente->tiktok ?? '' ?>"
            >
        </div>
    </div>
    <!-- !section4 fin - TikTok[fin] -->

    <!-- section5 GitHub[inicio] -->
    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-github"></i>
            </div>
            <input
                type="text"
                class="formulario__input--sociales"
                name="redes[github]"
                placeholder="GitHub"
                value="<?= $ponente->github ?? '' ?>"
            >
        </div>
    </div>
    <!-- !section5 fin - GitHub[fin] -->

</fieldset>