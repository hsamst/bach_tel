<?php
    require_once('mdlMarca.php');
    require_once('../modelo/mdlModelo.php');

    //$sistema -> validarRol('Administrador');
    $id_marca = NULL;
    $accion = NULL;
    if(isset($_GET['accion'])){
        $id_marca = isset($_GET['id_marca']) ? $_GET['id_marca'] : NULL;
        $accion = $_GET['accion'];
    }

    require_once('../../../componentes/header.php');

    switch($accion){
        
         //////////////////////////////////////// Caso read One ////////////////////////////////////////
        case 'readOne':
            $datosMarca = $marca->readOne($id_marca);
            if(is_array($datosMarca)){
                require_once('views/marca/vistaMarca.php');
            } else{
                $marca->message(0,"Ocurrio un error, la Marca no exixte");
                require_once('formMarca.php');
            }
        break;


        //////////////////////////////////////// Caso New ////////////////////////////////////////
        case 'new':
            $datosModelo = $modelo->read();
            require_once('formMarca.php');
        break;

        //////////////////////////////////////// Caso add ////////////////////////////////////////
        case 'add':
            $datosMarca = $_POST;
            $resultado = $marca->create($datosMarca);
            //$Cambio->message($resultado, ($resultado)?"El Cambio se agrego correctamente": "Ocurrio un error al agregar el Cambio");
            $datosMarcas = $marca->read();
            require_once('vistaMarca.php');
        break;
        
        //////////////////////////////////////// Caso modify ////////////////////////////////////////
        case 'modify':
            $datosModelo = $modelo->read();
            $datosMarca = $marca->readOne($id_marca);
            //$datoCambios = $Cambio->read();
            if(is_array($datosMarca)){
                require_once('formMarca.php');
            } else{
                //$Cambio->message(0,"Ocurrio un error, el Cambio no exixte");
                $datosMarcas = $marca->read();
                require_once('vistaMarca.php');
            }
        break;

        //////////////////////////////////////// Caso update ////////////////////////////////////////
        case 'update':
            $datosMarca=$_POST;
            $resultado=$marca->update($datosMarca,$id_marca);
            //$Cambio->message($resultado, ($resultado)?"El Cambio se modifco correctamente": "Ocurrio un error al modificar el Cambio");
            $datosMarcas = $marca->read();
            require_once('vistaMarca.php');
        break;

        //////////////////////////////////////// Caso delete ////////////////////////////////////////
        case 'delete':
            $resultado = $marca->delete($id_marca);
            //$Cambio->message($resultado, ($resultado)?"El Cambio se elimino correctamente": "Ocurrio un error al eliminar el Cambio");
        
        //////////////////////////////////////// Caso default ////////////////////////////////////////
        default:
            $datosMarcas = $marca->read();
            require_once('vistaMarca.php');
    }
    require_once('../../../componentes/footer.php');
?>