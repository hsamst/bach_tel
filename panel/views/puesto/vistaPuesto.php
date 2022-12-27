<h1> ¡Puesto! </h1>
<a href="ctrlPuesto.php?accion=new" class="btn btn-primary" style="margin:30px"> Añadir nuevo puesto</a>

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
                foreach ($datosPuestos as $key => $datosPuesto):
            ?>

            <tr>
            <td><?php echo $datosPuesto['id_puesto'] ?></td>
            <td><?php echo $datosPuesto['nombre'] ?></td>
            <td><?php echo $datosPuesto['descripcion'] ?></td>

                <td>  
                    <div>
                    <i class="btn btn-success bi-pencil"><a href="ctrlPuesto.php?accion=modify&id_puesto=<?php echo $datosPuesto['id_puesto']; ?>">Modificar</a></i>
                    <i class="btn btn-danger bi bi-trash"><a href="ctrlPuesto.php?accion=delete&id_puesto=<?php echo $datosPuesto['id_puesto']; ?>">Eliminar</a></i>
                </div>
                </td>

            </tr>

            <?php
                endforeach;
            ?>

        </tbody> 
</table>