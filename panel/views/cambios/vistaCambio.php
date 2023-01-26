<section class="page-content" style="text-align:center;">
    <div class="text">¡Cambio!</div>
    <a href="ctrlCambio.php?accion=new" class="btn3 first3" style="float: right;"> Añadir nuevo Cambio</a>
    <a href="./excelCambios.php" class="btn3 first3" style="float: right;"> Descarga en excel</a>
    <table>
        <thead>
            <tr>
                <td>#</td>
                <td>Descripcion</td>
                <td>Opciones</td>
            </tr>
        </thead>
        <tbody>

            <?php
                foreach ($datosCambios as $key => $datosCambio):
            ?>

            <tr>
                <td><?php echo $datosCambio['id_cambio'] ?></td>
                <td><?php echo $datosCambio['descripcion'] ?></td>

                <td>
                    <div>
                        <a href="ctrlCambio.php?accion=modify&id_cambio=<?php echo $datosCambio['id_cambio']; ?>"><button
                                id="btn2 first2" type="button" class="btn2 first2">Editar <i class="bi bi-pencil"></i></button></a>
                        <a href="ctrlCambio.php?accion=delete&id_cambio=<?php echo $datosCambio['id_cambio']; ?>"><button
                                id="btn3 first" type="button" class="btn first">Borrar <i class="bi bi-trash"></i></button></a>
                    </div>
                </td>
            </tr>
            <?php
                endforeach;
            ?>
        </tbody>
    </table>
    </section>