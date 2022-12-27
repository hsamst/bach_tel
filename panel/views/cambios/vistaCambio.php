<h1> ¡Cambio! </h1>
<a href="ctrlCambio.php?accion=new" class="btn btn-primary" style="margin:30px"> Añadir nuevo Cambio</a>

<table class="table" style=" background-color: rgba(0, 0, 0, 0.3); color: white" >
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>

            <?php
                foreach ($datosCambios as $key => $datosCambio):
            ?>

            <tr>
            <td><?php echo $datosCambio['id_cambio'] ?></td>
            <td><?php echo $datosCambio['descripcion'] ?></td>

                <td>  
                    <div>
                    <i class="btn btn-success bi-pencil"><a href="ctrlCambio.php?accion=modify&id_cambio=<?php echo $datosCambio['id_cambio']; ?>">Modificar</a></i>
                    <i class="btn btn-danger bi bi-trash"><a href="ctrlCambio.php?accion=delete&id_cambio=<?php echo $datosCambio['id_cambio']; ?>">Eliminar</a></i>
                </div>
                </td>

            </tr>

            <?php
                endforeach;
            ?>

        </tbody> 
                </table>