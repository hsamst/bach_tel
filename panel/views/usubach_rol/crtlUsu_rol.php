<?php 
    require_once('mdlUsu_rol.php');
    require_once('../empleado/mdlEmpleado.php');
    require_once('../usuariobach/mdlUsuarioB.php');
    require_once('../rol/mdlRol.php');
    $id_usuario_bach = NULL;
    $id_rol = NULL;
    $accion = NULL;
    if (isset($_GET['accion'])) {
        $id_usuario_bach = isset($_GET['id_usuario_bach']) ? $_GET['id_usuario_bach'] : NULL;
        $id_rol = isset($_GET['id_rol']) ? $_GET['id_rol'] : NULL;
        $accion = $_GET['accion'];
    }
    
    require_once('../../../componentes/header.php');
    switch ($accion) {
        case 'add':
            $datosAdd = $_POST;
            if ($registro->register($datosAdd)) {
                //$sistema->message(1, "Felidades ahora eres un usuario de Fauna, Por favor Ingrese sus credenciales");
                //require_once('../Login/CtrlLogin.php');
                $datosUSROLs = $registro ->read();
                require_once('vistaUsu_rol.php');
            }
            else{
                //$sistema->message(0, "Ocurrio un error");
                echo '<h1>Error</h1>';
            }
        break;

        case 'new':
            $datosUsuarioB = $usuarioB->read();
            $datosRol = $rol->read();
            require_once('formUsu_roll.php');
            break; 

        //////////////////////////////////////// Caso modify ////////////////////////////////////////
            case 'modify':
                $datosUSROL = $registro->readOne($id_usuario_bach, $id_rol);
                $datosUsuarioB = $usuarioB->readOne($id_usuario_bach);
                $datosRol = $rol->read();
                if(is_array($datosUSROL)){
                    require_once('formUsu_rol.php');
                } else{
                    //$modelo->message(0,"Ocurrio un error, el modelo no exixte");
                    $datosUSROLs = $registro ->read();
                    require_once('vistaUsu_rol.php');
                }
            break;
    
            //////////////////////////////////////// Caso update ////////////////////////////////////////
            case 'update':
                $datosUP=$_POST;
                $resultado=$registro->update($datosUP,$id_rol,$id_usuario_bach);
                //$modelo->message($resultado, ($resultado)?"El modelo se modifco correctamente": "Ocurrio un error al modificar el modelo");
                $datosUSROLs = $registro->read();
                require_once('vistaUsu_rol.php');
            break;

        case 'delete':
            $resultado = $registro->DropRegister($id_usuario_bach, $id_rol);
            $datosUSROLs = $registro ->read();
            require_once('vistaUsu_rol.php');
            break;

        default:    
            $datosUsuarioB = $usuarioB->read();
            $datosUSROLs = $registro ->read();
            require_once('vistaUsu_rol.php');
    }

    require_once('../../../componentes/footer.php');

?>