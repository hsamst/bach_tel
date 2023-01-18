<section class="page-content">
    <form class="form" style="text-align:center" method="POST"
        action="ctrlCel.php?accion=<?php echo(isset($id_ticket_cel))? "update&id_ticket_cel=".$id_ticket_cel: "add"; ?>"
        enctype="multipart/form-data" id="msform">
        <h2 class="fs-title">
            <?php echo(isset($id_ticket_cel))? "Modifica a tu ": " Introduce tu nevo ";?>Telefono</h2>
        <br />
        <div class="row">
            <div class="col">
                <div class="input-group mb-2">
                    <p type="Fecha entrega"><input style="width:300px" type="text" name="fecha_entrega"
                            value="<?php echo(isset($fecha_entrega)) ? $datosCel['fecha_entrega']:"";?>" class="form-control"
                            id="inlineFormInputGroup" placeholder="fecha_entrega" />
                    </p>
                    <p type="Descripcion">
                        <input style="width:300px" type="text" name="descripcion"
                            value="<?php echo(isset($id_ticket_cel)) ? $datosCel['descripcion']:"";?>" class="form-control"
                            id="inlineFormInputGroup" placeholder="descripcion" />
                    </p>
                    <p type="Marca">
                        <select style="width:300px" class="custom-select" id="validatedInputGroupSelect" name="no_empleado"
                            required>
                            <option selected>Marca</option>
                            <?php foreach ($datosUs as $key => $value): 
                                    $selected = "";
                                    if($value['empleado'] == $datosCel['empleado']):
                                      $selected = "selected";
                                    endif;
                                  ?>
                            <option value="<?php echo $value['no_empleado'];?>" <?php echo $selected; ?>>
                                <?php echo $value['empleado']?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </p>
                    <p type="IMEI">
                        <select style="width:300px" class="custom-select" id="validatedInputGroupSelect" name="imei"
                            required>
                            <option selected>ICCID</option>
                            <?php foreach ($datosTelefono as $key => $value): 
                                    $selected = "";
                                    if($value['imei'] == $datosCel['imei']):
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
                            <?php foreach ($datosCambio as $key => $value): 
                                    $selected = "";
                                    if($value['cambio'] == $datosCel['cambio']):
                                      $selected = "selected";
                                    endif;
                                  ?>
                            <option value="<?php echo $value['id_cambio'];?>" <?php echo $selected; ?>>
                                <?php echo $value['cambio']?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </p>
                </div>
            </div>
        </div>
        <br />
        <br />
        <input class="btn btn-primary" type="submit" value="Guardar" />

    </form>
</section>