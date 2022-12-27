<?php
    require_once('mdlUsuarioB.php');
    //$sistema -> validarRol('Administrador');
    $id_usuario_bach = NULL;
    $accion = NULL;
    if(isset($_GET['accion'])){
        $id_usuario_bach = isset($_GET['id_usuario_bach']) ? $_GET['id_usuario_bach'] : NULL;
        $accion = $_GET['accion'];
    }

    //require_once('../../../Componentes/headerAdmin.php');

    switch($accion){
        
         //////////////////////////////////////// Caso read One ////////////////////////////////////////
        case 'readOne':
            $datosUsuarioB = $usuarioB->readOne($id_usuario_bach);
            if(is_array($datosUsuarioB)){
                require_once('views/usuariobach/vistaUsuarioB.php');
            } else{
                $puesto->message(0,"Ocurrio un error, el puesto no exixte");
                require_once('formUsuarioB.php');
            }
        break;


        //////////////////////////////////////// Caso New ////////////////////////////////////////
        case 'new':
            require_once('formUsuarioB.php');
        break;

        //////////////////////////////////////// Caso add ////////////////////////////////////////
        case 'add':
            $datosUsuarioB = $_POST;
            $resultado = $usuarioB->create($datosUsuarioB);
            //$puesto->message($resultado, ($resultado)?"El puesto se agrego correctamente": "Ocurrio un error al agregar el puesto");
            $datosUsuarioBs = $usuarioB->read();
            require_once('vistaUsuarioB.php');
        break;
        
        //////////////////////////////////////// Caso modify ////////////////////////////////////////
        case 'modify':
            $datosUsuarioB = $usuarioB->readOne($id_usuario_bach);
            //$datopuestos = $puesto->read();
            if(is_array($datosUsuarioB)){
                require_once('formUsuarioB.php');
            } else{
                //$puesto->message(0,"Ocurrio un error, el puesto no exixte");
                $datosUsuarioBs = $usuarioB->read();
                require_once('vistaUsuarioB.php');
            }
        break;

        //////////////////////////////////////// Caso update ////////////////////////////////////////
        case 'update':
            $datosUsuarioB=$_POST;
            $resultado=$usuarioB->update($datosUsuarioB,$id_usuario_bach);
            //$puesto->message($resultado, ($resultado)?"El puesto se modifco correctamente": "Ocurrio un error al modificar el puesto");
            $datosUsuarioBs = $usuarioB->read();
            require_once('vistaUsuarioB.php');
        break;

        //////////////////////////////////////// Caso delete ////////////////////////////////////////
        case 'delete':
            $resultado = $usuarioB->delete($id_usuario_bach);
            //$puesto->message($resultado, ($resultado)?"El puesto se elimino correctamente": "Ocurrio un error al eliminar el puesto");
        
        //////////////////////////////////////// Caso default ////////////////////////////////////////
        default:
            $datosUsuarioBs = $usuarioB->read();
            require_once('vistaUsuarioB.php');
    }


    //require_once('../../../Componentes/footer.php');


?>