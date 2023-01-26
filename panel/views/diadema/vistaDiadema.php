<section class="page-content" style="text-align:center;">
<h1> ¡Diademas! </h1>
<a href="ctrlDiadema.php?accion=new" class="btn3 first3" style="float: right;"> Añadir nuevo Diadema</a>
<a href="./excelDiadema.php" class="btn3 first3" style="float: right;"> Descarga en excel</a>

<table>
        <thead>
            <tr>
            <td scope="col">#</td>
            <td scope="col">Descripcion</td>
            <td scope="col">Marca</td>
            <td scope="col">Opciones</td>
            </tr>
        </thead>
        <tbody>

            <?php
                foreach ($datosDiademas as $key => $datosDiadema):
            ?>
            <tr>
            <td><?php echo $datosDiadema['id_diadema'] ?></td>
            <td><?php echo $datosDiadema['descripcion'] ?></td>
            <td><?php echo $datosDiadema['nombre_marca'] ?></td>

                <td>  
                    <div>
                    <a href="ctrlDiadema.php?accion=modify&id_diadema=<?php echo $datosDiadema['id_diadema']; ?>"><button
                                id="btn2 first2" type="button" class="btn2 first2">Editar <i class="bi bi-pencil"></i></button></a>
                    <a href="ctrlDiadema.php?accion=delete&id_diadema=<?php echo $datosDiadema['id_diadema']; ?>"><button
                                id="btn3 first" type="button" class="btn first">Borrar <i class="bi bi-trash"></i></button></a>
                </div>
                </td>

            </tr>

            <?php
                endforeach;
            ?>

        </tbody> 
                </table>
                </section>