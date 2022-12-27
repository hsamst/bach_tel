<h1> ¡Plan de datos! </h1>
<a href="ctrlPlan.php?accion=new" class="btn btn-primary" style="margin:30px"> Añadir nuevo Plan de datos</a>

<table class="table" style=" background-color: rgba(0, 0, 0, 0.3); color: white" >
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Opciones</th>
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
                    <i class="btn btn-success bi-pencil"><a href="ctrlPlan.php?accion=modify&id_plan=<?php echo $datosPlan['id_plan']; ?>">Modificar</a></i>
                    <i class="btn btn-danger bi bi-trash"><a href="ctrlPlan.php?accion=delete&id_plan=<?php echo $datosPlan['id_plan']; ?>">Eliminar</a></i>
                </div>
                </td>

            </tr>

            <?php
                endforeach;
            ?>

        </tbody> 
                </table>