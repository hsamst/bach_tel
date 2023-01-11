<div class="contenedor">
    <!-- <img src="../../../Imagenes/Fondo2.jpg" alt="ImagenesF" /> -->
    <div class="centradoUsuario">
        <div class="row">
            <div class="col">
                <!-- multistep form -->
                <form method="POST"
                    action="ctrlTelefono.php?accion=<?php echo(isset($imei))? "update&imei=".$imei: "add"; ?>"
                    enctype="multipart/form-data" id="msform">
                    <!-- fieldsets -->
                    <fieldset id="fieldset">
                        <h2 class="fs-title">
                            <?php echo(isset($imei))? "Modifica a tu ": " Introduce tu nevo ";?>Telefono</h2>
                        <br />
                        <div class="col-auto">
                            <label class="sr-only" for="inlineFormInputGroup">Telefono</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="bi bi-journal-plus"></i></div>
                                </div>
                                <input type="text" name="accesosrios"
                                    value="<?php echo(isset($imei)) ? $datosTelefono['imei']:"";?>"
                                    class="form-control" id="inlineFormInputGroup" placeholder="imei" />
                            </div>
                                </div>
                                <input type="text" name="linea"
                                    value="<?php echo(isset($imei)) ? $datosTelefono['linea']:"";?>"
                                    class="form-control" id="inlineFormInputGroup" placeholder="linea" />
                            </div>
                            </div>
                                <input type="text" name="accesosrios"
                                    value="<?php echo(isset($imei)) ? $datosTelefono['accesosrios']:"";?>"
                                    class="form-control" id="inlineFormInputGroup" placeholder="accesosrios" />
                            </div>
                            <div class="marca">
                                <label for="marca"></label>
                                <select class="custom-select" id="validatedInputGroupSelect" name="id_marca" required>
                                    <option selected>Marca</option>
                                    <?php foreach ($datosMarca as $key => $value): 
                                    $selected = "";
                                    if($value['marca'] == $datosTelefono['marca']):
                                      $selected = "selected";
                                    endif;
                                  ?>
                                    <option value="<?php echo $value['nombre_marca'];?>" <?php echo $selected; ?>>
                                        <?php echo $value['nombre_marca']?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="iccid">
                                <label for="iccid"></label>
                                <select class="custom-select" id="validatedInputGroupSelect" name="iccid" required>
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
                            </div>

                            <div class="plan">
                                <label for="plan"></label>
                                <select class="custom-select" id="validatedInputGroupSelect" name="id_plan" required>
                                    <option selected>Plan</option>
                                    <?php foreach ($datosPlan as $key => $value): 
                                    $selected = "";
                                    if($value['plan'] == $datosTelefono['plan']):
                                      $selected = "selected";
                                    endif;
                                  ?>
                                    <option value="<?php echo $value['nombre'];?>" <?php echo $selected; ?>>
                                        <?php echo $value['nombre']?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                        </div>
                        <br />
                        <br />
                        <input class="btn btn-primary" type="submit" value="Guardar" />
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>