<section class="page-content">
        <br />
        <h1> ¡Altas de Usuarios priviligiados! </h1>
        <table id="containerTablas" class="display" style="text-align:center;">
            <thead>
                <tr>
                    <th scope="col" style="text-align:center;">Usario Privilegiado</th>
                    <th scope="col" style="text-align:center;">Rol</th>
                    <th scope="col" style="text-align:center;">Password</th>
                    <th scope="col" style="text-align:center;">Opciones</th>
                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($datosUSROLs as $key => $datosUSROL):
            ?>

                <tr>
                    <td><?php echo $datosUSROL['correo'] ?></td>
                    <td><?php echo $datosUSROL['rol'] ?></td>
                    <td><?php echo $datosUSROL['pass'] ?></td>

                    <td>
                        <div>
                            <a
                                href="crtlAlta.php?accion=modify&id_usuariopri=<?php echo $datosUSROL['id_usuariopri']; ?>&id_rol=<?php echo $datosUSROL['id_rol']; ?>"><button
                                    id="table_button" type="button" class="btn btn-success bi-pencil">
                                    Modificar</button></a>
                            <a
                                href="crtlAlta.php?accion=delete&id_usuariopri=<?php echo $datosUSROL['id_usuariopri']; ?>&id_rol=<?php echo $datosUSROL['id_rol']; ?>"><button
                                    id="table_button" type="button" class="btn btn-danger bi bi-trash">
                                    Eliminar</button></a>
                        </div>
                    </td>

                </tr>

                <?php
                endforeach;
            ?>

            </tbody>
        </table>
        <br />
        <a id="table_button" href="crtlAlta.php?accion=new" class="btn btn-primary" style="margin:30px; float: right;">
            Añadir nuevo Usuario</a>
            </section>