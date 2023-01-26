<?php
require_once('mdlEmpleado.php');
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename=empleados.xls");
    $datosEmpleados = $empleado->read();
?>
<table>
<thead>
            <tr>
            <td># Empleado</td>
            <td>Nombre Completp</td>
            <td>Puesto</td>
            <td>Un</td>
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
            </tr>
            <?php
                endforeach;
            ?>
        </tbody> 
                </table>