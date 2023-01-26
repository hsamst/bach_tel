<?php
require_once('mdlModelo.php');
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename=modelos.xls");
    $datosModelos = $modelo->read();
?>
<table>
<thead>
            <tr>
            <td scope="col">#</td>
            <td scope="col">Modelo</td>
            </tr>
        </thead>
        <tbody>

            <?php
                foreach ($datosModelos as $key => $datosModelo):
            ?>

            <tr>
            <td><?php echo $datosModelo['id_modelo'] ?></td>
            <td><?php echo $datosModelo['tipo_modelo'] ?></td>
            </tr>
            <?php
                endforeach;
            ?>

        </tbody> 
                </table>