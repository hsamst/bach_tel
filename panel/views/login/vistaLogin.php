  <?php require_once('../../../componentes/headerLogin.php');?>
  <div class="wrapper">
    
  <div class="login-text">
        <button class="cta"><i class="fas fa-chevron-down fa-1x"></i></button>
        
        <div class="text" >
        <form method="POST" action="ctrlLogin.php?accion=login"enctype="multipart/form-data">
            <a href="">Login</a>
            <hr>
            <br>
            <input type="text" placeholder="Username" name="corrreo">
            <br>
            <input type="password" placeholder="Password" name="contrasena">
            <br>
            <input id="btnIngre" class="login-btn" type="submit" value="Ingresar" />
            </form>
        </div>
    </div>

    <div class="call-text" style=" background-image: url(/Proyecto_Tel_Bach/images/Anuncio.png); background-repeat: no-repeat, repeat; background-size: cover; height: 80%">
    </div>

</div>
<?php require_once('../../../componentes/footerLogin.php');?>