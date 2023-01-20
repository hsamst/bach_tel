<section class="page-content">
    <form class="form" method="POST" style="text-align:center" ;
        action="ctrlEmpleado.php?accion=<?php echo(isset($no_empleado))? "update&no_empleado=".$no_empleado: "add"; ?>"
        enctype="multipart/form-data" id="msform">
        <h2 class="text-align:center;">
            <?php echo(isset($no_empleado))? "Modifica a tu ": " Introduce tu nevo ";?>Empleado</h2>
        <br />
        <div class="col-auto">
            <div class="input-group mb-2">
                <p type="No. Empleado:">
                    <input type="text" name="no_empleado"
                        value="<?php echo(isset($no_empleado)) ? $datosEmpleado['no_empleado']:"";?>"
                        class="form-control" id="inlineFormInputGroup" placeholder="No. empleado" />
                <p type="Empleado:">
                    <input type="text" name="nombre_completo"
                        value="<?php echo(isset($no_empleado)) ? $datosEmpleado['nombre_completo']:"";?>"
                        class="form-control" id="inlineFormInputGroup" placeholder="Nombre" />
                        
                <p type="Puesto">
                    <select style="width:300px" class="custom-select" id="validatedInputGroupSelect" name="id_puesto"
                        required>
                        <option selected>Puesto</option>
                        <?php foreach ($datosPuestos as $key => $value): 
                                    $selected = "";
                                    if($value['nombre'] == $datosEmpleado['puesto']):
                                      $selected = "selected";
                                    endif;
                                  ?>
                        <option value="<?php echo $value['id_puesto'];?>" <?php echo $selected; ?>>
                            <?php echo $value['nombre']?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </p>

                <p type="Un">
                    <select style="width:300px" class="custom-select" id="validatedInputGroupSelect" name="id_un"
                        required>
                        <option selected>Un</option>
                        <?php foreach ($datosUNs as $key => $value): 
                                    $selected = "";
                                    if($value['nombre'] == $datosEmpleado['Un']):
                                      $selected = "selected";
                                    endif;
                                  ?>
                        <option value="<?php echo $value['id_un'];?>" <?php echo $selected; ?>>
                            <?php echo $value['nombre']?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </p>
            </div>
        </div>
        <br />
        <br />
        <input class="btn btn-primary" type="submit" value="Guardar" />

    </form>
</section>