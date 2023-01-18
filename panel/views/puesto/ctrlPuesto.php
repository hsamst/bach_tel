<?php
    require_once('mdlPuesto.php');
    //$sistema -> validarRol('Administrador');
    $id_puesto = NULL;
    $accion = NULL;
    if(isset($_GET['accion'])){
        $id_puesto = isset($_GET['id_puesto']) ? $_GET['id_puesto'] : NULL;
        $accion = $_GET['accion'];
    }

    require_once('../../../componentes/header.php');

    switch($accion){
        
         //////////////////////////////////////// Caso read One ////////////////////////////////////////
        case 'readOne':
            $datosPuesto = $puesto->readOne($id_puesto);
            if(is_array($datosPuesto)){
                require_once('views/puesto/vistaPuesto.php');
            } else{
                $puesto->message(0,"Ocurrio un error, el puesto no exixte");
                require_once('formPuesto.php');
            }
        break;


        //////////////////////////////////////// Caso New ////////////////////////////////////////
        case 'new':
            require_once('formPuesto.php');
        break;

        //////////////////////////////////////// Caso add ////////////////////////////////////////
        case 'add':
            $datosPuesto = $_POST;
            $resultado = $puesto->create($datosPuesto);
            //$puesto->message($resultado, ($resultado)?"El puesto se agrego correctamente": "Ocurrio un error al agregar el puesto");
            $datosPuestos = $puesto->read();
            require_once('vistaPuesto.php');
        break;
        
        //////////////////////////////////////// Caso modify ////////////////////////////////////////
        case 'modify':
            $datosPuesto = $puesto->readOne($id_puesto);
            //$datopuestos = $puesto->read();
            if(is_array($datosPuesto)){
                require_once('formPuesto.php');
            } else{
                //$puesto->message(0,"Ocurrio un error, el puesto no exixte");
                $datosPuestos = $puesto->read();
                require_once('vistaPuesto.php');
            }
        break;

        //////////////////////////////////////// Caso update ////////////////////////////////////////
        case 'update':
            $datosPuesto=$_POST;
            $resultado=$puesto->update($datosPuesto,$id_puesto);
            //$puesto->message($resultado, ($resultado)?"El puesto se modifco correctamente": "Ocurrio un error al modificar el puesto");
            $datosPuestos = $puesto->read();
            require_once('vistaPuesto.php');
        break;

        //////////////////////////////////////// Caso delete ////////////////////////////////////////
        case 'delete':
            $resultado = $puesto->delete($id_puesto);
            //$puesto->message($resultado, ($resultado)?"El puesto se elimino correctamente": "Ocurrio un error al eliminar el puesto");
        
        //////////////////////////////////////// Caso default ////////////////////////////////////////
        default:
            $datosPuestos = $puesto->read();
            require_once('vistaPuesto.php');
    }


    require_once('../../../componentes/footer.php');


?>