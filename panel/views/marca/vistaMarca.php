<section class="page-content" style="text-align:center;">
<h1> ¡Cambio! </h1>
<table>
        <thead>
            <tr>
            <td scope="col">#</td>
            <td scope="col">Nombre</td>
            <td scope="col">Modelo</td>
            <td scope="col">Opciones</td>
            </tr>
        </thead>
        <tbody>

            <?php
                foreach ($datosMarcas as $key => $datosMarca):
            ?>

            <tr>
            <td><?php echo $datosMarca['id_marca'] ?></td>
            <td><?php echo $datosMarca['nombre_marca'] ?></td>
            <td><?php echo $datosMarca['modelo'] ?></td>

                <td>  
                    <div>
                    <a href="ctrlMarca.php?accion=modify&id_marca=<?php echo $datosMarca['id_marca']; ?>"><button
                                id="btn2 first2" type="button" class="btn2 first2">Editar <i class="bi bi-pencil"></i></button></a>
                    <a href="ctrlMarca.php?accion=delete&id_marca=<?php echo $datosMarca['id_marca']; ?>"><button
                                id="btn3 first" type="button" class="btn first">Borrar <i class="bi bi-trash"></i></button></a>
                </div>
                </td>

            </tr>

            <?php
                endforeach;
            ?>

        </tbody> 
                </table>
                <a href="ctrlMarca.php?accion=new" class="btn3 first3" style="float: right;"> Añadir nuevo Marca</a>
            </section>