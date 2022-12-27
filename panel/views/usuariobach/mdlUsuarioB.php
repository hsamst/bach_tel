<?php
    require_once('../../sistemas.php');

    class UsuarioBach extends Sistema{
        public $id_usuario_bach;
        public $corrreo;
        public $contrasena;
        public $tocken;

        public function getId_usuario_bach(){
            return $this->id_usuario_bach;
        }
 
        public function setId_usuario_bach($id_usuario_bach){
                $this->id_usuario_bach = $id_usuario_bach;
                return $this;
        }

        public function getCorrreo()
        {
                return $this->corrreo;
        }

        public function setCorrreo($corrreo)
        {
                $this->corrreo = $corrreo;

                return $this;
        }

        public function getContrasena(){
            return $this->contrasena;
        }

        public function setContrasena($contrasena){
            $this->contrasena = $contrasena;
            return $this;
        }

        public function getTocken()
        {
                return $this->tocken;
        }

        public function setTocken($tocken)
        {
                $this->tocken = $tocken;

                return $this;
        }

        //////////////////////////////////////// Metodos CRUD ////////////////////////////////////////


        //////////////////////////////////////// Metodo read ////////////////////////////////////////
        public function read(){
            $this->conexion();
            $sql = "SELECT id_usuario_bach,
                    corrreo, 
                     contrasena,
                     tocken
                     FROM usuariobach;";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $datosUsuarioBs = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $datosUsuarioBs; 
        }

        //////////////////////////////////////// Metodo read One ////////////////////////////////////////
        public function readOne($id_usuario_bach){
            $this->conexion();
            $sql = "SELECT corrreo, contrasena, tocken  
                        from usuariobach
                        WHERE id_usuario_bach = :id_usuario_bach;";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':id_usuario_bach', $id_usuario_bach, PDO::PARAM_INT);
            $stmt->execute();
            $datosUsuarioB = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $datosUsuarioB = (isset($datosUsuarioB[0]))?$datosUsuarioB[0]:null;
            return $datosUsuarioB;
        }

        //////////////////////////////////////// Metodo Create ////////////////////////////////////////
        public function create($datosUsuarioB){
            $this->conexion();
            $sql = "INSERT INTO usuariobach (corrreo,contrasena, tocken) VALUES (:corrreo, :contrasena, :tocken)"; 
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':corrreo', $datosUsuarioB['corrreo'], PDO::PARAM_STR);
            $stmt -> bindParam(':contrasena', $datosUsuarioB['contrasena'], PDO::PARAM_STR);
            $stmt -> bindParam(':tocken', $datosUsuarioB['tocken'], PDO::PARAM_STR);
            $rs = $stmt->execute();
            return  $stmt->rowCount();
        }

        //////////////////////////////////////// Metodo Update ////////////////////////////////////////
        public function update($datosUsuarioB, $id_usuario_bach){
            $this->conexion();
            $sql = "UPDATE usuariobach set 
                    corrreo=:corrreo,
                    contrasena = :contrasena,
                    tocken= :tocken 
                    WHERE id_usuario_bach = :id_usuario_bach";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':corrreo', $datosUsuarioB['corrreo'], PDO::PARAM_STR);
            $stmt -> bindParam(':contrasena', $datosUsuarioB['contrasena'], PDO::PARAM_STR);
            $stmt -> bindParam(':tocken', $datosUsuarioB['tocken'], PDO::PARAM_STR);
            $stmt -> bindParam(':id_usuario_bach', $id_usuario_bach, PDO::PARAM_INT);
            $rs = $stmt->execute();
            return  $stmt->rowCount();
        }

        //////////////////////////////////////// Metodo Delete ////////////////////////////////////////
        public function delete($id_usuario_bach){
            $this->conexion();
            $sql = "DELETE FROM usuariobach WHERE id_usuario_bach = :id_usuario_bach";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':id_usuario_bach', $id_usuario_bach, PDO::PARAM_INT);
            $rs = $stmt->execute();
            return $stmt->rowCount();
        }

    }

    //////////////////////////////////////// Metodos CRUD ////////////////////////////////////////

    $usuarioB = new UsuarioBach();
?>