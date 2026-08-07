<aside class="dashboard__sidebar">
    <nav class="dashboard__menu">

        <!-- section1 Inicio[inicio] -->
        <a
            href="/admin/dashboard"
            class="dashboard__enlace <?= pagina_actual('/dashboard') ? 'dashboard__enlace--actual' : '' ?> "
        >
            <i class="fa-solid fa-house dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Inicio
            </span>

        </a>

        <!-- !section1 fin - Inicio[fin] -->


        <!-- section2 ponentes[inicio] -->
        <a
            href="/admin/ponentes"
            class="dashboard__enlace <?= pagina_actual('/ponentes') ? 'dashboard__enlace--actual' : '' ?> "
        >
            <i class="fa-solid fa-microphone dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Ponentes
            </span>

        </a>
        <!-- !section2 fin - ponentes[fin] -->

        <!-- section3 eventos[inicio] -->

        <a
            href="/admin/eventos"
            class="dashboard__enlace <?= pagina_actual('/eventos') ? 'dashboard__enlace--actual' : '' ?> "
        >
            <i class="fa-solid fa-calendar dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Eventos
            </span>

        </a>
        <!-- !section3 fin - eventos[fin] -->

        <!-- section4 Registrados[inicio] -->
        <a
            href="/admin/registrados"
            class="dashboard__enlace <?= pagina_actual('/registrados') ? 'dashboard__enlace--actual' : '' ?> "
        >
            <i class="fa-solid fa-users dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Regitrados
            </span>

        </a>
        <!-- !section4 fin - Registrados[fin] -->

        <!-- section5 Regalos[inicio] -->
        <a
            href="/admin/regalos"
            class="dashboard__enlace <?= pagina_actual('/regalos') ? 'dashboard__enlace--actual' : '' ?> "
        >
            <i class="fa-solid fa-gift dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Regalos
            </span>

        </a>
        <!-- !section5 fin - Regalos[fin] -->

    </nav>
</aside>