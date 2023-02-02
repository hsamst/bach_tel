<?php
    require_once('../../sistemas.php');

    class PDFTicketDia extends Sistema{
        public function ticket($id_ticket_diadema){
            $this->conexion();
            $sql="SELECT (m.nombre_marca) as marca, 
            (mo.tipo_modelo) as modelo, 
            d.id_diadema, 
            (u.nombre_completo) as nombre,
            u.no_empleado,
            (p.nombre) as puesto,
            (un.nombre) as un
            from ticket_daidema td
            INNER JOIN diadema d on d.id_diadema=td.id_diadema
            INNER JOIN marca m on m.id_marca=d.id_marca
            INNER JOIN modelo mo on mo.id_modelo=m.id_modelo
            INNER JOIN usuario u on u.no_empleado=td.no_empleado
            INNER JOIN puestos p on p.id_puesto=u.id_puesto
            INNER JOIN un un on un.id_un=u.id_un
            where id_ticket_diadema=:id_ticket_diadema;";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':id_ticket_diadema', $id_ticket_diadema, PDO::PARAM_INT);
            $stmt->execute();
            $datosResDia = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $datosResDia = (isset($datosResDia[0]))?$datosResDia[0]:null;
            if(!is_null($datosResDia)){
                $pdfHTML=include('pdfdiadema.php');
            }
            else{
                $pdfHTML='no se encontraron resultados';
            }
            return $pdfHTML;
    }
    }
    $pdfTicket = new PDFTicketDia();
?>