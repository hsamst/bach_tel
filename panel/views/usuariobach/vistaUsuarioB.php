<h1> ¡Usuario Bach! </h1>
<a href="ctrlUsuarioB.php?accion=new" class="btn btn-primary" style="margin:30px"> Añadir nuevo usuarioBach</a>

<table class="table" style=" background-color: rgba(0, 0, 0, 0.3); color: white" >
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Correo</th>
            <th scope="col">Contrasena</th>
            <th scope="col">Tocken</th>
            <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>

            <?php
                foreach ($datosUsuarioBs as $key => $datosUsuarioB):
            ?>

            <tr>
            <td><?php echo $datosUsuarioB['id_usuario_bach'] ?></td>
            <td><?php echo $datosUsuarioB['corrreo'] ?></td>
            <td><?php echo $datosUsuarioB['contrasena'] ?></td>
            <td><?php echo $datosUsuarioB['tocken'] ?></td>

                <td>  
                    <div>
                    <i class="btn btn-success bi-pencil"><a href="ctrlUsuarioB.php?accion=modify&id_usuario_bach=<?php echo $datosUsuarioB['id_usuario_bach']; ?>">Modificar</a></i>
                    <i class="btn btn-danger bi bi-trash"><a href="ctrlUsuarioB.php?accion=delete&id_usuario_bach=<?php echo $datosUsuarioB['id_usuario_bach']; ?>">Eliminar</a></i>
                </div>
                </td>
            </tr>
            <?php
                endforeach;
            ?>
        </tbody> 
</table>