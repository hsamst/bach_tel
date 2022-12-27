<div class="contenedor">
    <!-- <img src="../../../Imagenes/Fondo2.jpg" alt="ImagenesF" /> -->
    <div class="centradoUsuario">
        <div class="row">
            <div class="col">
                <!-- multistep form -->
                <form method="POST"
                    action="ctrlRol.php?accion=<?php echo(isset($id_rol))? "update&id_rol=".$id_rol: "add"; ?>"
                    enctype="multipart/form-data" id="msform">
                    <!-- fieldsets -->
                    <fieldset id="fieldset">
                        <h2 class="fs-title">
                            <?php echo(isset($id_rol))? "Modifica a tu ": " Introduce tu nevo ";?>rol</h2>
                        <br />
                        <div class="col-auto">
                            <label class="sr-only" for="inlineFormInputGroup">Rol</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="bi bi-journal-plus"></i></div>
                                </div>
                                <input type="text" name="nombre"
                                    value="<?php echo(isset($id_rol)) ? $datosRol['nombre']:"";?>"
                                    class="form-control" id="inlineFormInputGroup" placeholder="Rol"
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