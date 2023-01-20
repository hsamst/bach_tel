<section class="page-content">
    <div id="containerFormularios">
    <h1>&bull; Registro de Usuario &bull;</h1>
    <div class="underline">
    </div>
    <form method="POST" action="crtlUsu_rol.php?accion=<?php echo(isset($id_usuario_bach))? "update&id_usuario_bach=".$id_usuario_bach."&id_rol=".$id_rol : "add"; ?>">
        <input name="id_usuario_bach" type="hidden" value="<?php echo($id_usuario_bach)?>" />
        <div class="Correo">
            <label for="Corrreo">Correo: <?php echo $datosUSROL['correo']?></label>
            <select placeholder="Subject line" id="subject_input" name="corrreo" required>
                <option selected>Choose...</option>
                <?php foreach ($datosUsuarioB as $key => $value): 
                                    $selected = "";
                                  ?>
                <option value="<?php echo $value['corrreo'];?>" <?php echo $selected; ?>>
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
                                    if($value['nombre'] == $datosUSROL['rol']):
                                        $selected = "selected";
                                      endif;
                                  ?>
                <option value="<?php echo $value['id_rol'];?>" <?php echo $selected; ?>>
                    <?php echo $value['nombre']?> </option>
                <?php endforeach; ?>
            </select>
        </div>
        <br/><br/><br/><br/><br/>
        <div class="Password">
            <label for="Password">Password</label>
            <input type="text" name="contrasena" value="<?php echo(isset($id_usuario_bach)) ? $datosUsuarioB['contrasena']:"";?>"
                class="form-control" id="inlineFormInputGroup" placeholder="Password" required />
        </div>
        <div class="submit" style="text-aling: center;">
            <input type="submit" value="Guardar" id="form_button" />
        </div>
    </form><!-- // End form -->
</div><!-- // End #container -->
                                    </section>