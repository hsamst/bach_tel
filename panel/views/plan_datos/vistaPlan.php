<section class="page-content" style="text-align:center;">
    <div class="text">¡Plan de datos!</div>
    <table>
        <thead>
            <tr>
                <td>#</td>
                <td>Nombre</td>
                <td>Descripcion</td>
                <td>Opciones</td>
            </tr>
        </thead>
        <tbody>

            <?php
                foreach ($datosPlans as $key => $datosPlan):
            ?>

            <tr>
                <td><?php echo $datosPlan['id_plan'] ?></td>
                <td><?php echo $datosPlan['nombre'] ?></td>
                <td><?php echo $datosPlan['descripcion'] ?></td>

                <td>
                    <div>
                        <a href="ctrlPlan.php?accion=modify&id_plan=<?php echo $datosPlan['id_plan']; ?>"><button
                                id="btn2 first2" type="button" class="btn2 first2">Editar <i
                                    class="bi bi-pencil"></i></button></a>
                        <a href="ctrlPlan.php?accion=delete&id_plan=<?php echo $datosPlan['id_plan']; ?>"><button
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
    <a href="ctrlPlan.php?accion=new" class="btn3 first3" style="float: right;"> Añadir nuevo Plan</a>
</section>