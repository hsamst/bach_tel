<h1> ¡Rol! </h1>
<a href="ctrlRol.php?accion=new" class="btn btn-primary" style="margin:30px"> Añadir nuevo rol</a>

<table class="table" style=" background-color: rgba(0, 0, 0, 0.3); color: white" >
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Rol</th>
            <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>

            <?php
                foreach ($datosRols as $key => $datosRol):
            ?>

            <tr>
            <td><?php echo $datosRol['id_rol'] ?></td>
            <td><?php echo $datosRol['nombre'] ?></td>

                <td>  
                    <div>
                    <i class="btn btn-success bi-pencil"><a href="ctrlRol.php?accion=modify&id_rol=<?php echo $datosRol['id_rol']; ?>">Modificar</a></i>
                    <i class="btn btn-danger bi bi-trash"><a href="ctrlRol.php?accion=delete&id_rol=<?php echo $datosRol['id_rol']; ?>">Eliminar</a></i>
                </div>
                </td>

            </tr>

            <?php
                endforeach;
            ?>

        </tbody> 
                </table>