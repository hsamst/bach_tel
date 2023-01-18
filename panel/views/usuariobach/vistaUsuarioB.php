<section class="page-content" style="text-align:center;">
    <div class="text">¡Usuario Bach!</div>
    <a href="ctrlUsuarioB.php?accion=new" class="btn3 first3" style="float: right;"> Añadir nuevo rol</a>
    <table>
        <thead>
            <tr>
                <td>#</td>
                <td>Correo</td>
                <td>Contrasena</td>
                <td>Tocken</td>
                <td>Opciones</td>
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
                        <a href="ctrlUsuarioB.php?accion=modify&id_usuario_bach=<?php echo $datosUsuarioB['id_usuario_bach']; ?>"><button
                                id="btn2 first2" type="button" class="btn2 first2">Editar <i
                                    class="bi bi-pencil"></i></button></a>
                        <a href="ctrlUsuarioB.php?accion=delete&id_usuario_bach=<?php echo $datosUsuarioB['id_usuario_bach']; ?>"><button
                                id="btn3 first" type="button" class="btn first">Borrar <i
                                    class="bi bi-trash"></i></button></a>
                    </div>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</section>