<?php
    require_once('mdlEmpleado.php');
    require_once('../un/mdlUn.php');
    require_once('../puesto/mdlPuesto.php');

    //$sistema -> validarRol('Administrador');
    $no_empleado = NULL;
    $accion = NULL;
    if(isset($_GET['accion'])){
        $no_empleado = isset($_GET['no_empleado']) ? $_GET['no_empleado'] : NULL;
        $accion = $_GET['accion'];
    }

    require_once('../../../componentes/header.php');

    switch($accion){
        
         //////////////////////////////////////// Caso read One ////////////////////////////////////////
        case 'readOne':
            $datosEmpleado = $empleado->readOne($no_empleado);
            if(is_array($datosEmpleado)){
                require_once('views/empleado/vistaEmpleado.php');
            } else{
                $Empleado->message(0,"Ocurrio un error, la Empleado no exixte");
                require_once('formEmpleado.php');
            }
        break;


        //////////////////////////////////////// Caso New ////////////////////////////////////////
        case 'new':
            $datosPuestos = $puesto->read();
            $datosUNs = $un->read();
            $datosEmpleado = $empleado->read();
            require_once('formEmpleado.php');
        break;

        //////////////////////////////////////// Caso add ////////////////////////////////////////
        case 'add':
            $datosEmpleado = $_POST;
            $resultado = $empleado->create($datosEmpleado);
            //$Cambio->message($resultado, ($resultado)?"El Cambio se agrego correctamente": "Ocurrio un error al agregar el Cambio");
            $datosEmpleados = $empleado->read();
            require_once('vistaEmpleado.php');
        break;
        
        //////////////////////////////////////// Caso modify ////////////////////////////////////////
        case 'modify':
            $datosPuestos = $puesto->read();
            $datosUNs = $un->read();
            $datosEmpleado = $empleado->readOne($no_empleado);
            //$datoCambios = $Cambio->read();
            if(is_array($datosEmpleado)){
                require_once('formEmpleado.php');
            } else{
                //$Cambio->message(0,"Ocurrio un error, el Cambio no exixte");
                $datosEmpleados = $empleado->read();
                require_once('vistaEmpleado.php');
            }
        break;

        //////////////////////////////////////// Caso update ////////////////////////////////////////
        case 'update':
            $datosEmpleado=$_POST;
            $resultado=$empleado->update($datosEmpleado,$no_empleado);
            //$Cambio->message($resultado, ($resultado)?"El Cambio se modifco correctamente": "Ocurrio un error al modificar el Cambio");
            $datosEmpleados = $empleado->read();
            require_once('vistaEmpleado.php');
        break;

        //////////////////////////////////////// Caso delete ////////////////////////////////////////
        case 'delete':
            $resultado = $empleado->delete($no_empleado);
            //$Cambio->message($resultado, ($resultado)?"El Cambio se elimino correctamente": "Ocurrio un error al eliminar el Cambio");
        
        //////////////////////////////////////// Caso default ////////////////////////////////////////
        default:
            $datosEmpleados = $empleado->read();
            require_once('vistaEmpleado.php');
    }
    require_once('../../../componentes/footer.php');
?>