<<section class="page-content" style="text-align:center;">
    <div class="text">¡Sim!</div>
<table>
    <thead>
            <tr>
            <td scope="col">#</td>
            <td scope="col">Region</td>
            <td scope="col">Opciones</td>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($datosSims as $key => $datosSim):
            ?>

            <tr>
            <td><?php echo $datosSim['iccid'] ?></td>
            <td><?php echo $datosSim['region'] ?></td>

                <td>  
                    <div>
                    <a href="ctrlSim.php?accion=modify&iccid=<?php echo $datosSim['iccid']; ?>"><button
                                id="btn2 first2" type="button" class="btn2 first2">Editar <i class="bi bi-pencil"></i></button></a>
                    <a href="ctrlSim.php?accion=delete&iccid=<?php echo $datosSim['iccid']; ?>"><button
                                id="btn3 first" type="button" class="btn first">Borrar <i class="bi bi-trash"></i></button></a>
                </div>
                </td>

            </tr>

            <?php
                endforeach;
            ?>

        </tbody> 
                </table>
                <a href="ctrlSim.php?accion=new" class="btn3 first3" style="float: right;"> Añadir nuevo Sim</a>
</section>