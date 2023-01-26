<?php
require_once('mdlMarca.php');
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename=marcas.xls");
    $datosMarcas = $marca->read();
?>
<table>
        <thead>
            <tr>
            <td scope="col">#</td>
            <td scope="col">Nombre</td>
            <td scope="col">Modelo</td>
            </tr>
        </thead>
        <tbody>

            <?php
                foreach ($datosMarcas as $key => $datosMarca):
            ?>

            <tr>
            <td><?php echo $datosMarca['id_marca'] ?></td>
            <td><?php echo $datosMarca['nombre_marca'] ?></td>
            <td><?php echo $datosMarca['modelo'] ?></td>
            </tr>
            <?php
                endforeach;
            ?>

        </tbody> 
                </table>