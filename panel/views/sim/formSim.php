<div class="contenedor">
    <!-- <img src="../../../Imagenes/Fondo2.jpg" alt="ImagenesF" /> -->
    <div class="centradoSim">
        <div class="row">
            <div class="col">
                <!-- multistep form -->
                <form method="POST"
                    action="ctrlSim.php?accion=<?php echo(isset($iccid))? "update&iccid=".$iccid: "add"; ?>"
                    enctype="multipart/form-data" id="msform">
                    <!-- fieldsets -->
                    <fieldset id="fieldset">
                        <h2 class="fs-title">
                            <?php echo(isset($iccid))? "Modifica a tu ": " Introduce tu nevo ";?>Sim</h2>
                        <br />
                        <div class="col-auto">
                            <label class="sr-only" for="inlineFormInputGroup">SIM</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="bi bi-journal-plus"></i></div>
                                </div>
                                <input type="text" name="iccid"
                                    value="<?php echo(isset($iccid)) ? $datosSim['iccid']:"";?>"
                                    class="form-control" id="inlineFormInputGroup" placeholder="iccid"
                                />
                                <input type="text" name="region"
                                    value="<?php echo(isset($iccid)) ? $datosSim['region']:"";?>"
                                    class="form-control" id="inlineFormInputGroup" placeholder="region"
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