<h2 class="dashboard__heading"><?= $titulo ?></h2>


<div class="dashboard__contenedor">
    <?php if (!empty($registros)) { ?>
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <!-- subBloque  nombre[inicio]-->
                    <th scope="col"
                        class="table__th">Nombre</th>
                    <!-- !subBloque  fin - nombre[fin]-->

                    <!-- subBloque1  Ubicacion[inicio]-->
                    <th scope="col"
                        class="table__th">Email</th>
                    <!-- !subBloque1 fin - Ubicacion[fin]-->

                    <!-- subBloque2 vacio[inicio]-->
                    <th scope="col"
                        class="table__th">Plan</th>
                    <!-- !subBloque2 fin - vacio[fin]-->

                </tr>
            </thead>


            <tbody class="table__tbody">
                <?php foreach ($registros as $registro) { ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <?= ($registro->usuario->nombre ?? '') . " " . ($registro->usuario->apellido ?? ''); ?>
                        </td>
                        <td class="table__td">
                             <?= $registro->usuario->email ?? ''; ?>
                        </td>
                        <td class="table__td">
                             <?= $registro->paquete->nombre ?? ''; ?>
                        </td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>

    <?php } else { ?>
        <p class="text-center">No hay Ponentes Aun</p>
    <?php } ?>
</div>

<?php
echo $paginacion;

?>