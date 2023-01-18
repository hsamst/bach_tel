<section class="page-content" style="text-align:center;">
    <div class="text">¡Rol!</div>
    <a href="ctrlRol.php?accion=new" class="btn3 first3" style="float: right;"> Añadir nuevo rol</a>
    <table>
        <thead>
            <tr>
                <td>#</td>
                <td>Rol</td>
                <td>Opciones</td>
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
                        <a href="ctrlRol.php?accion=modify&id_rol=<?php echo $datosRol['id_rol']; ?>"><button
                                id="btn2 first2" type="button" class="btn2 first2">Editar <i
                                    class="bi bi-pencil"></i></button></a>
                        <a href="ctrlRol.php?accion=delete&id_rol=<?php echo $datosRol['id_rol']; ?>"><button
                                id="btn3 first" type="button" class="btn first">Borrar <i
                                    class="bi bi-trash"></i></button></a>
                    </div>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</section>