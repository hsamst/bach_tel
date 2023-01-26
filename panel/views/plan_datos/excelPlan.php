<?php
require_once('mdlPlan.php');
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename=plan.xls");
    $datosPlans = $plan->read();
?>
<table>
<thead>
            <tr>
                <td>#</td>
                <td>Nombre</td>
                <td>Descripcion</td>
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

                </tr>

            <?php
                endforeach;
            ?>

        </tbody>
                </table>