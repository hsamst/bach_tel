<?php
    require_once('../../sistemas.php');

    class Cambio extends Sistema{
        public $id_cambio;
        public $descripcion;

        public function getId_cambio(){
            return $this->id_cambio;
        }
 
        public function setId_cambio($id_cambio){
                $this->id_cambio = $id_cambio;
                return $this;
        }

        public function getdDescripcion(){
            return $this->descripcion;
        }

        public function setDescripcion($descripcion){
            $this->descripcion = $descripcion;
            return $this;
        }

        //////////////////////////////////////// Metodos CRUD ////////////////////////////////////////


        //////////////////////////////////////// Metodo read ////////////////////////////////////////
        public function read(){
            $this->conexion();
            $sql = "SELECT id_cambio, 
                     descripcion
                     FROM cambios;";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $datosCambios = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $datosCambios; 
        }

        //////////////////////////////////////// Metodo read One ////////////////////////////////////////
        public function readOne($id_cambio){
            $this->conexion();
            $sql = "SELECT descripcion  
                        from cambios
                        WHERE id_cambio = :id_cambio;";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':id_cambio', $id_cambio, PDO::PARAM_INT);
            $stmt->execute();
            $datosCambio = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $datosCambio = (isset($datosCambio[0]))?$datosCambio[0]:null;
            return $datosCambio;
        }

        //////////////////////////////////////// Metodo Create ////////////////////////////////////////
        public function create($datosCambio){
            $this->conexion();
            $sql = "INSERT INTO cambios (descripcion) VALUES (:descripcion)"; 
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':descripcion', $datosCambio['descripcion'], PDO::PARAM_STR);
            $rs = $stmt->execute();
            return  $stmt->rowCount();
        }

        //////////////////////////////////////// Metodo Update ////////////////////////////////////////
        public function update($datosCambio, $id_cambio){
            $this->conexion();
            $sql = "UPDATE cambios set 
                    descripcion = :descripcion 
                    WHERE id_cambio = :id_cambio";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':descripcion', $datosCambio['descripcion'], PDO::PARAM_STR);
            $stmt -> bindParam(':id_cambio', $id_cambio, PDO::PARAM_INT);
            $rs = $stmt->execute();
            return  $stmt->rowCount();
        }

        //////////////////////////////////////// Metodo Delete ////////////////////////////////////////
        public function delete($id_cambio){
            $this->conexion();
            $sql = "DELETE FROM cambios WHERE id_cambio = :id_cambio";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':id_cambio', $id_cambio, PDO::PARAM_INT);
            $rs = $stmt->execute();
            return $stmt->rowCount();
        }
    }

    //////////////////////////////////////// Metodos CRUD ////////////////////////////////////////

    $cambio = new Cambio();
?>