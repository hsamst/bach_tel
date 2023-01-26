<section class="page-content" style="text-align:center;">
    <div class="text">¡Puesto!</div>
    <a href="ctrlPuesto.php?accion=new" class="btn3 first3" style="float: right;"> Añadir una nueva Unidad de negocio</a>
    <a href="./excelPuesto.php" class="btn3 first3" style="float: right;"> Descarga en excel</a>
    <table>
        <thead>
            <tr>
            <td>#</td>
            <td>Nombre</td>
            <td>Descripcion</td>
            <td>Opciones</td>
            </tr>
        </thead>
        <tbody>

            <?php
                foreach ($datosPuestos as $key => $datosPuesto):
            ?>

            <tr>
            <td><?php echo $datosPuesto['id_puesto'] ?></td>
            <td><?php echo $datosPuesto['nombre'] ?></td>
            <td><?php echo $datosPuesto['descripcion'] ?></td>

                <td>  
                    <div>
                    <a href="ctrlPuesto.php?accion=modify&id_puesto=<?php echo $datosPuesto['id_puesto']; ?>"><button
                                id="btn2 first2" type="button" class="btn2 first2">Editar <i class="bi bi-pencil"></i></button></a>
                    <a href="ctrlPuesto.php?accion=delete&id_puesto=<?php echo $datosPuesto['id_puesto']; ?>"><button
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