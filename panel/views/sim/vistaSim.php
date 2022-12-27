<h1> ¡SIM! </h1>
<a href="ctrlSim.php?accion=new" class="btn btn-primary" style="margin:30px"> Añadir nuevo SIM</a>

<table class="table" style=" background-color: rgba(0, 0, 0, 0.3); color: white" >
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Region</th>
            <th scope="col">Opciones</th>
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
                    <i class="btn btn-success bi-pencil"><a href="ctrlSim.php?accion=modify&iccid=<?php echo $datosSim['iccid']; ?>">Modificar</a></i>
                    <i class="btn btn-danger bi bi-trash"><a href="ctrlSim.php?accion=delete&iccid=<?php echo $datosSim['iccid']; ?>">Eliminar</a></i>
                </div>
                </td>

            </tr>

            <?php
                endforeach;
            ?>

        </tbody> 
                </table>