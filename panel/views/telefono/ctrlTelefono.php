<?php
    require_once('mdlTelefono.php');
    require_once('../marca/mdlMarca.php');
    require_once('../plan_datos/mdlPlan.php');
    require_once('../sim/mdlSim.php');

    //$sistema -> validarRol('Administrador');
    $imei = NULL;
    $accion = NULL;
    if(isset($_GET['accion'])){
        $imei = isset($_GET['imei']) ? $_GET['imei'] : NULL;
        $accion = $_GET['accion'];
    }

    require_once('../../../Componentes/header.php');

    switch($accion){
        
         //////////////////////////////////////// Caso read One ////////////////////////////////////////
        case 'readOne':
            $datosTelefono = $telefono->readOne($imei);
            if(is_array($datosTelefono)){
                require_once('views/telefono/vistaTelefono.php');
            } else{
                $telefono->message(0,"Ocurrio un error, el telefono no exixte");
                require_once('formTelefono.php');
            }
        break;


        //////////////////////////////////////// Caso New ////////////////////////////////////////
        case 'new':
            $datosMarca = $marca->read();
            $datosPlan = $plan->read();
            $datosSim = $sim->read();
            require_once('formTelefono.php');
        break;

        //////////////////////////////////////// Caso add ////////////////////////////////////////
        case 'add':
            $datosTelefono = $_POST;
            $resultado = $telefono->create($datosTelefono);
            //$Cambio->message($resultado, ($resultado)?"El Cambio se agrego correctamente": "Ocurrio un error al agregar el Cambio");
            $datosTelefonos = $telefono->read();
            require_once('vistaTelefono.php');
        break;
        
        //////////////////////////////////////// Caso modify ////////////////////////////////////////
        case 'modify':
            $datosMarca = $marca->read();
            $datosPlan = $plan->read();
            $datosSim = $sim->read();
            $datosTelefono = $telefono->readOne($imei);
            //$datoCambios = $Cambio->read();
            if(is_array($datosTelefono)){
                require_once('formTelefono.php');
            } else{
                //$Cambio->message(0,"Ocurrio un error, el Cambio no exixte");
                $datosTelefonos = $telefono->read();
                require_once('vistaTelefono.php');
            }
        break;

        //////////////////////////////////////// Caso update ////////////////////////////////////////
        case 'update':
            $datosTelefono=$_POST;
            $resultado=$telefono->update($datosTelefono,$imei);
            //$Cambio->message($resultado, ($resultado)?"El Cambio se modifco correctamente": "Ocurrio un error al modificar el Cambio");
            $datosTelefonos = $telefono->read();
            require_once('vistaTelefono.php');
        break;

        //////////////////////////////////////// Caso delete ////////////////////////////////////////
        case 'delete':
            $resultado = $telefono->delete($imei);
            //$Cambio->message($resultado, ($resultado)?"El Cambio se elimino correctamente": "Ocurrio un error al eliminar el Cambio");
        
        //////////////////////////////////////// Caso default ////////////////////////////////////////
        default:
            $datosTelefonos = $telefono->read();
            require_once('vistaTelefono.php');
    }
    require_once('../../../componentes/footer.php');
?>