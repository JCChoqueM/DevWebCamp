<h2 class="dashboard__heading"><?= $titulo ?></h2>
<div class="dashboard__contenedor-boton">
    <a
        class="dashboard__boton"
        href="/admin/ponentes/crear"
    >
        <i class="fa-solid fa-circle-plus"> </i>
        Añadir Ponente     
    </a>
</div>

<div class="dashboard__contenedor">
    <?php if (!empty($ponentes)) { ?>
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <!-- subBloque  nombre[inicio]-->
                    <th
                        scope="col"
                        class="table__th"
                    >Nombre</th>
                    <!-- !subBloque  fin - nombre[fin]-->

                    <!-- subBloque1  Ubicacion[inicio]-->
                    <th
                        scope="col"
                        class="table__th"
                    >Ubicacion</th>
                    <!-- !subBloque1 fin - Ubicacion[fin]-->

                    <!-- subBloque2 vacio[inicio]-->
                    <th
                        scope="col"
                        class="table__th"
                    ></th>
                    <!-- !subBloque2 fin - vacio[fin]-->

                </tr>
            </thead>


            <tbody class="table__tbody">
                <?php foreach ($ponentes as $ponente) { ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <?= $ponente->nombre . " " . $ponente->apellido; ?>
                        </td>
                        <td class="table__td">
                            <?= "$ponente->ciudad, $ponente->pais" ?>
                        </td>
                        <td class="table__td--acciones">
                            <a
                                href="/admin/ponentes/editar?id=<?= $ponente->id ?>"
                                class="table__accion table__accion--editar"
                            >
                                <i class="fa-solid fa-user-pen"></i>
                                Editar</a>

                            <form
                                action=""
                                class="table__formulario"
                            >
                                <button
                                    class="table__accion table__accion--eliminar"
                                    type="submit"
                                >
                                    <i class="fa-solid fa-circle-xmark"></i>
                                    Eliminar
                                </button>

                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    <?php } else { ?>
        <p class="text-center">No hay Ponentes Aun</p>
    <?php } ?>
</div>