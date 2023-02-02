<?php
require_once('mdlUn.php');
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename=un.xls");
    $datosUns = $un->read();
?>
<table>
        <thead>
            <tr>
                <td>#</td>
                <td>Nombre</td>
            </tr>
        </thead>
        <tbody>

            <?php
                foreach ($datosUns as $key => $datosUn):
            ?>

            <tr>
                <td><?php echo $datosUn['id_un'] ?></td>
                <td><?php echo $datosUn['nombre'] ?></td>
            </tr>
            <?php
                endforeach;
            ?>
        </tbody>
    </table>