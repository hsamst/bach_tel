<?php
require_once('mdlSim.php');
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename=sim.xls");
    $datosSims = $sim->read();
?>
<table>
<thead>
            <tr>
            <td scope="col">#</td>
            <td scope="col">Region</td>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($datosSims as $key => $datosSim):
            ?>

            <tr>
            <td><?php echo $datosSim['iccid'] ?></td>
            <td><?php echo $datosSim['region'] ?></td>
            </tr>

            <?php
                endforeach;
            ?>

        </tbody> 
                </table>