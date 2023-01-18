<section class="page-content">
                <form class="form" method="POST" style="text-align:center" ;
                    action="ctrlPuesto.php?accion=<?php echo(isset($id_puesto))? "update&id_puesto=".$id_puesto: "add"; ?>"
                    enctype="multipart/form-data" id="msform">
                        <h2 class="text-align:center;">
                            <?php echo(isset($id_puesto))? "Modifica a tu ": " Introduce tu nevo ";?>Puesto</h2>
                        <br />
                        <div class="col-auto">
                            <div class="input-group mb-2">
                                <p type="Puesto:">
                                <input type="text" name="nombre"
                                    value="<?php echo(isset($id_puesto)) ? $datosPuesto['nombre']:"";?>"
                                    class="form-control" id="inlineFormInputGroup" placeholder="Puesto"/>
                                <p type="Descripcion:">
                                <input type="text" name="descripcion"
                                    value="<?php echo(isset($id_puesto)) ? $datosPuesto['descripcion']:"";?>"
                                    class="form-control" id="inlineFormInputGroup" placeholder="Descripcion"
                                />
                            </div>
                        </div>
                        <br />
                        <br />
                        <input class="btn btn-primary" type="submit" value="Guardar" />
                  
                </form>
</section>