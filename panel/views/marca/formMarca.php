<div class="contenedor">
    <!-- <img src="../../../Imagenes/Fondo2.jpg" alt="ImagenesF" /> -->
    <div class="centradoUsuario">
        <div class="row">
            <div class="col">
                <!-- multistep form -->
                <form method="POST"
                    action="ctrlMarca.php?accion=<?php echo(isset($id_marca))? "update&id_marca=".$id_marca: "add"; ?>"
                    enctype="multipart/form-data" id="msform">
                    <!-- fieldsets -->
                    <fieldset id="fieldset">
                        <h2 class="fs-title">
                            <?php echo(isset($id_marca))? "Modifica a tu ": " Introduce tu nevo ";?>Marca</h2>
                        <br />
                        <div class="col-auto">
                            <label class="sr-only" for="inlineFormInputGroup">Marca</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="bi bi-journal-plus"></i></div>
                                </div>
                                <input type="text" name="nombre_marca"
                                    value="<?php echo(isset($id_marca)) ? $datosMarca['nombre_marca']:"";?>"
                                    class="form-control" id="inlineFormInputGroup" placeholder="nombre_marca" />
                            </div>
                            <div class="marca">
                                <label for="marca"></label>
                                <select class="custom-select" id="validatedInputGroupSelect" name="id_modelo" required>
                                    <option selected>Modelo</option>
                                    <?php foreach ($datosModelo as $key => $value): 
                                    $selected = "";
                                    if($value['modelo'] == $datosMarca['tipo_modelo']):
                                      $selected = "selected";
                                    endif;
                                  ?>
                                    <option value="<?php echo $value['tipo_modelo'];?>" <?php echo $selected; ?>>
                                        <?php echo $value['tipo_modelo']?>
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