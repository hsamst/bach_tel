<?php
    require '../../../vendor/autoload.php';
    require_once('mdlTicketDiadema.php');
    require_once('../empleado/mdlEmpleado.php');
    require_once('../diadema/mdlDiadema.php');
    require_once('../cambios/mdlCambio.php');

    //$sistema -> validarRol('Administrador');
    $id_ticket_diadema = NULL;
    $accion = NULL;
    if(isset($_GET['accion'])){
        $id_ticket_diadema = isset($_GET['id_ticket_diadema']) ? $_GET['id_ticket_diadema'] : NULL;
        $accion = $_GET['accion'];
    }

    require_once('../../../componentes/header.php');

    switch($accion){
        
         //////////////////////////////////////// Caso read One ////////////////////////////////////////
        case 'readOne':
            $datosTicketDiadema = $ticketDiadema->readOne($id_ticket_diadema);
            if(is_array($datosTicketDiadema)){
                require_once('views/ticket_diadema/vistaTicketDiadema.php');
            } else{
                $ticketDiadema->message(0,"Ocurrio un error, el ticketDiadema no exixte");
                require_once('formTicketDiadema.php');
            }
        break;


        //////////////////////////////////////// Caso New ////////////////////////////////////////
        case 'new':
            $datosEmpleado = $empleado->read();
            $datosDiademas = $diadema->read();
            $datosCambios = $cambio->read();
            require_once('formTicketDiadema.php');
        break;

        //////////////////////////////////////// Caso add ////////////////////////////////////////
        case 'add':
            $datosTicketDiadema = $_POST;
            $resultado = $ticketDiadema->create($datosTicketDiadema);
            //$Cambio->message($resultado, ($resultado)?"El Cambio se agrego correctamente": "Ocurrio un error al agregar el Cambio");
            $datosTicketDiademas = $ticketDiadema->read();
            require_once('vistaTicketDiadema.php');
        break;
        
        //////////////////////////////////////// Caso modify ////////////////////////////////////////
        case 'modify':
            $datosEmpleado = $empleado->read();
            $datosCambios = $cambio->read();
            $datosDiademas = $diadema->read();
            $datosTicketDiadema = $ticketDiadema->readOne($id_ticket_diadema);
            //$datoCambios = $Cambio->read();
            if(is_array($datosTicketDiadema)){
                require_once('formTicketDiadema.php');
            } else{
                //$Cambio->message(0,"Ocurrio un error, el Cambio no exixte");
                $datosTicketDiademas = $ticketDiadema->read();
                require_once('vistaTicketDiadema.php');
            }
        break;

        //////////////////////////////////////// Caso update ////////////////////////////////////////
        case 'update':
            $datosTicketDiadema=$_POST;
            $resultado=$ticketDiadema->update($datosTicketDiadema,$id_ticket_diadema);
            //$Cambio->message($resultado, ($resultado)?"El Cambio se modifco correctamente": "Ocurrio un error al modificar el Cambio");
            $datosTicketDiademas = $ticketDiadema->read();
            require_once('vistaTicketDiadema.php');
        break;

        //////////////////////////////////////// Caso delete ////////////////////////////////////////
        case 'delete':
            $resultado = $ticketDiadema->delete($id_ticket_diadema);
            //$Cambio->message($resultado, ($resultado)?"El Cambio se elimino correctamente": "Ocurrio un error al eliminar el Cambio");
        
        //////////////////////////////////////// Caso default ////////////////////////////////////////
        default:
            $datosTicketDiademas = $ticketDiadema->read();
            require_once('vistaTicketDiadema.php');
    }
    require_once('../../../componentes/footer.php');
?>