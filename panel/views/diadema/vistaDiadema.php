<h1> ¡Cambio! </h1>
<a href="ctrlDiadema.php?accion=new" class="btn btn-primary" style="margin:30px"> Añadir nueva Diadema</a>

<table class="table" style=" background-color: rgba(0, 0, 0, 0.3); color: white" >
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Marca</th>
            <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($datosDiademas as $key => $datosDiadema):
            ?>
            <tr>
            <td><?php echo $datosDiadema['id_diadema'] ?></td>
            <td><?php echo $datosDiadema['descripcion'] ?></td>
            <td><?php echo $datosDiadema['marca'] ?></td>

                <td>  
                    <div>
                    <i class="btn btn-success bi-pencil"><a href="ctrlDiadema.php?accion=modify&id_diadema=<?php echo $datosDiadema['id_diadema']; ?>">Modificar</a></i>
                    <i class="btn btn-danger bi bi-trash"><a href="ctrlDiadema.php?accion=delete&id_diadema=<?php echo $datosDiadema['id_diadema']; ?>">Eliminar</a></i>
                </div>
                </td>
            </tr>
            <?php
                endforeach;
            ?>
        </tbody> 
                </table>