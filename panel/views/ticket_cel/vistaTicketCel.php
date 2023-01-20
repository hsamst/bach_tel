<section class="page-content" style="text-align:center;">
    <h1> ¡Datos para la carta de resguardo! </h1>
    <table>
        <thead>
            <tr>
                <td>id_ticket_cel</td>
                <td>Fecha de entrega</td>
                <td>Descripcion</td>
                <td>No. empleado</td>
                <td>imei</td>
                <td>id_cambio</td>
                <td>Opciones</td>
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
                <td>
                    <div>
                        <a href="ctrlTicketCel.php?accion=modify&id_ticket_cel=<?php echo $datosTicketCel['id_ticket_cel']; ?>"><button
                                id="btn2 first2" type="button" class="btn2 first2">Editar <i
                                    class="bi bi-pencil"></i></button></a>
                        <a href="ctrlTicketCel.php?accion=delete&id_ticket_cel=<?php echo $datosTicketCel['id_ticket_cel']; ?>"><button
                                id="btn3 first" type="button" class="btn first">Borrar <i
                                    class="bi bi-trash"></i></button></a>
                    </div>
                </td>
            </tr>
            <?php
                endforeach;
            ?>
        </tbody>
    </table>
    <a href="ctrlTicketCel.php?accion=new" class="btn3 first3" style="float: right;"> Añadir nuevo Cel</a>
</section>