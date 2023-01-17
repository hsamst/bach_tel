<?php
    require_once('mdlUn.php');
    //$sistema -> validarRol('Administrador');
    $id_un = NULL;
    $accion = NULL;
    if(isset($_GET['accion'])){
        $id_un = isset($_GET['id_un']) ? $_GET['id_un'] : NULL;
        $accion = $_GET['accion'];
    }

    require_once('../../../componentes/header.php');

    switch($accion){
        
         //////////////////////////////////////// Caso read One ////////////////////////////////////////
        case 'readOne':
            $datosUn = $un->readOne($id_un);
            if(is_array($datosUn)){
                require_once('views/un/vistaUn.php');
            } else{
                $un->message(0,"Ocurrio un error, el Unidad de negocio no exixte");
                require_once('formUn.php');
            }
        break;


        //////////////////////////////////////// Caso New ////////////////////////////////////////
        case 'new':
            require_once('formUn.php');
        break;

        //////////////////////////////////////// Caso add ////////////////////////////////////////
        case 'add':
            $datosUn = $_POST;
            $resultado = $un->create($datosUn);
            //$Un->message($resultado, ($resultado)?"El Un se agrego correctamente": "Ocurrio un error al agregar el Un");
            $datosUns = $un->read();
            require_once('vistaUn.php');
        break;
        
        //////////////////////////////////////// Caso modify ////////////////////////////////////////
        case 'modify':
            $datosUn = $un->readOne($id_un);
            //$datoCambios = $Cambio->read();
            if(is_array($datosUn)){
                require_once('formUn.php');
            } else{
                //$Cambio->message(0,"Ocurrio un error, el Cambio no exixte");
                $datosUns = $un->read();
                require_once('vistaUn.php');
            }
        break;

        //////////////////////////////////////// Caso update ////////////////////////////////////////
        case 'update':
            $datosUn=$_POST;
            $resultado=$un->update($datosUn,$id_un);
            //$un->message($resultado, ($resultado)?"El Cambio se modifco correctamente": "Ocurrio un error al modificar el Cambio");
            $datosUns = $un->read();
            require_once('vistaUn.php');
        break;

        //////////////////////////////////////// Caso delete ////////////////////////////////////////
        case 'delete':
            $resultado = $un->delete($id_un);
            //$un->message($resultado, ($resultado)?"El un se elimino correctamente": "Ocurrio un error al eliminar el Cambio");
        
        //////////////////////////////////////// Caso default ////////////////////////////////////////
        default:
            $datosUns = $un->read();
            require_once('vistaUn.php');
    }

    require_once('../../../componentes/footer.php');

?>