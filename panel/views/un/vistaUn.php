<h1> ¡Unidad de Negocio! </h1>
<a href="ctrlUn.php?accion=new" class="btn btn-primary" style="margin:30px"> Añadir nueva Unidad de Negocio</a>

<table class="table" style=" background-color: rgba(0, 0, 0, 0.3); color: white" >
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>

            <?php
                foreach ($datosUns as $key => $datosUn):
            ?>

            <tr>
            <td><?php echo $datosUn['id_un'] ?></td>
            <td><?php echo $datosUn['nombre'] ?></td>

                <td>  
                    <div>
                    <i class="btn btn-success bi-pencil"><a href="ctrlUn.php?accion=modify&id_un=<?php echo $datosUn['id_un']; ?>">Modificar</a></i>
                    <i class="btn btn-danger bi bi-trash"><a href="ctrlUn.php?accion=delete&id_un=<?php echo $datosUn['id_un']; ?>">Eliminar</a></i>
                </div>
                </td>

            </tr>

            <?php
                endforeach;
            ?>

        </tbody> 
                </table>