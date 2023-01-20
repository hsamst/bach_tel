<?php
    require_once('mdlTicketCel.php');
    require_once('../empleado/mdlEmpleado.php');
    require_once('../telefono/mdlTelefono.php');
    require_once('../cambios/mdlCambio.php');

    //$sistema -> validarRol('Administrador');
    $id_ticket_cel = NULL;
    $accion = NULL;
    if(isset($_GET['accion'])){
        $id_ticket_cel = isset($_GET['id_ticket_cel']) ? $_GET['id_ticket_cel'] : NULL;
        $accion = $_GET['accion'];
    }

    require_once('../../../componentes/header.php');

    switch($accion){
        
         //////////////////////////////////////// Caso read One ////////////////////////////////////////
        case 'readOne':
            $datosTicketCel = $ticketCel->readOne($id_ticket_cel);
            if(is_array($datosTicketCel)){
                require_once('views/ticket_Cel/vistaTicketCel.php');
            } else{
                $ticketCel->message(0,"Ocurrio un error, el ticketCel no exixte");
                require_once('formTicketCel.php');
            }
        break;


        //////////////////////////////////////// Caso New ////////////////////////////////////////
        case 'new':
            $datosEmpleado = $empleado->read();
            $datosTelefonos = $telefono->read();
            $datosCambios = $cambio->read();
            require_once('formTicketCel.php');
        break;

        //////////////////////////////////////// Caso add ////////////////////////////////////////
        case 'add':
            $datosTicketCel = $_POST;
            $resultado = $ticketCel->create($datosTicketCel);
            //$Cambio->message($resultado, ($resultado)?"El Cambio se agrego correctamente": "Ocurrio un error al agregar el Cambio");
            $datosTicketCels = $ticketCel->read();
            require_once('vistaTicketCel.php');
        break;
        
        //////////////////////////////////////// Caso modify ////////////////////////////////////////
        case 'modify':
            $datosEmpleado = $empleado->read();
            $datosTelefonos = $telefono->read();
            $datosCambios = $cambio->read();
            $datosTicketCel = $ticketCel->readOne($id_ticket_cel);
            //$datoCambios = $Cambio->read();
            if(is_array($datosTicketCel)){
                require_once('formTicketCel.php');
            } else{
                //$Cambio->message(0,"Ocurrio un error, el Cambio no exixte");
                $datosTicketCels = $ticketCel->read();
                require_once('vistaTicketCel.php');
            }
        break;

        //////////////////////////////////////// Caso update ////////////////////////////////////////
        case 'update':
            $datosTicketCel=$_POST;
            $resultado=$ticketCel->update($datosTicketCel,$id_ticket_cel);
            //$Cambio->message($resultado, ($resultado)?"El Cambio se modifco correctamente": "Ocurrio un error al modificar el Cambio");
            $datosTicketCels = $ticketCel->read();
            require_once('vistaTicketCel.php');
        break;

        //////////////////////////////////////// Caso delete ////////////////////////////////////////
        case 'delete':
            $resultado = $ticketCel->delete($id_ticket_cel);
            //$Cambio->message($resultado, ($resultado)?"El Cambio se elimino correctamente": "Ocurrio un error al eliminar el Cambio");
        
        //////////////////////////////////////// Caso default ////////////////////////////////////////
        default:
            $datosTicketCels = $ticketCel->read();
            require_once('vistaTicketCel.php');
    }
    require_once('../../../componentes/footer.php');
?>