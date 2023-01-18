<?php
    require_once('../../sistemas.php');

    class Diadema extends Sistema{
        public $id_diadema;
        public $descripcion;
        public $id_marca;

        public function getId_diadema(){
            return $this->id_diadema;
        }
 
        public function setId_diadema($id_diadema){
                $this->id_diadema = $id_diadema;
                return $this;
        }

        public function getDescripcion(){
            return $this->descripcion;
        }

        public function setDescripcion($descripcion){
            $this->descripcion = $descripcion;
            return $this;
        }

        public function getId_marca()
        {
                return $this->id_marca;
        }

        public function setId_marca($id_marca)
        {
                $this->id_marca = $id_marca;

                return $this;
        }

        //////////////////////////////////////// Metodos CRUD ////////////////////////////////////////


        //////////////////////////////////////// Metodo read ////////////////////////////////////////
        public function read(){
            $this->conexion();
            $sql = "SELECT d.id_diadema, 
                     d.descripcion,
                     ma.nombre_marca 
                     FROM diadema d
                     INNER JOIN marca ma on ma.id_marca=d.id_marca;";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $datosDiademas = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $datosDiademas; 
        }

        //////////////////////////////////////// Metodo read One ////////////////////////////////////////
        public function readOne($id_diadema){
            $this->conexion();
            $sql = "SELECT d.id_diadema,
            d.descripcion, 
            ma.nombre_marca
         from diadema d
         INNER JOIN marca ma on ma.id_marca = d.id_marca
         WHERE d.id_diadema = :id_diadema";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':id_diadema', $id_diadema, PDO::PARAM_STR);
            $stmt->execute();
            $datosDiadema = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $datosDiadema = (isset($datosDiadema[0]))?$datosDiadema[0]:null;
            return $datosDiadema;
        }

        //////////////////////////////////////// Metodo Create ////////////////////////////////////////
        public function create($datosDiadema){
            $this->conexion();
            $sql = "INSERT INTO diadema (id_diadema, descripcion, id_marca) VALUES (:id_diadema, :descripcion, :id_marca)"; 
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':id_diadema', $datosDiadema['id_diadema'], PDO::PARAM_STR);
            $stmt -> bindParam(':descripcion', $datosDiadema['descripcion'], PDO::PARAM_STR);
            $stmt -> bindParam(':id_marca', $datosDiadema['id_marca'], PDO::PARAM_INT);
            $rs = $stmt->execute();
            return  $stmt->rowCount();
        }

        //////////////////////////////////////// Metodo Update ////////////////////////////////////////
        public function update($datosDiadema, $id_diadema){
            $this->conexion();
            $sql = "UPDATE diadema set 
                    descripcion = :descripcion,
                    id_marca = :id_marca
                    WHERE id_diadema = :id_diadema";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':descripcion', $datosDiadema['descripcion'], PDO::PARAM_STR);
            $stmt -> bindParam(':id_marca', $datosDiadema['id_marca'], PDO::PARAM_INT);
            $stmt -> bindParam(':id_diadema', $id_diadema, PDO::PARAM_STR);
            $rs = $stmt->execute();
            return  $stmt->rowCount();
        }

        //////////////////////////////////////// Metodo Delete ////////////////////////////////////////
        public function delete($id_diadema){
            $this->conexion();
            $sql = "DELETE FROM diadema WHERE id_diadema = :id_diadema";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':id_diadema', $id_diadema, PDO::PARAM_STR);
            $rs = $stmt->execute();
            return $stmt->rowCount();
        }

       
    }

    //////////////////////////////////////// Metodos CRUD ////////////////////////////////////////

    $diadema = new Diadema();
?>