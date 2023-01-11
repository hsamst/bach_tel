<?php
    require_once('../../sistemas.php');

    class Telefono extends Sistema{
        public $imei;
        public $accesosrios;
        public $linea;
        public $id_marca;
        public $iccid;
        public $id_plan;

        public function getId_marca(){
            return $this->id_marca;
        }
 
        public function setId_marca($id_marca){
                $this->id_marca = $id_marca;
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
         * Get the value of accesosrios
         */ 
        public function getAccesosrios()
        {
                return $this->accesosrios;
        }

        /**
         * Set the value of accesosrios
         *
         * @return  self
         */ 
        public function setAccesosrios($accesosrios)
        {
                $this->accesosrios = $accesosrios;

                return $this;
        }

        /**
         * Get the value of linea
         */ 
        public function getLinea()
        {
                return $this->linea;
        }

        /**
         * Set the value of linea
         *
         * @return  self
         */ 
        public function setLinea($linea)
        {
                $this->linea = $linea;

                return $this;
        }

        /**
         * Get the value of iccid
         */ 
        public function getIccid()
        {
                return $this->iccid;
        }

        /**
         * Set the value of iccid
         *
         * @return  self
         */ 
        public function setIccid($iccid)
        {
                $this->iccid = $iccid;

                return $this;
        }

        /**
         * Get the value of id_plan
         */ 
        public function getId_plan()
        {
                return $this->id_plan;
        }

        /**
         * Set the value of id_plan
         *
         * @return  self
         */ 
        public function setId_plan($id_plan)
        {
                $this->id_plan = $id_plan;

                return $this;
        }
        

        //////////////////////////////////////// Metodos CRUD ////////////////////////////////////////


        //////////////////////////////////////// Metodo read ////////////////////////////////////////
        public function read(){
            $this->conexion();
            $sql = "SELECT t.imei, 
                     t.linea,
                     t.accesosrios,
                     (ma.nombre_marca) as marca,
                     s.iccid,
                     (p.nombre) as plan
                     FROM telefono t
                     INNER JOIN marca ma on ma.id_marca=t.id_marca
                     INNER JOIN sim s on s.iccid=t.iccid,
                     INNER JOIN plan_datos p on p.id_plan=t.id_plan;";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $datosTelefonos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $datosTelefonos; 
        }

        //////////////////////////////////////// Metodo read One ////////////////////////////////////////
        public function readOne($imei){
            $this->conexion();
            $sql = "SELECT t.imei, 
                            t.linea,
                            t.accesosrios,
                            (ma.nombre_marca) as marca,
                            s.iccid,
                            (p.nombre) as plan
                            FROM telefono t
                        INNER JOIN marca ma on ma.id_marca=t.id_marca
                        INNER JOIN sim s on s.iccid=t.iccid,
                        INNER JOIN plan_datos p on p.id_plan=t.id_plan
                        WHERE m.imei = :imei;";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':imei', $imei, PDO::PARAM_INT);
            $stmt->execute();
            $datosTelefono = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $datosTelefono = (isset($datosTelefono[0]))?$datosTelefono[0]:null;
            return $datosTelefono;
        }

        //////////////////////////////////////// Metodo Create ////////////////////////////////////////
        public function create($datosTelefono){
            $this->conexion();
            $sql = "INSERT INTO telefono (imei, linea, accesosrios, id_marca, iccid, id_plan) VALUES (:imei, :linea, :accesosrios, :id_marca, :iccid, :id_plan)"; 
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':imei', $datosTelefono['imei'], PDO::PARAM_INT);
            $stmt -> bindParam(':linea', $datosTelefono['linea'], PDO::PARAM_INT);
            $stmt -> bindParam(':accesosrios', $datosTelefono['accesosrios'], PDO::PARAM_STR);
            $stmt -> bindParam(':id_marca', $datosTelefono['id_marca'], PDO::PARAM_INT);
            $stmt -> bindParam(':iccid', $datosTelefono['iccid'], PDO::PARAM_INT);
            $stmt -> bindParam(':id_plan', $datosTelefono['id_plan'], PDO::PARAM_INT);
            $rs = $stmt->execute();
            return  $stmt->rowCount();
        }

        //////////////////////////////////////// Metodo Update ////////////////////////////////////////
        public function update($datosTelefono, $imei){
            $this->conexion();
            $sql = "UPDATE telefono set 
                    imei = :imei,
                    linea = :linea,
                    accesosrios = :accesosrios,
                    id_marca = :id_marca,
                    iccid = :iccid,
                    id_plan = :id_plan
                    WHERE imei = :imei";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':imei', $datosTelefono['imei'], PDO::PARAM_INT);
            $stmt -> bindParam(':linea', $datosTelefono['linea'], PDO::PARAM_INT);
            $stmt -> bindParam(':accesosrios', $datosTelefono['accesosrios'], PDO::PARAM_STR);
            $stmt -> bindParam(':id_marca', $datosTelefono['id_marca'], PDO::PARAM_INT);
            $stmt -> bindParam(':iccid', $datosTelefono['iccid'], PDO::PARAM_INT);
            $stmt -> bindParam(':id_plan', $datosTelefono['id_plan'], PDO::PARAM_INT);
            $stmt -> bindParam(':imei', $imei, PDO::PARAM_INT);
            $rs = $stmt->execute();
            return  $stmt->rowCount();
        }

        //////////////////////////////////////// Metodo Delete ////////////////////////////////////////
        public function delete($imei){
            $this->conexion();
            $sql = "DELETE FROM telefono WHERE imei = :imei";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':imei', $imei, PDO::PARAM_INT);
            $rs = $stmt->execute();
            return $stmt->rowCount();
        }
    }

    //////////////////////////////////////// Metodos CRUD ////////////////////////////////////////

    $telefono = new Telefono();
?>