<h1> ¡Cambio! </h1>
<a href="ctrlMarca.php?accion=new" class="btn btn-primary" style="margin:30px"> Añadir nuevo Marca</a>

<table class="table" style=" background-color: rgba(0, 0, 0, 0.3); color: white" >
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Modelo</th>
            <th scope="col">Opciones</th>
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
                    <i class="btn btn-success bi-pencil"><a href="ctrlMarca.php?accion=modify&id_marca=<?php echo $datosMarca['id_marca']; ?>">Modificar</a></i>
                    <i class="btn btn-danger bi bi-trash"><a href="ctrlMarca.php?accion=delete&id_marca=<?php echo $datosMarca['id_marca']; ?>">Eliminar</a></i>
                </div>
                </td>

            </tr>

            <?php
                endforeach;
            ?>

        </tbody> 
                </table>