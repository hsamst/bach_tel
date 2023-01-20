<?php
    require_once('../../sistemas.php');

    class Usu_rol extends Sistema{

        public function read(){
            $this->conexion();
            $sql = "SELECT u.id_usuario_bach,
            u.corrreo as correo,
            r.id_rol,
            r.nombre as rol,
            u.contrasena
     FROM usubach_rol ur
     INNER JOIN rol r on ur.id_rol = r.id_rol
     INNER JOIN usuariobach u on ur.id_usuario_bach = u.id_usuario_bach;";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $datosUsuBachs = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $datosUsuBachs; 
        }

         //////////////////////////////////////// Metodo read One ////////////////////////////////////////
         public function readOne($id_usuario_bach, $id_rol){
            $this->conexion();
            $sql = "SELECT  u.id_usuario_bach,
                            u.corrreo as correo,
            r.id_rol,
            r.nombre as rol,
            u.contrasena
     FROM usubach_rol ur
     INNER JOIN rol r on ur.id_rol = r.id_rol
     INNER JOIN usuariobach u on ur.id_usuario_bach = u.id_usuario_bach
                     WHERE ur.id_usuario_bach = :id_usuario_bach AND ur.id_rol = :id_rol; ";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':id_usuario_bach', $id_usuario_bach, PDO::PARAM_INT);
            $stmt -> bindParam(':id_rol', $id_rol, PDO::PARAM_INT);
            $stmt->execute();
            $datosUSROL = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $datosUSROL = (isset($datosUSROL[0]))?$datosUSROL[0]:null;
            return $datosUSROL;
        }

 
        public function register($datosAdd){
            if ($this->validarCorrreo($datosAdd['corrreo'])) {
                if (isset($datosAdd['corrreo']) && isset($datosAdd['contrasena'])) {
                    $this->conexion();
                    $this->con->beginTransaction();
                    try{
                        $sql = "INSERT INTO usuariobach (corrreo,contrasena) VALUES (:corrreo, :contrasena)";
                        $stmt = $this->con->prepare($sql);
                        $datosAdd['contrasena'] = md5($datosAdd['contrasena']);
                        $stmt->bindParam(':corrreo', $datosAdd['corrreo'], PDO::PARAM_STR);
                        $stmt->bindParam(':contrasena', $datosAdd['contrasena'], PDO::PARAM_STR);
                        $rs = $stmt->execute();
                        if ($stmt->rowCount()>0) {
                            $sql =  "SELECT * FROM usuariobach WHERE corrreo = :corrreo";
                            $stmt = $this->con->prepare($sql);
                            $stmt->bindParam(':corrreo', $datosAdd['corrreo'], PDO::PARAM_STR);
                            $rs = $stmt->execute();
                            $usuario_bach = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            $sql = "INSERT INTO usubach_rol(id_usuario_bach,id_rol) VALUES (:id_usuario_bach, :id_rol)";
                            $stmt = $this->con->prepare($sql);
                            $stmt->bindParam(':id_usuario_bach', $usuario_bach[0]['id_usuario_bach'], PDO::PARAM_INT);
                            $stmt->bindParam(':id_rol', $datosAdd['id_rol'], PDO::PARAM_INT);
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
            return false;
            
        }


        //////////////////////////////////////// Metodo Update ////////////////////////////////////////
        public function update($datosUP,$id_rol,$id_usuario_bach){
            $this->conexion();
                    $this->con->beginTransaction();
                    try{
                        $sql = "UPDATE usubach_rol 
                                SET id_rol = :id_rolM
                                WHERE id_rol = :id_rol AND id_usuario_bach = :id_usuario_bach;";
                        $stmt = $this->con->prepare($sql);
                        $stmt -> bindParam(':id_rolM', $datosUP['id_rol'], PDO::PARAM_INT);
                        $stmt->bindParam(':id_usuario_bach', $id_usuario_bach, PDO::PARAM_INT);
                        $stmt->bindParam(':id_rol', $id_rol, PDO::PARAM_INT);
                        $rs = $stmt->execute();
                        if ($stmt->rowCount()>= 0) {
                            $sql =  "UPDATE usuariobach
                                     SET contrasena = :contrasenaM 
                                     WHERE id_usuario_bach = :id_usuario_bach;";
                            $stmt = $this->con->prepare($sql);
                            $datosUP['contrasena'] = md5($datosUP['contrasena']);
                            $stmt -> bindParam(':contrasenaM', $datosUP['contrasena'], PDO::PARAM_STR);
                            $stmt->bindParam(':id_usuario_bach', $id_usuario_bach, PDO::PARAM_INT);
                            $rs = $stmt->execute();
                            $this->con->commit();
                        }
                        
                        return true;
                    }catch (Exception $e){
                    $this->con->rollback();
                    return false;
                    }
        }
        
        /* public function update($datosUP,$id_rol,$id_usuario_bach){
            $this->conexion();
            $sql = "UPDATE usuario_bach_rol 
                     SET id_rol = :id_rolM,
                     contrasena = :contrasenaM
                    WHERE id_rol = :id_rol AND id_usuario_bach = :id_usuario_bach;";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':id_rolM', $datosUP['id_rol'], PDO::PARAM_INT);
            $stmt -> bindParam(':contrasenaM', $datosUP['contrasena'], PDO::PARAM_STR);
            $stmt->bindParam(':id_usuario_bach', $id_usuario_bach, PDO::PARAM_INT);
            $stmt->bindParam(':id_rol', $id_rol, PDO::PARAM_INT);
            $rs = $stmt->execute();
            return $rs;
        } */


        public function DropRegister($id_usuario_bach, $id_rol){
                if (isset($id_usuario_bach) && isset($id_rol)) {
                    $this->conexion();
                    $this->con->beginTransaction();
                    try{
                        $sql = "DELETE FROM usuario_bach_rol
                                WHERE id_rol = :id_rol 
                                    AND id_usuario_bach = :id_usuario_bach";
                        $stmt = $this->con->prepare($sql);
                        $stmt->bindParam(':id_rol', $id_rol, PDO::PARAM_INT);
                        $stmt->bindParam(':id_usuario_bach', $id_usuario_bach, PDO::PARAM_INT);
                        $rs = $stmt->execute();
                        if ($stmt->rowCount()>0) {
                            $sql =  "DELETE FROM usuario_bach
                                     WHERE id_usuario_bach = :id_usuario_bach";
                            $stmt = $this->con->prepare($sql);
                            $stmt->bindParam(':id_usuario_bach', $id_usuario_bach, PDO::PARAM_INT);
                            $rs = $stmt->execute();
                            $usuario_bach = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            $sql = "SELECT * FROM usuario_bach";
                            $stmt = $this->con->prepare($sql);
                            $rs = $stmt->execute();
                            $this->con->commit();
                        }
                        
                        return true;
                    }catch (Exception $e){
                    $this->con->rollback();
                    return false;
                    }
            }
            return false;
            
        }

       
    }

    $registro = new Usu_rol;
    
?>