<section class="page-content">
    <div id="containerFormularios">
    <h1>&bull; Registro de Usuario Previligiado &bull;</h1>
    <div class="underline">
    </div>
    <form method="post" action="crtlUsu_rol.php?accion=add"
        enctype="multipart/form-data" id="contact_form">
        <div class="Correo">
            <label for="Correo">Correo</label>
            <select placeholder="Subject line" id="subject_input" name="corrreo" required>
            <option selected>Choose...</option>
                            <?php foreach ($datosUsuarioB as $key => $value): 
                                    $selected = "";
                                  ?>
                            <option value="<?php echo $value['corrreo'];?>" <?php echo $selected; ?>>
                                <?php echo $value['corrreo']?> </option>
                            <?php endforeach; ?>
            </select>
        </div>
        <div class="Rol">
            <label for="Rol">Rol</label>
            <select placeholder="Subject line" id="subject_input" name="id_rol" required>
            <option selected>Choose...</option>
                            <?php foreach ($datosRol as $key => $value): 
                                    $selected = "";
                                  ?>
                            <option value="<?php echo $value['id_rol'];?>" <?php echo $selected; ?>>
                                <?php echo $value['nombre']?> </option>
                            <?php endforeach; ?>
            </select>
        </div>
        <br/><br/><br/><br/><br/>
        <div class="Contrasena">
            <label for="Contrasena">Contrasena</label>
            <input type="text" name="contrasena" value="<?php echo(isset($st)) ? $datosEquipo['st']:"";?>" class="form-control"
                id="inlineFormInputGroup" placeholder="Contrasena" required />
        </div>
        <div class="submit" style="text-aling: center;">
            <input type="submit" value="Registrar" id="form_button" />
        </div>
    </form><!-- // End form -->
</div><!-- // End #container -->
                            </section>