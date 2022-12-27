<div class="contenedor">
    <!-- <img src="../../../Imagenes/Fondo2.jpg" alt="ImagenesF" /> -->
    <div class="centradoUsuario">
        <div class="row">
            <div class="col">
                <!-- multistep form -->
                <form method="POST"
                    action="ctrlPlan.php?accion=<?php echo(isset($id_plan))? "update&id_plan=".$id_plan: "add"; ?>"
                    enctype="multipart/form-data" id="msform">
                    <!-- fieldsets -->
                    <fieldset id="fieldset">
                        <h2 class="fs-title">
                            <?php echo(isset($id_plan))? "Modifica a tu ": " Introduce tu nevo ";?>Plan de datos</h2>
                        <br />
                        <div class="col-auto">
                            <label class="sr-only" for="inlineFormInputGroup">Plan de datos</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="bi bi-journal-plus"></i></div>
                                </div>
                                <input type="text" name="nombre"
                                    value="<?php echo(isset($id_plan)) ? $datosPlan['nombre']:"";?>"
                                    class="form-control" id="inlineFormInputGroup" placeholder="nombre"
                                />
                                <input type="text" name="descripcion"
                                    value="<?php echo(isset($id_plan)) ? $datosPlan['descripcion']:"";?>"
                                    class="form-control" id="inlineFormInputGroup" placeholder="descripcion"
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