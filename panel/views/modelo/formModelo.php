<section class="page-content">
                <form class="form" style="text-align:center" method="POST"
                    action="ctrlModelo.php?accion=<?php echo(isset($id_modelo))? "update&id_modelo=".$id_modelo: "add"; ?>"
                    enctype="multipart/form-data" id="msform">
                    <!-- fieldsets -->
                        <h2 class="fs-title">
                            <?php echo(isset($id_modelo))? "Modifica a tu ": " Introduce tu nevo ";?>modelo</h2>
                        <br />
                        <div class="row">
                            <div class="col"> 
                            <div class="input-group mb-2">
                                <p type="Modelo"><input type="text" name="tipo_modelo"
                                    value="<?php echo(isset($id_modelo)) ? $datosModelo['tipo_modelo']:"";?>"
                                    class="form-control" id="inlineFormInputGroup" placeholder="Modelo"/>
</p>
                            </div>
                        </div>
                        <br />
                        <br />
                        <input class="btn btn-primary" type="submit" value="Guardar" />
                </form>
</section>