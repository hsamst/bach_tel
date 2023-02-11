<section class="page-content" style="text-align:center;">
<div class="text">Modelos</div>
<a href="ctrlModelo.php?accion=new" class="btn3 first3" style="float: right;"> Añadir nuevo Modelo</a>
<a href="./excelModelo.php" class="btn3 first3" style="float: right;"> Descarga en excel</a>

<table>
        <thead>
            <tr>
            <td scope="col">#</td>
            <td scope="col">Modelo</td>
            <td scope="col">Opciones</td>
            </tr>
        </thead>
        <tbody>

            <?php
                foreach ($datosModelos as $key => $datosModelo):
            ?>

            <tr>
            <td><?php echo $datosModelo['id_modelo'] ?></td>
            <td><?php echo $datosModelo['tipo_modelo'] ?></td>

                <td>  
                    <div>
                    <a href="ctrlModelo.php?accion=modify&id_modelo=<?php echo $datosModelo['id_modelo']; ?>"><button
                                id="btn2 first2" type="button" class="btn2 first2">Editar <i class="bi bi-pencil"></i></button></a>
                    <a href="ctrlModelo.php?accion=delete&id_modelo=<?php echo $datosModelo['id_modelo']; ?>"><button
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