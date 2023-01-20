<?php
    require_once('../../sistemas.php');

    class TicketDiadema extends Sistema{
        public $id_diadema;
        public $descripcion;
        public $fecha_entrega;
        public $no_empleado;
        public $id_cambio;
        public $id_ticket_diadema;

        public function getNo_empleado(){
            return $this->no_empleado;
        }
 
        public function setNo_empleado($no_empleado){
                $this->no_empleado = $no_empleado;
                return $this;
        }

            /**
         * Get the value of id_diadema
         */ 
        public function getId_diadema()
        {
                return $this->id_diadema;
        }

        /**
         * Set the value of id_diadema
         *
         * @return  self
         */ 
        public function setId_diadema($id_diadema)
        {
                $this->id_diadema = $id_diadema;

                return $this;
        }

        /**
         * Get the value of descripcion
         */ 
        public function getDescripcion()
        {
                return $this->descripcion;
        }

        /**
         * Set the value of descripcion
         *
         * @return  self
         */ 
        public function setDescripcion($descripcion)
        {
                $this->descripcion = $descripcion;

                return $this;
        }

        /**
         * Get the value of fecha_entrega
         */ 
        public function getFecha_entrega()
        {
                return $this->fecha_entrega;
        }

        /**
         * Set the value of fecha_entrega
         *
         * @return  self
         */ 
        public function setFecha_entrega($fecha_entrega)
        {
                $this->fecha_entrega = $fecha_entrega;

                return $this;
        }

        /**
         * Get the value of id_cambio
         */ 
        public function getId_cambio()
        {
                return $this->id_cambio;
        }

        /**
         * Set the value of id_cambio
         *
         * @return  self
         */ 
        public function setId_cambio($id_cambio)
        {
                $this->id_cambio = $id_cambio;

                return $this;
        }

        /**
         * Get the value of id_ticket_diadema
         */ 
        public function getId_ticket_diadema()
        {
                return $this->id_ticket_diadema;
        }

        /**
         * Set the value of id_ticket_diadema
         *
         * @return  self
         */ 
        public function setId_ticket_diadema($id_ticket_diadema)
        {
                $this->id_ticket_diadema = $id_ticket_diadema;

                return $this;
        }
        

        //////////////////////////////////////// Metodos CRUD ////////////////////////////////////////


        //////////////////////////////////////// Metodo read ////////////////////////////////////////
        public function read(){
            $this->conexion();
            $sql = "SELECT d.id_ticket_diadema, 
            d.fecha_entrega,
            d.descripcion,
            (u.nombre_completo) as empleado,
            (c.descripcion) as cambio,
            dia.id_diadema
            FROM ticket_daidema d
            INNER JOIN usuario u on u.no_empleado=d.no_empleado
            INNER JOIN cambios c on c.id_cambio=d.id_cambio
            INNER JOIN diadema dia on dia.id_diadema=d.id_diadema;";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $datosTicketDiademas = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $datosTicketDiademas; 
        }

        //////////////////////////////////////// Metodo read One ////////////////////////////////////////
        public function readOne($id_ticket_diadema){
            $this->conexion();
            $sql = "SELECT d.id_ticket_diadema, 
            d.fecha_entrega,
            d.descripcion,
            (u.nombre_completo) as empleado,
            (c.descripcion) as cambio,
            dia.id_diadema
            FROM ticket_daidema d
            INNER JOIN usuario u on u.no_empleado=d.no_empleado
            INNER JOIN cambios c on c.id_cambio=d.id_cambio
            INNER JOIN diadema dia on dia.id_diadema=d.id_diadema
                        WHERE d.id_ticket_diadema = :id_ticket_diadema;";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':id_ticket_diadema', $id_ticket_diadema, PDO::PARAM_INT);
            $stmt->execute();
            $datosDia = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $datosDia = (isset($datosDia[0]))?$datosDia[0]:null;
            return $datosDia;
        }

        //////////////////////////////////////// Metodo Create ////////////////////////////////////////
        public function create($datosDia){
            $this->conexion();
            $sql = "INSERT INTO ticket_daidema (fecha_entrega, 
                                          descripcion, 
                                          no_empleado,
                                          id_cambio, 
                                          id_diadema) 
                           VALUES (now(), 
                                   :descripcion, 
                                   :no_empleado,
                                   :id_cambio, 
                                   :id_diadema)"; 
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':descripcion', $datosDia['descripcion'], PDO::PARAM_STR);
            $stmt -> bindParam(':no_empleado', $datosDia['no_empleado'], PDO::PARAM_INT);
            $stmt -> bindParam(':id_cambio', $datosDia['id_cambio'], PDO::PARAM_INT);
            $stmt -> bindParam(':id_diadema', $datosDia['id_diadema'], PDO::PARAM_STR);
            $rs = $stmt->execute();
            return  $stmt->rowCount();
        }

        //////////////////////////////////////// Metodo Update ////////////////////////////////////////
        public function update($datosTicketDiadema, $id_ticket_diadema){
            $this->conexion();
            $sql = "UPDATE ticket_daidema set 
                    descripcion = :descripcion,
                    no_empleado = :no_empleado,
                    id_cambio = :id_cambio,
                    id_diadema=:id_diadema
                    WHERE id_ticket_diadema = :id_ticket_diadema";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':descripcion', $datosTicketDiadema['descripcion'], PDO::PARAM_STR);
            $stmt -> bindParam(':no_empleado', $datosTicketDiadema['no_empleado'], PDO::PARAM_INT);
            $stmt -> bindParam(':id_cambio', $datosTicketDiadema['id_cambio'], PDO::PARAM_INT);
            $stmt -> bindParam('id_diadema', $datosTicketDiadema['id_diadema'], PDO::PARAM_STR);
            $stmt -> bindParam(':id_ticket_diadema', $id_ticket_diadema, PDO::PARAM_INT);
            $rs = $stmt->execute();
            return  $stmt->rowCount();
        }

        //////////////////////////////////////// Metodo Delete ////////////////////////////////////////
        public function delete($id_ticket_diadema){
            $this->conexion();
            $sql = "DELETE FROM ticket_daidema WHERE id_ticket_diadema = :id_ticket_diadema";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':id_ticket_diadema', $id_ticket_diadema, PDO::PARAM_INT);
            $rs = $stmt->execute();
            return $stmt->rowCount();
        }
    }
    $ticketDiadema = new TicketDiadema();
?>