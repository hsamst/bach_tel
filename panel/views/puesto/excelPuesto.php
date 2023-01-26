<?php
require_once('mdlPuesto.php');
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename=puestos.xls");
    $datosPuestos = $puesto->read();
?>
<table>
<thead>
            <tr>
            <td>#</td>
            <td>Nombre</td>
            <td>Descripcion</td>
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
            </tr>
            <?php
                endforeach;
            ?>
        </tbody> 
                </table>