<section class="page-content">
    <form class="form" method="POST" style="text-align:center" ;
        action="ctrlPlan.php?accion=<?php echo(isset($id_plan))? "update&id_plan=".$id_plan: "add"; ?>"
        enctype="multipart/form-data" id="msform">
        <h2 style="text-align:center;">
            <?php echo(isset($id_plan))? "Modifica a tu ": " Introduce tu nevo ";?>Plan de datos</h2>
        <br />
        <div class="col-auto">
            <div class="input-group mb-2">
                <p type="Plan"><input style="width:300px" ; type="text" name="nombre"
                        value="<?php echo(isset($id_plan)) ? $datosPlan['nombre']:"";?>" class="form-control"
                        id="inlineFormInputGroup" placeholder="nombre" /></p>
                <p type="descripcion"><input type="text" name="descripcion"
                        value="<?php echo(isset($id_plan)) ? $datosPlan['descripcion']:"";?>" class="form-control"
                        id="inlineFormInputGroup" placeholder="descripcion" /></p>
            </div>
        </div>
        <br />
        <br />
        <input class="btn3 first3" type="submit" value="Guardar" />
    </form>
</section>