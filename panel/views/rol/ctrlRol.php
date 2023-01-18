<?php
    require_once('mdlRol.php');
    //$sistema -> validarRol('Administrador');
    $id_rol = NULL;
    $accion = NULL;
    if(isset($_GET['accion'])){
        $id_rol = isset($_GET['id_rol']) ? $_GET['id_rol'] : NULL;
        $accion = $_GET['accion'];
    }

    require_once('../../../componentes/header.php');

    switch($accion){
        
         //////////////////////////////////////// Caso read One ////////////////////////////////////////
        case 'readOne':
            $datosRol = $rol->readOne($id_rol);
            if(is_array($datosRol)){
                require_once('views/rol/vistaRol.php');
            } else{
                $rol->message(0,"Ocurrio un error, el rol no exixte");
                require_once('formRol.php');
            }
        break;

        //////////////////////////////////////// Caso New ////////////////////////////////////////
        case 'new':
            require_once('formRol.php');
        break;

        //////////////////////////////////////// Caso add ////////////////////////////////////////
        case 'add':
            $datosRol = $_POST;
            $resultado = $rol->create($datosRol);
            //$rol->message($resultado, ($resultado)?"El rol se agrego correctamente": "Ocurrio un error al agregar el rol");
            $datosRols = $rol->read();
            require_once('vistaRol.php');
        break;
        
        //////////////////////////////////////// Caso modify ////////////////////////////////////////
        case 'modify':
            $datosRol = $rol->readOne($id_rol);
            //$datorols = $rol->read();
            if(is_array($datosRol)){
                require_once('formRol.php');
            } else{
                //$rol->message(0,"Ocurrio un error, el rol no exixte");
                $datosRols = $rol->read();
                require_once('vistaRol.php');
            }
        break;

        //////////////////////////////////////// Caso update ////////////////////////////////////////
        case 'update':
            $datosRol=$_POST;
            $resultado=$rol->update($datosRol,$id_rol);
            //$rol->message($resultado, ($resultado)?"El rol se modifco correctamente": "Ocurrio un error al modificar el rol");
            $datosRols = $rol->read();
            require_once('vistaRol.php');
        break;

        //////////////////////////////////////// Caso delete ////////////////////////////////////////
        case 'delete':
            $resultado = $rol->delete($id_rol);
            //$rol->message($resultado, ($resultado)?"El rol se elimino correctamente": "Ocurrio un error al eliminar el rol");
        
        //////////////////////////////////////// Caso default ////////////////////////////////////////
        default:
            $datosRols = $rol->read();
            require_once('vistaRol.php');
    }


    require_once('../../../componentes/footer.php');


?>