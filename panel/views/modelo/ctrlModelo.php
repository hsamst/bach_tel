<?php
    require_once('mdlModelo.php');
    //$sistema -> validarRol('Administrador');
    $id_modelo = NULL;
    $accion = NULL;
    if(isset($_GET['accion'])){
        $id_modelo = isset($_GET['id_modelo']) ? $_GET['id_modelo'] : NULL;
        $accion = $_GET['accion'];
    }

    //require_once('../../../Componentes/headerAdmin.php');

    switch($accion){
        
         //////////////////////////////////////// Caso read One ////////////////////////////////////////
        case 'readOne':
            $datosModelo = $modelo->readOne($id_modelo);
            if(is_array($datosModelo)){
                require_once('views/modelo/vistaModelo.php');
            } else{
                $modelo->message(0,"Ocurrio un error, el modelo no exixte");
                require_once('formModelo.php');
            }
        break;


        //////////////////////////////////////// Caso New ////////////////////////////////////////
        case 'new':
            require_once('formModelo.php');
        break;

        //////////////////////////////////////// Caso add ////////////////////////////////////////
        case 'add':
            $datosModelo = $_POST;
            $resultado = $modelo->create($datosModelo);
            //$modelo->message($resultado, ($resultado)?"El modelo se agrego correctamente": "Ocurrio un error al agregar el modelo");
            $datosModelos = $modelo->read();
            require_once('vistaModelo.php');
        break;
        
        //////////////////////////////////////// Caso modify ////////////////////////////////////////
        case 'modify':
            $datosModelo = $modelo->readOne($id_modelo);
            //$datoModelos = $modelo->read();
            if(is_array($datosModelo)){
                require_once('formModelo.php');
            } else{
                //$modelo->message(0,"Ocurrio un error, el modelo no exixte");
                $datosModelos = $modelo->read();
                require_once('vistaModelo.php');
            }
        break;

        //////////////////////////////////////// Caso update ////////////////////////////////////////
        case 'update':
            $datosModelo=$_POST;
            $resultado=$modelo->update($datosModelo,$id_modelo);
            //$modelo->message($resultado, ($resultado)?"El modelo se modifco correctamente": "Ocurrio un error al modificar el modelo");
            $datosModelos = $modelo->read();
            require_once('vistaModelo.php');
        break;

        //////////////////////////////////////// Caso delete ////////////////////////////////////////
        case 'delete':
            $resultado = $modelo->delete($id_modelo);
            //$modelo->message($resultado, ($resultado)?"El modelo se elimino correctamente": "Ocurrio un error al eliminar el modelo");
        
        //////////////////////////////////////// Caso default ////////////////////////////////////////
        default:
            $datosModelos = $modelo->read();
            require_once('vistaModelo.php');
    }


    //require_once('../../../Componentes/footer.php');


?>