<?php
    require_once('mdlSim.php');
    //$sistema -> validarRol('Administrador');
    $iccid = NULL;
    $accion = NULL;
    if(isset($_GET['accion'])){
        $iccid = isset($_GET['iccid']) ? $_GET['iccid'] : NULL;
        $accion = $_GET['accion'];
    }

    //require_once('../../../Componentes/headerAdmin.php');

    switch($accion){
        
         //////////////////////////////////////// Caso read One ////////////////////////////////////////
        case 'readOne':
            $datosSim = $sim->readOne($iccid);
            if(is_array($datosSim)){
                require_once('views/sim/vistaSim.php');
            } else{
                $sim->message(0,"Ocurrio un error, el Unidad de negocio no exixte");
                require_once('formSim.php');
            }
        break;


        //////////////////////////////////////// Caso New ////////////////////////////////////////
        case 'new':
            require_once('formSim.php');
        break;

        //////////////////////////////////////// Caso add ////////////////////////////////////////
        case 'add':
            $datosSim = $_POST;
            $resultado = $sim->create($datosSim);
            //$Un->message($resultado, ($resultado)?"El Un se agrego correctamente": "Ocurrio un error al agregar el Un");
            $datosSims = $sim->read();
            require_once('vistaSim.php');
        break;
        
        //////////////////////////////////////// Caso modify ////////////////////////////////////////
        case 'modify':
            $datosSim = $sim->readOne($iccid);
            //$datoCambios = $Cambio->read();
            if(is_array($datosSim)){
                require_once('formSim.php');
            } else{
                //$Cambio->message(0,"Ocurrio un error, el Cambio no exixte");
                $datosSims = $sim->read();
                require_once('vistaSim.php');
            }
        break;

        //////////////////////////////////////// Caso update ////////////////////////////////////////
        case 'update':
            $datosSim=$_POST;
            $resultado=$sim->update($datosSim,$iccid);
            //$un->message($resultado, ($resultado)?"El Cambio se modifco correctamente": "Ocurrio un error al modificar el Cambio");
            $datosSims = $sim->read();
            require_once('vistaSim.php');
        break;

        //////////////////////////////////////// Caso delete ////////////////////////////////////////
        case 'delete':
            $resultado = $sim->delete($iccid);
            //$un->message($resultado, ($resultado)?"El un se elimino correctamente": "Ocurrio un error al eliminar el Cambio");
        
        //////////////////////////////////////// Caso default ////////////////////////////////////////
        default:
            $datosSims = $sim->read();
            require_once('vistaSim.php');
    }

    //require_once('../../../Componentes/footer.php');

?>