<?php
    require_once('../../sistemas.php');

    class Plan extends Sistema{
        public $id_plan;
        public $nombre;
        public $descripcion;

        public function getId_plan(){
            return $this->id_plan;
        }
 
        public function setId_plan($id_plan){
                $this->id_plan = $id_plan;
                return $this;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function setNombre($nombre){
            $this->nombre = $nombre;
            return $this;
        }
         
        public function getDescripcion()
        {
                return $this->descripcion;
        }

        public function setDescripcion($descripcion)
        {
                $this->descripcion = $descripcion;

                return $this;
        }

        //////////////////////////////////////// Metodos CRUD ////////////////////////////////////////


        //////////////////////////////////////// Metodo read ////////////////////////////////////////
        public function read(){
            $this->conexion();
            $sql = "SELECT id_plan, 
                     nombre, descripcion
                     FROM plan_datos;";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $datosPlans = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $datosPlans; 
        }

        //////////////////////////////////////// Metodo read One ////////////////////////////////////////
        public function readOne($id_plan){
            $this->conexion();
            $sql = "SELECT nombre, descripcion  
                        from plan_datos
                        WHERE id_plan = :id_plan;";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':id_plan', $id_plan, PDO::PARAM_INT);
            $stmt->execute();
            $datosPlan = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $datosPlan = (isset($datosPlan[0]))?$datosPlan[0]:null;
            return $datosPlan;
        }

        //////////////////////////////////////// Metodo Create ////////////////////////////////////////
        public function create($datosPlan){
            $this->conexion();
            $sql = "INSERT INTO plan_datos (nombre, descripcion) VALUES (:nombre, :descripcion)"; 
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':nombre', $datosPlan['nombre'], PDO::PARAM_STR);
            $stmt -> bindParam(':descripcion', $datosPlan['descripcion'], PDO::PARAM_STR);
            $rs = $stmt->execute();
            return  $stmt->rowCount();
        }

        //////////////////////////////////////// Metodo Update ////////////////////////////////////////
        public function update($datosPlan, $id_plan){
            $this->conexion();
            $sql = "UPDATE plan_datos set 
                    nombre = :nombre,
                    descripcion = :descripcion
                    WHERE id_plan = :id_plan";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':nombre', $datosPlan['nombre'], PDO::PARAM_STR);
            $stmt -> bindParam(':descripcion', $datosPlan['descripcion'], PDO::PARAM_STR);
            $stmt -> bindParam(':id_plan', $id_plan, PDO::PARAM_INT);
            $rs = $stmt->execute();
            return  $stmt->rowCount();
        }

        //////////////////////////////////////// Metodo Delete ////////////////////////////////////////
        public function delete($id_plan){
            $this->conexion();
            $sql = "DELETE FROM plan_datos WHERE id_plan = :id_plan";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':id_plan', $id_plan, PDO::PARAM_INT);
            $rs = $stmt->execute();
            return $stmt->rowCount();
        }

    }

    //////////////////////////////////////// Metodos CRUD ////////////////////////////////////////

    $plan = new Plan();
?>