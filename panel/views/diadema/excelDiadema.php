<?php
require_once('mdlDiadema.php');
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename=Diademas.xls");
    $datosDiademas = $diadema->read();
?>
<table>
<thead>
            <tr>
            <td scope="col">#</td>
            <td scope="col">Descripcion</td>
            <td scope="col">Marca</td>
            </tr>
        </thead>
        <tbody>

            <?php
                foreach ($datosDiademas as $key => $datosDiadema):
            ?>
            <tr>
            <td><?php echo $datosDiadema['id_diadema'] ?></td>
            <td><?php echo $datosDiadema['descripcion'] ?></td>
            <td><?php echo $datosDiadema['nombre_marca'] ?></td>
            </tr>

            <?php
                endforeach;
            ?>

        </tbody> 
                </table>