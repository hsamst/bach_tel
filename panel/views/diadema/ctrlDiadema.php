<?php
    require_once('mdlDiadema.php');
    require_once('../marca/mdlMarca.php');

    //$sistema -> validarRol('Administrador');
    $id_diadema = NULL;
    $accion = NULL;
    if(isset($_GET['accion'])){
        $id_diadema = isset($_GET['id_diadema']) ? $_GET['id_diadema'] : NULL;
        $accion = $_GET['accion'];
    }

    //require_once('../../../Componentes/headerAdmin.php');

    switch($accion){
        
         //////////////////////////////////////// Caso read One ////////////////////////////////////////
        case 'readOne':
            $datosDiadema = $diadema->readOne($id_diadema);
            if(is_array($datosDiadema)){
                require_once('views/diadema/vistaDiadema.php');
            } else{
                $diadema->message(0,"Ocurrio un error, la diadema no exixte");
                require_once('formDiadema.php');
            }
        break;


        //////////////////////////////////////// Caso New ////////////////////////////////////////
        case 'new':
            $datosMarca = $marca->read();
            require_once('formDiadema.php');
        break;

        //////////////////////////////////////// Caso add ////////////////////////////////////////
        case 'add':
            $datosDiadema = $_POST;
            $resultado = $diadema->create($datosDiadema);
            //$Cambio->message($resultado, ($resultado)?"El Cambio se agrego correctamente": "Ocurrio un error al agregar el Cambio");
            $datosDiademas = $diadema->read();
            require_once('vistaDiadema.php');
        break;
        
        //////////////////////////////////////// Caso modify ////////////////////////////////////////
        case 'modify':
            $datosMarca = $marca->read();
            $datosDiadema = $diadema->readOne($id_diadema);
            //$datoCambios = $Cambio->read();
            if(is_array($datosDiadema)){
                require_once('formDiadema.php');
            } else{
                //$Cambio->message(0,"Ocurrio un error, el Cambio no exixte");
                $datosDiademas = $diadema->read();
                require_once('vistaDiadema.php');
            }
        break;

        //////////////////////////////////////// Caso update ////////////////////////////////////////
        case 'update':
            $datosDiadema=$_POST;
            $resultado=$diadema->update($datosDiadema,$id_diadema);
            //$Cambio->message($resultado, ($resultado)?"El Cambio se modifco correctamente": "Ocurrio un error al modificar el Cambio");
            $datosDiademas = $diadema->read();
            require_once('vistaDiadema.php');
        break;

        //////////////////////////////////////// Caso delete ////////////////////////////////////////
        case 'delete':
            $resultado = $diadema->delete($id_diadema);
            //$Cambio->message($resultado, ($resultado)?"El Cambio se elimino correctamente": "Ocurrio un error al eliminar el Cambio");
        
        //////////////////////////////////////// Caso default ////////////////////////////////////////
        default:
            $datosDiademas = $diadema->read();
            require_once('vistaDiadema.php');
    }
    //require_once('../../../Componentes/footer.php');
?>