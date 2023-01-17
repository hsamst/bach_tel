<section class="page-content">
    <form class="form" style="text-align:center" method="POST"
        action="ctrlMarca.php?accion=<?php echo(isset($id_marca))? "update&id_marca=".$id_marca: "add"; ?>"
        enctype="multipart/form-data" id="msform">
        <h2 class="fs-title">
            <?php echo(isset($id_marca))? "Modifica a tu ": " Introduce tu nevo ";?>Marca</h2>
        <br />
        <div class="row">
            <div class="col">

                <div class="input-group mb-2">
                    <p type="Marca"><input style="width:300px" type="text" name="nombre_marca"
                        value="<?php echo(isset($id_marca)) ? $datosMarca['nombre_marca']:"";?>" class="form-control"
                        id="inlineFormInputGroup" placeholder="nombre_marca" />
</p>
                    <p type="Modelo">
                    <select style="width:300px" class="custom-select" id="validatedInputGroupSelect" name="id_modelo"
                        required>
                        <option selected>Modelo</option>
                        <?php foreach ($datosModelo as $key => $value): 
                                    $selected = "";
                                    if($value['tipo_modelo'] == $datosMarca['tipo_modelo']):
                                      $selected = "selected";
                                    endif;
                                  ?>
                        <option value="<?php echo $value['id_modelo'];?>" <?php echo $selected; ?>>
                            <?php echo $value['tipo_modelo']?>
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