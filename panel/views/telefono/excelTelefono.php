<?php
require_once('mdlTelefono.php');
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename=Telefono.xls");
    $datosTelefonos = $telefono->read();
?>
<table>
<thead>
            <tr>
                <td scope="col">imei</td>
                <td scope="col">Linea</td>
                <td scope="col">Accesorios</td>
                <td scope="col">Marca</td>
                <td scope="col">ICCID</td>
                <td scope="col">Plan</td>
            </tr>
        </thead>
        <tbody>

            <?php
                foreach ($datosTelefonos as $key => $datosTelefono):
            ?>

            <tr>
                <td><?php echo $datosTelefono['imei'] ?></td>
                <td><?php echo $datosTelefono['linea'] ?></td>
                <td><?php echo $datosTelefono['accesosrios'] ?></td>
                <td><?php echo $datosTelefono['marca'] ?></td>
                <td><?php echo $datosTelefono['iccid'] ?></td>
                <td><?php echo $datosTelefono['plan'] ?></td>
            </tr>
            <?php
                endforeach;
            ?>
        </tbody>
                </table>