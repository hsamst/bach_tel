<section class="page-content">
    <form class="form" style="text-align:center" method="POST"
        action="ctrlDiadema.php?accion=<?php echo(isset($id_diadema))? "update&id_diadema=".$id_diadema: "add"; ?>"
        enctype="multipart/form-data" id="msform">
        <h2 class="fs-title">
            <?php echo(isset($id_diadema))? "Modifica a tu ": " Introduce tu nevo ";?>Diadema</h2>
        <br />
        <div class="row">
            <div class="col">
                <div class="input-group mb-2">
                    <p type="Diadema"><input style="width:300px" type="text" name="id_diadema"
                            value="<?php echo(isset($id_diadema)) ? $datosDiadema['id_diadema']:"";?>"
                            class="form-control" id="inlineFormInputGroup" placeholder="id_diadema" /></p>
                    <p type="Diadema"><input style="width:300px" type="text" name="descripcion"
                            value="<?php echo(isset($id_diadema)) ? $datosDiadema['descripcion']:"";?>"
                            class="form-control" id="inlineFormInputGroup" placeholder="descripcion" /></p>
                    <p type="Marca">
                        <select style="width:300px" class="custom-select" id="validatedInputGroupSelect" name="id_marca"
                            required>
                            <option selected>Marca</option>
                            <?php foreach ($datosMarca as $key => $value): 
                                    $selected = "";
                                    if($value['nombre_marca'] == $datosDiadema['nombre_marca']):
                                      $selected = "selected";
                                    endif;
                                  ?>
                            <option value="<?php echo $value['id_marca'];?>" <?php echo $selected; ?>>
                                <?php echo $value['nombre_marca']?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </p>
                </div>
            </div>
        </div>
        <br />
        <br />
        <input class="btn3 first3" type="submit" value="Guardar" />
    </form>
</section>