<section class="page-content" style="text-align:center;">
    <h1> ¡Telefono! </h1>
    <a href="ctrlTelefono.php?accion=new" class="btn3 first3" style="float: right;"> Añadir nuevo Telefono</a>
    <a href="./excelTelefono.php" class="btn3 first3" style="float: right;"> Descarga en excel</a>

    <table>
        <thead>
            <tr>
                <td scope="col">imei</td>
                <td scope="col">Linea</td>
                <td scope="col">Accesorios</td>
                <td scope="col">Marca</td>
                <td scope="col">ICCID</td>
                <td scope="col">Plan</td>
                <td scope="col">Opciones</td>
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
                        <a href="ctrlTelefono.php?accion=modify&imei=<?php echo $datosTelefono['imei']; ?>"><button
                                id="btn2 first2" type="button" class="btn2 first2">Editar <i
                                    class="bi bi-pencil"></i></button></a>
                        <a href="ctrlTelefono.php?accion=delete&imei=<?php echo $datosTelefono['imei']; ?>"><button
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
    </section>