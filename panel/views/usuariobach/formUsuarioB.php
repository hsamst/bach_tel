<div class="contenedor">
    <!-- <img src="../../../Imagenes/Fondo2.jpg" alt="ImagenesF" /> -->
    <div class="centradoUsuario">
        <div class="row">
            <div class="col">
                <!-- multistep form -->
                <form method="POST"
                    action="ctrlUsuarioB.php?accion=<?php echo(isset($id_usuario_bach))? "update&id_usuario_bach=".$id_usuario_bach: "add"; ?>"
                    enctype="multipart/form-data" id="msform">
                    <!-- fieldsets -->
                    <fieldset id="fieldset">
                        <h2 class="fs-title">
                            <?php echo(isset($id_usuario_bach))? "Modifica a tu ": " Introduce tu nevo ";?>Usuario Bach</h2>
                        <br />
                        <div class="col-auto">
                            <label class="sr-only" for="inlineFormInputGroup">Usuario Bach</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="bi bi-journal-plus"></i></div>
                                </div>
                                <input type="text" name="corrreo"
                                    value="<?php echo(isset($id_usuario_bach)) ? $datosUsuarioB['corrreo']:"";?>"
                                    class="form-control" id="inlineFormInputGroup" placeholder="corrreo"
                                />
                                <input type="text" name="contrasena"
                                    value="<?php echo(isset($id_usuario_bach)) ? $datosUsuarioB['contrasena']:"";?>"
                                    class="form-control" id="inlineFormInputGroup" placeholder="contrasena"
                                />
                                <input type="text" name="tocken"
                                    value="<?php echo(isset($id_usuario_bach)) ? $datosUsuarioB['tocken']:"";?>"
                                    class="form-control" id="inlineFormInputGroup" placeholder="tocken"
                                />
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