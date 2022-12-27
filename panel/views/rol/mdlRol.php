<?php
    require_once('../../sistemas.php');

    class Rol extends Sistema{
        public $id_rol;
        public $nombre;

        public function getId_rol(){
            return $this->id_rol;
        }
 
        public function setId_rol($id_rol){
                $this->id_rol = $id_rol;
                return $this;
        }

        public function getNombre(){
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
            $sql = "SELECT id_rol, 
                     nombre
                     FROM rol;";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $datosRols = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $datosRols; 
        }

        //////////////////////////////////////// Metodo read One ////////////////////////////////////////
        public function readOne($id_rol){
            $this->conexion();
            $sql = "SELECT nombre  
                        from rol
                        WHERE id_rol = :id_rol;";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':id_rol', $id_rol, PDO::PARAM_INT);
            $stmt->execute();
            $datosRol = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $datosRol = (isset($datosRol[0]))?$datosRol[0]:null;
            return $datosRol;
        }

        //////////////////////////////////////// Metodo Create ////////////////////////////////////////
        public function create($datosRol){
            $this->conexion();
            $sql = "INSERT INTO rol (nombre) VALUES (:nombre)"; 
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':nombre', $datosRol['nombre'], PDO::PARAM_STR);
            $rs = $stmt->execute();
            return  $stmt->rowCount();
        }

        //////////////////////////////////////// Metodo Update ////////////////////////////////////////
        public function update($datosRol, $id_rol){
            $this->conexion();
            $sql = "UPDATE rol set 
                    nombre = :nombre 
                    WHERE id_rol = :id_rol";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':nombre', $datosRol['nombre'], PDO::PARAM_STR);
            $stmt -> bindParam(':id_rol', $id_rol, PDO::PARAM_INT);
            $rs = $stmt->execute();
            return  $stmt->rowCount();
        }

        //////////////////////////////////////// Metodo Delete ////////////////////////////////////////
        public function delete($id_rol){
            $this->conexion();
            $sql = "DELETE FROM rol WHERE id_rol = :id_rol";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':id_rol', $id_rol, PDO::PARAM_INT);
            $rs = $stmt->execute();
            return $stmt->rowCount();
        }
    }

    //////////////////////////////////////// Metodos CRUD ////////////////////////////////////////

    $rol = new Rol();
?>