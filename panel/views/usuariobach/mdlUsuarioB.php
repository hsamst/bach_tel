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
            
            if ($this->validarcorrreo($datosUsuarioB['corrreo'])) {
                if (isset($datosUsuarioB['corrreo']) && isset($datosUsuarioB['contrasena'])) {
                    $this->conexion();
                    $this->con->beginTransaction();
                    try{
                        $sql = "INSERT INTO usuariobach (corrreo,contrasena, tocken) VALUES (:corrreo, :contrasena, :tocken)"; 
                        $stmt = $this->con->prepare($sql);
                        $stmt -> bindParam(':corrreo', $datosUsuarioB['corrreo'], PDO::PARAM_STR);
                        $datosUsuarioB['contrasena'] = md5($datosUsuarioB['contrasena']);
                        $stmt -> bindParam(':contrasena', $datosUsuarioB['contrasena'], PDO::PARAM_STR);
                        $stmt -> bindParam(':tocken', $datosUsuarioB['tocken'], PDO::PARAM_STR);
                        $rs = $stmt->execute();
                        if ($stmt->rowCount()>0) {
                            $sql =  "SELECT * FROM usuariobach WHERE corrreo = :corrreo";
                            $stmt = $this->con->prepare($sql);
                            $stmt->bindParam(':corrreo', $datosUsuarioB['corrreo'], PDO::PARAM_STR);
                            $rs = $stmt->execute();
                            $Usuario_rol = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            $sql = "INSERT INTO usubach_rol (id_rol, id_usuario_bach) VALUES (2, :id_usuario_bach);";
                            $stmt = $this->con->prepare($sql);
                            $stmt->bindParam(':id_usuario_bach', $Usuario_rol[0]['id_usuario_bach'], PDO::PARAM_INT);
                            $rs = $stmt->execute();
                            $this->con->commit();
                        }
                        
                        return true;
                    }catch (Exception $e){
                    $this->con->rollback();
                    return false;
                    }
                }
            }
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
        //////////////////////////////credenciales del usuario

        public function credentials($corrreo){
            $_SESSION['corrreo'] = $corrreo;
            $sql = "SELECT r.nombre from usubach_rol ur 
            inner join rol r on ur.id_rol=r.id_rol 
                                INNER JOIN usuariobach us on ur.id_usuario_bach= us.id_usuario_bach
                                where us.corrreo=:corrreo" ;
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':corrreo', $corrreo, PDO::PARAM_STR);
            $stmt->execute();
            $datos=array();
            $_SESSION['roles']=array();
            $datos=$stmt -> fetchAll(PDO::FETCH_ASSOC);
            foreach($datos as $key => $value){
                array_push($_SESSION['roles'],$value['nombre']);
            }
            $_SESSION['validado'] = true;
        }

    }
    

    //////////////////////////////////////// Metodos CRUD ////////////////////////////////////////

    $usuarioB = new UsuarioBach();
?>