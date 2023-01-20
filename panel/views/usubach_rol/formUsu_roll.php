<section class="page-content">
    <div id="containerFormularios">
    <h1>&bull; Registro de Usuario Previligiado &bull;</h1>
    <div class="underline">
    </div>
    <form method="post" action="crtlAlta.php?accion=alta"
        enctype="multipart/form-data" id="contact_form">
        <div class="Correo">
            <label for="Correo">Correo</label>
            <select placeholder="Subject line" id="subject_input" name="correo" required>
            <option selected>Choose...</option>
                            <?php foreach ($datosUsuario as $key => $value): 
                                    $selected = "";
                                  ?>
                            <option value="<?php echo $value['correo'];?>" <?php echo $selected; ?>>
                                <?php echo $value['correo']?> </option>
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
                                <?php echo $value['nombre_rol']?> </option>
                            <?php endforeach; ?>
            </select>
        </div>
        <br/><br/><br/><br/><br/>
        <div class="Password">
            <label for="Password">Password</label>
            <input type="text" name="pass" value="<?php echo(isset($st)) ? $datosEquipo['st']:"";?>" class="form-control"
                id="inlineFormInputGroup" placeholder="Password" required />
        </div>
        <div class="submit" style="text-aling: center;">
            <input type="submit" value="Registrar" id="form_button" />
        </div>
    </form><!-- // End form -->
</div><!-- // End #container -->
                            </section>