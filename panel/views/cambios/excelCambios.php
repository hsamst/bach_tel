<?php
require_once('mdlCambio.php');
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename=cambio.xls");
    $datosCambios = $cambio->read();
?>
<table>
<thead>
            <tr>
                <td>#</td>
                <td>Descripcion</td>
            </tr>
        </thead>
        <tbody>

            <?php
                foreach ($datosCambios as $key => $datosCambio):
            ?>

            <tr>
                <td><?php echo $datosCambio['id_cambio'] ?></td>
                <td><?php echo $datosCambio['descripcion'] ?></td>
            </tr>
            <?php
                endforeach;
            ?>
        </tbody>
                </table>