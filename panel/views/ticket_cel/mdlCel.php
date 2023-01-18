<?php
    require_once('../../sistemas.php');

    class Celular extends Sistema{
        public $imei;
        public $descripcion;
        public $fecha_entrega;
        public $no_empleado;
        public $id_cambio;
        public $id_ticket_cel;

        public function getNo_empleado(){
            return $this->no_empleado;
        }
 
        public function setNo_empleado($no_empleado){
                $this->no_empleado = $no_empleado;
                return $this;
        }

            /**
         * Get the value of imei
         */ 
        public function getImei()
        {
                return $this->imei;
        }

        /**
         * Set the value of imei
         *
         * @return  self
         */ 
        public function setImei($imei)
        {
                $this->imei = $imei;

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
         * Get the value of id_ticket_cel
         */ 
        public function getId_ticket_cel()
        {
                return $this->id_ticket_cel;
        }

        /**
         * Set the value of id_ticket_cel
         *
         * @return  self
         */ 
        public function setId_ticket_cel($id_ticket_cel)
        {
                $this->id_ticket_cel = $id_ticket_cel;

                return $this;
        }
        

        //////////////////////////////////////// Metodos CRUD ////////////////////////////////////////


        //////////////////////////////////////// Metodo read ////////////////////////////////////////
        public function read(){
            $this->conexion();
            $sql = "SELECT t.id_ticket_cel, 
            t.fecha_entrega,
            t.descripcion,
            (u.nombre_completo) as empleado,
            tel.imei,
            (c.descripcion) as cambio
            FROM ticket_cel t
            INNER JOIN usuario u on u.no_empleado=t.no_empleado
            INNER JOIN cambios c on c.id_cambio=t.id_cambio
            INNER JOIN telefonos tel on tel.imei=t.imei;";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $datosCels = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $datosCels; 
        }

        //////////////////////////////////////// Metodo read One ////////////////////////////////////////
        public function readOne($id_ticket_cel){
            $this->conexion();
            $sql = "SELECT t.id_ticket_cel, 
            t.fecha_entrega,
            t.descripcion,
            (u.nombre_completo) as empleado,
            tel.imei,
            (c.descripcion) as cambio
            FROM ticket_cel t
            INNER JOIN usuario u on u.no_empleado=t.no_empleado
            INNER JOIN cambios c on c.id_cambio=t.id_cambio
            INNER JOIN telefonos tel on tel.imei=t.imei
                        WHERE t.id_ticket_cel = :id_ticket_cel;";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':id_ticket_cel', $id_ticket_cel, PDO::PARAM_INT);
            $stmt->execute();
            $datosCel = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $datosCel = (isset($datosCel[0]))?$datosCel[0]:null;
            return $datosCel;
        }

        //////////////////////////////////////// Metodo Create ////////////////////////////////////////
        public function create($datosCel){
            $this->conexion();
            $sql = "INSERT INTO ticket_cel (fecha_entrega, 
                                          descripcion, 
                                          no_empleado, 
                                          imei,
                                          id_cambio) 
                           VALUES (:fecha_entrega, 
                                   :descripcion, 
                                   :no_empleado, 
                                   :imei,
                                   :id_cambio)"; 
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':fecha_entrega', $datosCel['fecha_entrega'], PDO::PARAM_STR);
            $stmt -> bindParam(':descripcion', $datosCel['descripcion'], PDO::PARAM_STR);
            $stmt -> bindParam(':no_empleado', $datosCel['no_empleado'], PDO::PARAM_INT);
            $stmt -> bindParam(':imei', $datosCel['imei'], PDO::PARAM_STR);
            $stmt -> bindParam(':id_cambio', $datosCel['id_cambio'], PDO::PARAM_INT);
            $rs = $stmt->execute();
            return  $stmt->rowCount();
        }

        //////////////////////////////////////// Metodo Update ////////////////////////////////////////
        public function update($datosCel, $id_ticket_cel){
            $this->conexion();
            $sql = "UPDATE ticket_cel set 
                    fecha_entrega = :fecha_entrega,
                    descripcion = :descripcion,
                    no_empleado = :no_empleado,
                    imei=:imei,
                    id_cambio = :id_cambio,
                    WHERE id_ticket_cel = :id_ticket_cel";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':fecha_entrega', $datosCel['fecha_entrega'], PDO::PARAM_STR);
            $stmt -> bindParam(':descripcion', $datosCel['descripcion'], PDO::PARAM_STR);
            $stmt -> bindParam(':no_empleado', $datosCel['no_empleado'], PDO::PARAM_INT);
            $stmt -> bindParam('imei', $datosCel['imei'], PDO::PARAM_STR);
            $stmt -> bindParam(':id_cambio', $datosCel['id_cambio'], PDO::PARAM_INT);
            $stmt -> bindParam(':id_ticket_cel', $id_ticket_cel, PDO::PARAM_INT);
            $rs = $stmt->execute();
            return  $stmt->rowCount();
        }

        //////////////////////////////////////// Metodo Delete ////////////////////////////////////////
        public function delete($id_ticket_cel){
            $this->conexion();
            $sql = "DELETE FROM ticket_cel WHERE id_ticket_cel = :id_ticket_cel";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':id_ticket_cel', $id_ticket_cel, PDO::PARAM_INT);
            $rs = $stmt->execute();
            return $stmt->rowCount();
        }
    }

    //////////////////////////////////////// Metodos CRUD ////////////////////////////////////////

    $celular = new Celular();
?>