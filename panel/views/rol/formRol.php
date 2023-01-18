<section class="page-content">
    <form class="form" method="POST" style="text-align:center" ;
        action="ctrlRol.php?accion=<?php echo(isset($id_rol))? "update&id_rol=".$id_rol: "add"; ?>"
        enctype="multipart/form-data" id="msform">
        <h2 style="text-align:center;">
            <?php echo(isset($id_rol))? "Modifica a tu ": " Introduce tu nevo ";?>rol</h2>
        <br />
        <div class="col-auto">
            <div class="input-group mb-2">
                <p type="Rol:">
                    <input style="width:300px" ; type="text" name="nombre"
                        value="<?php echo(isset($id_rol)) ? $datosRol['nombre']:"";?>" class="form-control"
                        id="inlineFormInputGroup" placeholder="Rol" />
            </div>
        </div>
        <br />
        <br />
        <input class="btn btn-primary" type="submit" value="Guardar" />
    </form>
</section>