<section class="page-content" style="text-align:center;">
    <div class="text">¡Unidad de negocio!</div>
    <a href="ctrlUn.php?accion=new" class="btn3 first3" style="float: right;"> Añadir una nueva Unidad de negocio</a>
    <a href="./excelUn.php" class="btn3 first3" style="float: right;"> Descarga en excel</a>
    <table>
        <thead>
            <tr>
                <td>#</td>
                <td>Nombre</td>
                <td>Opciones</td>
            </tr>
        </thead>
        <tbody>

            <?php
                foreach ($datosUns as $key => $datosUn):
            ?>

            <tr>
                <td><?php echo $datosUn['id_un'] ?></td>
                <td><?php echo $datosUn['nombre'] ?></td>

                <td>
                    <div>
                        <a href="ctrlUn.php?accion=modify&id_un=<?php echo $datosUn['id_un']; ?>"><button
                                id="btn2 first2" type="button" class="btn2 first2">Editar <i class="bi bi-pencil"></i></button></a>
                        <a href="ctrlUn.php?accion=delete&id_un=<?php echo $datosUn['id_un']; ?>"><button
                                id="btn3 first" type="button" class="btn first">Borrar <i
                                    class="bi bi-trash"></i></button></a>
                    </div>
                </td>
            </tr>
            <?php
                endforeach;
            ?>
        </tbody>
    </table>
   </section>