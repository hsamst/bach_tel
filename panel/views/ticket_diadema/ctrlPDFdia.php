<?php
require_once('mdlPdfDia.php');
require_once('../../../vendor/autoload.php');

//use Dompdf\Dompdf;

//$sistema -> validarRol('Administrador');

$id_ticket_diadema = NULL;
    $accion = NULL;
    if(isset($_GET['accion'])){
        $id_ticket_diadema = isset($_GET['id_ticket_diadema']) ? $_GET['id_ticket_diadema'] : NULL;
        $accion = $_GET['accion'];
    }

switch($accion){

    case 'ticket':
        $datosResDia = $pdfTicket -> ticket($id_ticket_diadema);
        
    break;


    default:
        $pdfHTML = 'nada';
    break;
    
}
use Dompdf\Dompdf;
$dompdf= new Dompdf();
$dompdf->load_html($datosResDia);
$dompdf->render();
$dompdf->stream("documento.pdf", array('Attachment'=>'0'));

?>