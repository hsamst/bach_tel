<?php 
    require_once('mdlAlta.php');
    require_once('../usuarios/mdlUsuario.php');
    require_once('../usuariopri/mdlUsuariopri.php');
    require_once('../rol/mdlRol.php');
    $id_usuariopri = NULL;
    $id_rol = NULL;
    $accion = NULL;
    if (isset($_GET['accion'])) {
        $id_usuariopri = isset($_GET['id_usuariopri']) ? $_GET['id_usuariopri'] : NULL;
        $id_rol = isset($_GET['id_rol']) ? $_GET['id_rol'] : NULL;
        $accion = $_GET['accion'];
    }
    
    require_once('../../../componentes/header.php');
    switch ($accion) {
        case 'alta':
            $datosAlta = $_POST;
            if ($registro->register($datosAlta)) {
                //$sistema->message(1, "Felidades ahora eres un usuario de Fauna, Por favor Ingrese sus credenciales");
                //require_once('../Login/CtrlLogin.php');
                $datosUSROLs = $registro ->read();
                require_once('vistaAlta.php');
            }
            else{
                //$sistema->message(0, "Ocurrio un error");
                echo '<h1>Error</h1>';
            }
        break;

        case 'new':
            $datosUsuario = $usuario->read();
            $datosRol = $rol->read();
            require_once('formularioAlta.php');
            break; 

        //////////////////////////////////////// Caso modify ////////////////////////////////////////
            case 'modify':
                $datosUSROL = $registro->readOne($id_usuariopri, $id_rol);
                $datosUsuariopri = $usuariopri->readOne($id_usuariopri);
                $datosRol = $rol->read();
                if(is_array($datosUSROL)){
                    require_once('formularioAltaUP.php');
                } else{
                    //$modelo->message(0,"Ocurrio un error, el modelo no exixte");
                    $datosUSROLs = $registro ->read();
                    require_once('vistaAlta.php');
                }
            break;
    
            //////////////////////////////////////// Caso update ////////////////////////////////////////
            case 'update':
                $datosUP=$_POST;
                $resultado=$registro->update($datosUP,$id_rol,$id_usuariopri);
                //$modelo->message($resultado, ($resultado)?"El modelo se modifco correctamente": "Ocurrio un error al modificar el modelo");
                $datosUSROLs = $registro->read();
                require_once('vistaAlta.php');
            break;

        case 'delete':
            $resultado = $registro->DropRegister($id_usuariopri, $id_rol);
            $datosUSROLs = $registro ->read();
            require_once('vistaAlta.php');
            break;

        default:    
            $datosUSpri = $usuariopri->read();
            $datosUSROLs = $registro ->read();
            require_once('vistaAlta.php');
    }

    require_once('../../../componentes/footer.php');

?>