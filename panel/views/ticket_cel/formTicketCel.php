<section class="page-content">
    <form class="form" style="text-align:center" method="POST"
        action="ctrlTicketCel.php?accion=<?php echo(isset($id_ticket_cel))? "update&id_ticket_cel=".$id_ticket_cel: "add"; ?>"
        enctype="multipart/form-data" id="msform">
        <h2 class="fs-title">
            <?php echo(isset($id_ticket_cel))? "Modifica a tu ": " Introduce nuevo ";?>Ticket</h2>
        <br />
        <div class="row">
            <div class="col">
                <div class="input-group mb-2">
                    <p type="Descripcion">
                        <input style="width:300px" type="text" name="descripcion"
                            value="<?php echo(isset($id_ticket_cel)) ? $datosTicketCel['descripcion']:"";?>" class="form-control"
                            id="inlineFormInputGroup" placeholder="descripcion" />
                    </p>
                    <p type="Empleado">
                        <select style="width:300px" class="custom-select" id="validatedInputGroupSelect" name="no_empleado"
                            required>
                            <option selected>Empleado</option>
                            <?php foreach ($datosEmpleado as $key => $value): 
                                    $selected = "";
                                    if($value['nombre_completo'] == $datosTicketCel['empleado']):
                                      $selected = "selected";
                                    endif;
                                  ?>
                            <option value="<?php echo $value['no_empleado'];?>" <?php echo $selected; ?>>
                                <?php echo $value['nombre_completo']?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </p>
                    <p type="IMEI">
                        <select style="width:300px" class="custom-select" id="validatedInputGroupSelect" name="imei"
                            required>
                            <option selected>ICCID</option>
                            <?php foreach ($datosTelefonos as $key => $value): 
                                    $selected = "";
                                    if($value['imei'] == $datosTicketCel['imei']):
                                      $selected = "selected";
                                    endif;
                                  ?>
                            <option value="<?php echo $value['imei'];?>" <?php echo $selected; ?>>
                                <?php echo $value['imei']?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </P>
                    <p type="Cambio">
                        <select style="width:300px" class="custom-select" id="validatedInputGroupSelect" name="id_cambio"
                            required>
                            <option selected>Cambio</option>
                            <?php foreach ($datosCambios as $key => $value): 
                                    $selected = "";
                                    if($value['descripcion'] == $datosTicketCel['cambio']):
                                      $selected = "selected";
                                    endif;
                                  ?>
                            <option value="<?php echo $value['id_cambio'];?>" <?php echo $selected; ?>>
                                <?php echo $value['descripcion']?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </p>
                </div>
            </div>
        </div>
        <br />
        <br />
        <input  class="btn3 first3" type="submit" value="Guardar" />

    </form>
</section>