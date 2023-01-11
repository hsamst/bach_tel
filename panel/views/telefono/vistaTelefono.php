<h1> ¡Cambio! </h1>
<a href="ctrlTelefono.php?accion=new" class="btn btn-primary" style="margin:30px"> Añadir nuevo Telefono</a>

<table class="table" style=" background-color: rgba(0, 0, 0, 0.3); color: white" >
        <thead>
            <tr>
            <th scope="col">imei</th>
            <th scope="col">Linea</th>
            <th scope="col">Accesorios</th>
            <th scope="col">Marca</th>
            <th scope="col">ICCID</th>
            <th scope="col">Plan</th>
            <th scope="col">Opciones</th>
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
                <td>  
                    <div>
                    <i class="btn btn-success bi-pencil"><a href="ctrlTelefono.php?accion=modify&imei=<?php echo $datosTelefono['imei']; ?>">Modificar</a></i>
                    <i class="btn btn-danger bi bi-trash"><a href="ctrlTelefono.php?accion=delete&imei=<?php echo $datosTelefono['imei']; ?>">Eliminar</a></i>
                </div>
                </td>
            </tr>
            <?php
                endforeach;
            ?>
        </tbody> 
                </table>