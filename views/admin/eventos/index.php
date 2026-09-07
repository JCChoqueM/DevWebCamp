<h2 class="dashboard__heading"><?= $titulo ?></h2>

<div class="dashboard__contenedor-boton">
    <a
        class="dashboard__boton"
        href="/admin/eventos/crear"
    >
        <i class="fa-solid fa-circle-plus"> </i>
        Añadir Evento
    </a>
</div>

<div class="dashboard__contenedor">
    <?php if (!empty($eventos)) { ?>
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <!-- subBloque  nombre[inicio]-->
                    <th
                        scope="col"
                        class="table__th"
                    >Evento</th>
                    <!-- !subBloque  fin - nombre[fin]-->

                    <!-- subBloque1  Categoria[inicio]-->
                    <th
                        scope="col"
                        class="table__th"
                    >Categoria</th>
                    <!-- !subBloque1 fin - Categoria[fin]-->

                    <!-- subBloque2 Día y Hora[inicio]-->
                    <th
                        scope="col"
                        class="table__th"
                    >Día y Hora</th>
                    <!-- !subBloque2 fin - Día y Hora[fin]-->

                    <!-- subBloque2 Ponente[inicio]-->
                    <th
                        scope="col"
                        class="table__th"
                    >Ponente</th>
                    <!-- !subBloque2 fin - Ponente[fin]-->
                    <!-- subBloque2 Editar y/o Eliminar[inicio]-->
                    <th
                        scope="col"
                        class="table__th"
                    >Editar y/o Eliminar</th>
                    <!-- !subBloque2 fin - Editar y/o Eliminar[fin]-->
                </tr>
            </thead>


            <tbody class="table__tbody">
                <?php foreach ($eventos as $evento) { ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <?= $evento->nombre ?>
                        </td>

                        <td class="table__td">
                            <?= $evento->categoria->nombre ?>
                        </td>
                        <td class="table__td">
                            <?= $evento->dia->nombre . "," . $evento->hora->hora ?>
                        </td>
                        <td class="table__td">
                            <?= $evento->ponente->nombre . " " . $evento->ponente->apellido ?>
                        </td>
                        <td class="table__td--acciones">
                            <a
                                href="/admin/eventos/editar?id=<?= $evento->id ?>"
                                class="table__accion table__accion--editar"
                            >
                                <i class="fa-solid fa-pencil"></i>
                                Editar</a>

                            <form
                                action="/admin/eventos/eliminar"
                                method="POST"
                                class="table__formulario"
                            >
                                <input
                                    type="hidden"
                                    name="id"
                                    value="<?= $evento->id ?>"
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
        <p class="text-center">No hay Eventos Aun</p>
    <?php } ?>
</div>

<?php
echo $paginacion;

?>