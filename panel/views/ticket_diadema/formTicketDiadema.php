<section class="page-content">
    <form class="form" style="text-align:center" method="POST"
        action="ctrlTicketDiadema.php?accion=<?php echo(isset($id_ticket_diadema))? "update&id_ticket_diadema=".$id_ticket_diadema: "add"; ?>"
        enctype="multipart/form-data" id="msform">
        <h2 class="fs-title">
            <?php echo(isset($id_ticket_diadema))? "Modifica a tu ": " Introduce tu nevo ";?>Diadema</h2>
        <br />
        <div class="row">
            <div class="col">
                <div class="input-group mb-2">
                    <p type="Descripcion">
                        <input style="width:300px" type="text" name="descripcion"
                            value="<?php echo(isset($id_ticket_diadema)) ? $datosTicketDiadema['descripcion']:"";?>" class="form-control"
                            id="inlineFormInputGroup" placeholder="descripcion" />
                    </p>
                    <p type="Empleado">
                        <select style="width:300px" class="custom-select" id="validatedInputGroupSelect" name="no_empleado"
                            required>
                            <option selected>Empleado</option>
                            <?php foreach ($datosEmpleado as $key => $value): 
                                    $selected = "";
                                    if($value['nombre_completo'] == $datosTicketDiadema['empleado']):
                                      $selected = "selected";
                                    endif;
                                  ?>
                            <option value="<?php echo $value['no_empleado'];?>" <?php echo $selected; ?>>
                                <?php echo $value['nombre_completo']?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </p>
                    <p type="Cambio">
                        <select style="width:300px" class="custom-select" id="validatedInputGroupSelect" name="id_cambio"
                            required>
                            <option selected>Cambio</option>
                            <?php foreach ($datosCambios as $key => $value): 
                                    $selected = "";
                                    if($value['descripcion'] == $datosTicketDiadema['cambio']):
                                      $selected = "selected";
                                    endif;
                                  ?>
                            <option value="<?php echo $value['id_cambio'];?>" <?php echo $selected; ?>>
                                <?php echo $value['descripcion']?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </p>
                    <p type="Diadema">
                        <select style="width:300px" class="custom-select" id="validatedInputGroupSelect" name="id_diadema"
                            required>
                            <option selected>diadema</option>
                            <?php foreach ($datosDiademas as $key => $value): 
                                    $selected = "";
                                    if($value['id_diadema'] == $datosTicketDiadema['id_diadema']):
                                      $selected = "selected";
                                    endif;
                                  ?>
                            <option value="<?php echo $value['id_diadema'];?>" <?php echo $selected; ?>>
                                <?php echo $value['id_diadema']?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </P>
                </div>
            </div>
        </div>
        <br />
        <br />
        <input class="btn3 first3" type="submit" value="Guardar" />
    </form>
</section>