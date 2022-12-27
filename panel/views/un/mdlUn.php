<?php
    require_once('../../sistemas.php');

    class Un extends Sistema{
        public $id_un;
        public $nombre;

        public function getId_un(){
            return $this->id_un;
        }
 
        public function setId_un($id_un){
                $this->id_un = $id_un;
                return $this;
        }

        public function getdNombre(){
            return $this->nombre;
        }

        public function setNombre($nombre){
            $this->nombre = $nombre;
            return $this;
        }

        //////////////////////////////////////// Metodos CRUD ////////////////////////////////////////


        //////////////////////////////////////// Metodo read ////////////////////////////////////////
        public function read(){
            $this->conexion();
            $sql = "SELECT id_un, 
                     nombre
                     FROM un;";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $datosUns = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $datosUns; 
        }

        //////////////////////////////////////// Metodo read One ////////////////////////////////////////
        public function readOne($id_un){
            $this->conexion();
            $sql = "SELECT nombre  
                        from un
                        WHERE id_un = :id_un;";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':id_un', $id_un, PDO::PARAM_INT);
            $stmt->execute();
            $datosUn = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $datosUn = (isset($datosUn[0]))?$datosUn[0]:null;
            return $datosUn;
        }

        //////////////////////////////////////// Metodo Create ////////////////////////////////////////
        public function create($datosUn){
            $this->conexion();
            $sql = "INSERT INTO un (nombre) VALUES (:nombre)"; 
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':nombre', $datosUn['nombre'], PDO::PARAM_STR);
            $rs = $stmt->execute();
            return  $stmt->rowCount();
        }

        //////////////////////////////////////// Metodo Update ////////////////////////////////////////
        public function update($datosUn, $id_un){
            $this->conexion();
            $sql = "UPDATE un set 
                    nombre = :nombre 
                    WHERE id_un = :id_un";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':nombre', $datosUn['nombre'], PDO::PARAM_STR);
            $stmt -> bindParam(':id_un', $id_un, PDO::PARAM_INT);
            $rs = $stmt->execute();
            return  $stmt->rowCount();
        }

        //////////////////////////////////////// Metodo Delete ////////////////////////////////////////
        public function delete($id_un){
            $this->conexion();
            $sql = "DELETE FROM un WHERE id_un = :id_un";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':id_un', $id_un, PDO::PARAM_INT);
            $rs = $stmt->execute();
            return $stmt->rowCount();
        }
    }

    //////////////////////////////////////// Metodos CRUD ////////////////////////////////////////

    $un = new Un();
?>