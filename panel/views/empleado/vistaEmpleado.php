<section class="page-content" style="text-align:center;">
    <div class="text">¡Empleado!</div>
    <a href="ctrlEmpleado.php?accion=new" class="btn3 first3" style="float: right;"> Añadir una nueva Unidad de negocio</a>
    <a href="./excelEmpleado.php" class="btn3 first3" style="float: right;"> Descarga en excel</a>

    <table>
        <thead>
            <tr>
            <td># Empleado</td>
            <td>Nombre Completp</td>
            <td>Puesto</td>
            <td>Un</td>
            <td>Opciones</td>
            </tr>
        </thead>
        <tbody>

            <?php
                foreach ($datosEmpleados as $key => $datosEmpleado):
            ?>

            <tr>
            <td><?php echo $datosEmpleado['no_empleado'] ?></td>
            <td><?php echo $datosEmpleado['nombre_completo'] ?></td>
            <td><?php echo $datosEmpleado['puesto'] ?></td>
            <td><?php echo $datosEmpleado['Un'] ?></td>
                <td>  
                    <div>
                    <a href="ctrlEmpleado.php?accion=modify&no_empleado=<?php echo $datosEmpleado['no_empleado']; ?>"><button
                                id="btn2 first2" type="button" class="btn2 first2">Editar <i class="bi bi-pencil"></i></button></a>
                    <a href="ctrlEmpleado.php?accion=delete&no_empleado=<?php echo $datosEmpleado['no_empleado']; ?>"><button
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