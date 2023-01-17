<div class="contenedor">
    <!-- <img src="../../../Imagenes/Fondo2.jpg" alt="ImagenesF" /> -->
    <div class="centradoUsuario">
        <div class="row">
            <div class="col">
                <!-- multistep form -->
                <form method="POST"
                    action="ctrlDiadema.php?accion=<?php echo(isset($id_diadema))? "update&id_diadema=".$id_diadema: "add"; ?>"
                    enctype="multipart/form-data" id="msform">
                    <!-- fieldsets -->
                    <fieldset id="fieldset">
                        <h2 class="fs-title">
                            <?php echo(isset($id_diadema))? "Modifica a tu ": " Introduce tu nevo ";?>Diadema</h2>
                        <br />
                        <div class="col-auto">
                            <label class="sr-only" for="inlineFormInputGroup">Diadema</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="bi bi-journal-plus"></i></div>
                                    </div>
                                <input type="text" name="id_diadema"
                                    value="<?php echo(isset($id_diadema)) ? $datosDiadema['id_diadema']:"";?>"
                                    class="form-control" id="inlineFormInputGroup" placeholder="id_diadema" />
                            </div>
                                </div>
                                <input type="text" name="descripcion"
                                    value="<?php echo(isset($id_diadema)) ? $datosDiadema['descripcion']:"";?>"
                                    class="form-control" id="inlineFormInputGroup" placeholder="descripcion" />
                            </div>
                            <div class="Diadema">
                                <label for="Diadema"></label>
                                <select class="custom-select" id="validatedInputGroupSelect" name="id_marca" required>
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