<?php
    require_once('mdlCambio.php');
    //$sistema -> validarRol('Administrador');
    $id_cambio = NULL;
    $accion = NULL;
    if(isset($_GET['accion'])){
        $id_cambio = isset($_GET['id_cambio']) ? $_GET['id_cambio'] : NULL;
        $accion = $_GET['accion'];
    }

    //require_once('../../../Componentes/headerAdmin.php');

    switch($accion){
        
         //////////////////////////////////////// Caso read One ////////////////////////////////////////
        case 'readOne':
            $datosCambio = $cambio->readOne($id_cambio);
            if(is_array($datosCambio)){
                require_once('views/cambios/vistaCambio.php');
            } else{
                $cambio->message(0,"Ocurrio un error, el Cambio no exixte");
                require_once('formCambio.php');
            }
        break;


        //////////////////////////////////////// Caso New ////////////////////////////////////////
        case 'new':
            require_once('formCambio.php');
        break;

        //////////////////////////////////////// Caso add ////////////////////////////////////////
        case 'add':
            $datosCambio = $_POST;
            $resultado = $cambio->create($datosCambio);
            //$Cambio->message($resultado, ($resultado)?"El Cambio se agrego correctamente": "Ocurrio un error al agregar el Cambio");
            $datosCambios = $cambio->read();
            require_once('vistaCambio.php');
        break;
        
        //////////////////////////////////////// Caso modify ////////////////////////////////////////
        case 'modify':
            $datosCambio = $cambio->readOne($id_cambio);
            //$datoCambios = $Cambio->read();
            if(is_array($datosCambio)){
                require_once('formCambio.php');
            } else{
                //$Cambio->message(0,"Ocurrio un error, el Cambio no exixte");
                $datosCambios = $cambio->read();
                require_once('vistaCambio.php');
            }
        break;

        //////////////////////////////////////// Caso update ////////////////////////////////////////
        case 'update':
            $datosCambio=$_POST;
            $resultado=$cambio->update($datosCambio,$id_cambio);
            //$Cambio->message($resultado, ($resultado)?"El Cambio se modifco correctamente": "Ocurrio un error al modificar el Cambio");
            $datosCambios = $cambio->read();
            require_once('vistaCambio.php');
        break;

        //////////////////////////////////////// Caso delete ////////////////////////////////////////
        case 'delete':
            $resultado = $cambio->delete($id_cambio);
            //$Cambio->message($resultado, ($resultado)?"El Cambio se elimino correctamente": "Ocurrio un error al eliminar el Cambio");
        
        //////////////////////////////////////// Caso default ////////////////////////////////////////
        default:
            $datosCambios = $cambio->read();
            require_once('vistaCambio.php');
    }


    //require_once('../../../Componentes/footer.php');


?>