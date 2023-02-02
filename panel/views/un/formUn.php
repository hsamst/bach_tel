<section class="page-content">
                <form class="form" method="POST" style="text-align:center" ;
                    action="ctrlUn.php?accion=<?php echo(isset($id_un))? "update&id_un=".$id_un: "add"; ?>"
                    enctype="multipart/form-data" id="msform">
                        <h2 style="text-align:center;"
                            <?php echo(isset($id_un))? "Modifica a tu ": " Introduce tu nevo ";?>Unidad de negocio</h2>
                        <br />
                        <div class="col-auto">
                            <div class="input-group mb-2">
                            <p type="Unidad de negocio:">
                                <input style="width:300px" type="text" name="nombre"
                                    value="<?php echo(isset($id_un)) ? $datosUn['nombre']:"";?>"
                                    class="form-control" id="inlineFormInputGroup" placeholder="un"/>
                            </div>
                        </div>
                        <br />
                        <br />
                        <input class="btn3 first3" type="submit" value="Guardar" />
                </form>
</section>