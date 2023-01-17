<section class="page-content">
    <form class="form" style="text-align:center" method="POST"
        action="ctrlTelefono.php?accion=<?php echo(isset($imei))? "update&imei=".$imei: "add"; ?>"
        enctype="multipart/form-data" id="msform">
        <h2 class="fs-title">
            <?php echo(isset($imei))? "Modifica a tu ": " Introduce tu nevo ";?>Telefono</h2>
        <br />
        <div class="row">
            <div class="col">
                <div class="input-group mb-2">
                    <p type="Telefono"><input style="width:300px" type="text" name="imei"
                            value="<?php echo(isset($imei)) ? $datosTelefono['imei']:"";?>" class="form-control"
                            id="inlineFormInputGroup" placeholder="imei" />
                    </p>
                    <p type="Linea">
                        <input style="width:300px" type="text" name="linea"
                            value="<?php echo(isset($imei)) ? $datosTelefono['linea']:"";?>" class="form-control"
                            id="inlineFormInputGroup" placeholder="linea" />
                    </p>
                    <p type="Accesorios">
                        <input style="width:300px" type="text" name="accesosrios"
                            value="<?php echo(isset($imei)) ? $datosTelefono['accesosrios']:"";?>" class="form-control"
                            id="inlineFormInputGroup" placeholder="accesosrios" />
                    </p>
                    <p type="Marca">
                        <select style="width:300px" class="custom-select" id="validatedInputGroupSelect" name="id_marca"
                            required>
                            <option selected>Marca</option>
                            <?php foreach ($datosMarca as $key => $value): 
                                    $selected = "";
                                    if($value['nombre_marca'] == $datosTelefono['marca']):
                                      $selected = "selected";
                                    endif;
                                  ?>
                            <option value="<?php echo $value['id_marca'];?>" <?php echo $selected; ?>>
                                <?php echo $value['nombre_marca']?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </p>
                    <p type="ICCID">
                        <select style="width:300px" class="custom-select" id="validatedInputGroupSelect" name="iccid"
                            required>
                            <option selected>ICCID</option>
                            <?php foreach ($datosSim as $key => $value): 
                                    $selected = "";
                                    if($value['iccid'] == $datosTelefono['iccid']):
                                      $selected = "selected";
                                    endif;
                                  ?>
                            <option value="<?php echo $value['iccid'];?>" <?php echo $selected; ?>>
                                <?php echo $value['iccid']?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </P>
                    <p type="Plan de datos">
                        <select style="width:300px" class="custom-select" id="validatedInputGroupSelect" name="id_plan"
                            required>
                            <option selected>Plan</option>
                            <?php foreach ($datosPlan as $key => $value): 
                                    $selected = "";
                                    if($value['nombre'] == $datosTelefono['plan']):
                                      $selected = "selected";
                                    endif;
                                  ?>
                            <option value="<?php echo $value['id_plan'];?>" <?php echo $selected; ?>>
                                <?php echo $value['nombre']?>
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