<?php
    require_once('../../sistemas.php');
    require_once('../usuariobach/mdlUsuarioB.php');
    $accion = NULL;
    if(isset($_GET['accion'])){
        $accion = $_GET['accion'];
    }

    switch($accion){

        case 'login';
                $datos = $_POST;
                if($usuarioB->login($datos['corrreo'], $datos['contrasena'])){
                    $usuarioB -> credentials($datos['corrreo']);
                    print_r($_SESSION['roles']);
                    switch($_SESSION['roles'][0]){
                        case 'Administrador':
                            header('Location: ../index.php');
                        break;

                        case 'Empleado':
                           
                        break;
                        default: //cliente
                        header('Location: ../home.php');
                    }
                }
                else{
                   // $sistema -> message(0,"Usuario o contraseña invalidas, porfavor ingresa campos validos");
                    $sistema -> logOut();
                    require_once('vistaLogin.php');

                    }
        break;

        case 'logOut';
              //  $sistema -> message(1,"La sesion se ha cerrado");
                $sistema -> logOut();
                header('Location: ctrlLogin.php');
                break;
        default:
        require_once('vistaLogin.php');
    }
?>