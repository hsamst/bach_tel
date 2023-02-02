<?php
require_once('mdlTicketCel.php');
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename=ticketCels.xls");
    $datosTicketCels = $ticketCel->read();
?>
<table>
        <thead>
            <tr>
                <td>id_ticket_cel</td>
                <td>Fecha de entrega</td>
                <td>Descripcion</td>
                <td>No. empleado</td>
                <td>imei</td>
                <td>id_cambio</td>
            </tr>
        </thead>
        <tbody>

            <?php
                foreach ($datosTicketCels as $key => $datosTicketCel):
            ?>

            <tr>
                <td><?php echo $datosTicketCel['id_ticket_cel'] ?></td>
                <td><?php echo $datosTicketCel['fecha_entrega'] ?></td>
                <td><?php echo $datosTicketCel['descripcion'] ?></td>
                <td><?php echo $datosTicketCel['empleado'] ?></td>
                <td><?php echo $datosTicketCel['imei'] ?></td>
                <td><?php echo $datosTicketCel['cambio'] ?></td>
            </tr>
            <?php
                endforeach;
            ?>
        </tbody>
    </table>