<section class="page-content" style="text-align:center;">
    <h1>¡Datos para la carta de resguardo Diadema!</h1>
    <table>
        <thead>
            <tr>
                <td>Ticket</td>
                <td>Fecha de entrega</td>
                <td>Descripcion</td>
                <td>No. empleado</td>
                <td>id_cambio</td>
                <td>id_diadema</td>
                <td>Opciones</td>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($datosTicketDiademas as $key => $datosTicketDiadema):?>
            <tr>
                <td><?php echo $datosTicketDiadema['id_ticket_diadema'] ?></td>
                <td><?php echo $datosTicketDiadema['fecha_entrega'] ?></td>
                <td><?php echo $datosTicketDiadema['descripcion'] ?></td>
                <td><?php echo $datosTicketDiadema['empleado'] ?></td>
                <td><?php echo $datosTicketDiadema['cambio'] ?></td>
                <td><?php echo $datosTicketDiadema['id_diadema'] ?></td>
                <td>
                    <div>
                        <a
                            href="ctrlTicketDiadema.php?accion=modify&id_ticket_diadema=<?php echo $datosTicketDiadema['id_ticket_diadema']; ?>"><button
                                id="btn2 first2" type="button" class="btn2 first2">Editar <i
                                    class="bi bi-pencil"></i></button></a>
                        <a
                            href="ctrlTicketDiadema.php?accion=delete&id_ticket_diadema=<?php echo $datosTicketDiadema['id_ticket_diadema']; ?>"><button
                                id="btn3 first" type="button" class="btn first">Borrar <i
                                    class="bi bi-trash"></i></button></a>
                        <a
                            href="ctrlPDFdia.php?accion=ticket&id_ticket_diadema=<?php echo $datosTicketDiadema['id_ticket_diadema']; ?>"><button
                                id="btn3 first" type="button" class="btn first" >Resguardo <i
                                 class="bi bi-file-earmark-pdf"></i></button></a>
                    </div>
                </td>
            </tr>
            <?php
                endforeach;
            ?>
        </tbody>
    </table>
    <a href="ctrlTicketDiadema.php?accion=new" class="btn3 first3" style="float: right;"> Añadir nueva Diadema</a>
</section>