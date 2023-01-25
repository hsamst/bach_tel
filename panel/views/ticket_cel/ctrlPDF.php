<?php
require_once('mdlPDF.php');
require_once('../../../vendor/autoload.php');

//use Dompdf\Dompdf;

//$sistema -> validarRol('Administrador');

$id_ticket_cel = NULL;
    $accion = NULL;
    if(isset($_GET['accion'])){
        $id_ticket_cel = isset($_GET['id_ticket_cel']) ? $_GET['id_ticket_cel'] : NULL;
        $accion = $_GET['accion'];
    }

switch($accion){

    case 'ticket':
        $datosResguardo = $pdfTicket -> ticket($id_ticket_cel);
        
    break;


    default:
        $pdfHTML = 'nada';
    break;
    
}
use Dompdf\Dompdf;
$dompdf= new Dompdf();
$dompdf->load_html($datosResguardo);
$dompdf->render();
$dompdf->stream("documento.pdf", array('Attachment'=>'0'));

?>