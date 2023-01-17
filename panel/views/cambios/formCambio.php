<section class="page-content">
    <form class="form" method="POST" style="text-align:center" ;
        action="ctrlCambio.php?accion=<?php echo(isset($id_cambio))? "update&id_cambio=".$id_cambio: "add"; ?>"
        enctype="multipart/form-data" id="msform">
        <h2 style="text-align:center;">
            <?php echo(isset($id_cambio))? "Modifica a tu ": " Introduce tu nevo ";?>Cambio</h2>
        <br />
        <div class="col-auto">
            <div class="input-group mb-2">
                <p type="Cambio:"><input style="width:300px" ; type="text" name="descripcion"
                        value="<?php echo(isset($id_cambio)) ? $datosCambio['descripcion']:"";?>" class="form-control"
                        id="inlineFormInputGroup" placeholder="Cambio" /></p>
            </div>
        </div>
        <br />
        <br />
        <input class="btn btn-primary" type="submit" value="Guardar" />
    </form>
</section>