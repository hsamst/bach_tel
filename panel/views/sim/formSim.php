<section class="page-content">
    <form class="form" method="POST" style="text-align:center" ;
        action="ctrlSim.php?accion=<?php echo(isset($iccid))? "update&iccid=".$iccid: "add"; ?>"
        enctype="multipart/form-data" id="msform">
        <h2 style="text-align:center;">
            <?php echo(isset($iccid))? "Modifica a tu ": " Introduce tu nevo ";?>Sim</h2>
        <br />
        <div class="col-auto">
            <div class="input-group mb-2">
                <p type="Sim:"><input style="width:300px" ; type="text" name="iccid"
                        value="<?php echo(isset($iccid)) ? $datosSim['iccid']:"";?>" class="form-control"
                        id="inlineFormInputGroup" placeholder="iccid" /></p>
                <p type="Region:"><input type="text" name="region"
                        value="<?php echo(isset($iccid)) ? $datosSim['region']:"";?>" class="form-control"
                        id="inlineFormInputGroup" placeholder="region" /></p>
            </div>
        </div>
        <br />
        <br />
        <input class="btn3 first3" type="submit" value="Guardar" />
    </form>
</section>