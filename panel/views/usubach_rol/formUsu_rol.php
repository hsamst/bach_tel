<section class="page-content">
    <div id="containerFormularios">
    <h1>&bull; Registro de Usuario &bull;</h1>
    <div class="underline">
    </div>
    <form method="POST" action="crtlAlta.php?accion=<?php echo(isset($id_usuariopri))? "update&id_usuariopri=".$id_usuariopri."&id_rol=".$id_rol : "add"; ?>">
        <input name="id_usuariopri" type="hidden" value="<?php echo($id_usuariopri)?>" />
        <div class="Correo">
            <label for="Correo">Correo: <?php echo $datosUSROL['correo']?></label>
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
                                    if($value['nombre_rol'] == $datosUSROL['rol']):
                                        $selected = "selected";
                                      endif;
                                  ?>
                <option value="<?php echo $value['id_rol'];?>" <?php echo $selected; ?>>
                    <?php echo $value['nombre_rol']?> </option>
                <?php endforeach; ?>
            </select>
        </div>
        <br/><br/><br/><br/><br/>
        <div class="Password">
            <label for="Password">Password</label>
            <input type="text" name="pass" value="<?php echo(isset($id_usuariopri)) ? $datosUsuariopri['pass']:"";?>"
                class="form-control" id="inlineFormInputGroup" placeholder="Password" required />
        </div>
        <div class="submit" style="text-aling: center;">
            <input type="submit" value="Guardar" id="form_button" />
        </div>
    </form><!-- // End form -->
</div><!-- // End #container -->
                                    </section>