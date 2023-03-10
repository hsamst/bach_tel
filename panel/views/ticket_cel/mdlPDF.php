<?php
    require_once('../../sistemas.php');

    class PDFticketCel extends Sistema{
        public function ticket($id_ticket_cel){
            $this->conexion();
            $sql="SELECT t.linea, (pd.descripcion) as plan, 
            (m.nombre_marca) as marca, 
            (mo.tipo_modelo) as modelo, 
            t.imei, 
            (s.iccid) as sim_id, 
            t.accesosrios,
            (u.nombre_completo) as nombre,
            u.no_empleado,
            (p.nombre) as puesto,
            (un.nombre) as un
            from ticket_cel tc
            INNER JOIN telefonos t on t.imei=tc.imei
            INNER JOIN plan_datos pd on pd.id_plan=t.id_plan
            INNER JOIN marca m on m.id_marca=t.id_marca
            INNER JOIN modelo mo on mo.id_modelo=m.id_modelo
            INNER JOIN sim s on s.iccid=t.iccid
            INNER JOIN usuario u on u.no_empleado=tc.no_empleado
            INNER JOIN puestos p on p.id_puesto=u.id_puesto
            INNER JOIN un un on un.id_un=u.id_un
            where id_ticket_cel=:id_ticket_cel;";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':id_ticket_cel', $id_ticket_cel, PDO::PARAM_INT);
            $stmt->execute();
            $datosResguardo = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $datosResguardo = (isset($datosResguardo[0]))?$datosResguardo[0]:null;
            if(!is_null($datosResguardo)){
                $pdfHTML=include('pdfcelular.php');
            }
            else{
                $pdfHTML='no se encontraron resultados';
            }
            return $pdfHTML;
    }
    }
    $pdfTicket = new PDFticketCel();
?>