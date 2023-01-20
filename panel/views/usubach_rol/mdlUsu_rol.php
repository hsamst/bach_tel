<?php
    require_once('../../sistema.php');

    class Registro extends Sistema{

        public function read(){
            $this->conexion();
            $sql = "SELECT u.id_usuariopri,
            u.correo as correo,
            r.id_rol,
            r.nombre_rol as rol,
            u.pass
     FROM usuariopri_rol ur
     INNER JOIN rol r on ur.id_rol = r.id_rol
     INNER JOIN usuariopri u on ur.id_usuariopri = u.id_usuariopri;";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $datosModelos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $datosModelos; 
        }

         //////////////////////////////////////// Metodo read One ////////////////////////////////////////
         public function readOne($id_usuariopri, $id_rol){
            $this->conexion();
            $sql = "SELECT  u.id_usuariopri,
                            u.correo as correo,
                            r.id_rol,
                            r.nombre_rol as rol
                     FROM usuariopri_rol ur
                     INNER JOIN rol r on ur.id_rol = r.id_rol
                     INNER JOIN usuariopri u on ur.id_usuariopri = u.id_usuariopri
                     WHERE ur.id_usuariopri = :id_usuariopri AND ur.id_rol = :id_rol; ";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':id_usuariopri', $id_usuariopri, PDO::PARAM_INT);
            $stmt -> bindParam(':id_rol', $id_rol, PDO::PARAM_INT);
            $stmt->execute();
            $datosUSROL = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $datosUSROL = (isset($datosUSROL[0]))?$datosUSROL[0]:null;
            return $datosUSROL;
        }

 
        public function register($datosAlta){
            if ($this->validarCorreo($datosAlta['correo'])) {
                if (isset($datosAlta['correo']) && isset($datosAlta['pass'])) {
                    $this->conexion();
                    $this->con->beginTransaction();
                    try{
                        $sql = "INSERT INTO usuariopri (correo,pass) VALUES (:correo, :pass)";
                        $stmt = $this->con->prepare($sql);
                        $datosAlta['pass'] = md5($datosAlta['pass']);
                        $stmt->bindParam(':correo', $datosAlta['correo'], PDO::PARAM_STR);
                        $stmt->bindParam(':pass', $datosAlta['pass'], PDO::PARAM_STR);
                        $rs = $stmt->execute();
                        if ($stmt->rowCount()>0) {
                            $sql =  "SELECT * FROM usuariopri WHERE correo = :correo";
                            $stmt = $this->con->prepare($sql);
                            $stmt->bindParam(':correo', $datosAlta['correo'], PDO::PARAM_STR);
                            $rs = $stmt->execute();
                            $usuariopri = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            $sql = "INSERT INTO usuariopri_rol(id_usuariopri,id_rol) VALUES (:id_usuariopri, :id_rol)";
                            $stmt = $this->con->prepare($sql);
                            $stmt->bindParam(':id_usuariopri', $usuariopri[0]['id_usuariopri'], PDO::PARAM_INT);
                            $stmt->bindParam(':id_rol', $datosAlta['id_rol'], PDO::PARAM_INT);
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
        public function update($datosUP,$id_rol,$id_usuariopri){
            $this->conexion();
                    $this->con->beginTransaction();
                    try{
                        $sql = "UPDATE usuariopri_rol 
                                SET id_rol = :id_rolM
                                WHERE id_rol = :id_rol AND id_usuariopri = :id_usuariopri;";
                        $stmt = $this->con->prepare($sql);
                        $stmt -> bindParam(':id_rolM', $datosUP['id_rol'], PDO::PARAM_INT);
                        $stmt->bindParam(':id_usuariopri', $id_usuariopri, PDO::PARAM_INT);
                        $stmt->bindParam(':id_rol', $id_rol, PDO::PARAM_INT);
                        $rs = $stmt->execute();
                        if ($stmt->rowCount()>= 0) {
                            $sql =  "UPDATE usuariopri
                                     SET pass = :passM 
                                     WHERE id_usuariopri = :id_usuariopri;";
                            $stmt = $this->con->prepare($sql);
                            $datosUP['pass'] = md5($datosUP['pass']);
                            $stmt -> bindParam(':passM', $datosUP['pass'], PDO::PARAM_STR);
                            $stmt->bindParam(':id_usuariopri', $id_usuariopri, PDO::PARAM_INT);
                            $rs = $stmt->execute();
                            $this->con->commit();
                        }
                        
                        return true;
                    }catch (Exception $e){
                    $this->con->rollback();
                    return false;
                    }
        }
        
        /* public function update($datosUP,$id_rol,$id_usuariopri){
            $this->conexion();
            $sql = "UPDATE usuariopri_rol 
                     SET id_rol = :id_rolM,
                     pass = :passM
                    WHERE id_rol = :id_rol AND id_usuariopri = :id_usuariopri;";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':id_rolM', $datosUP['id_rol'], PDO::PARAM_INT);
            $stmt -> bindParam(':passM', $datosUP['pass'], PDO::PARAM_STR);
            $stmt->bindParam(':id_usuariopri', $id_usuariopri, PDO::PARAM_INT);
            $stmt->bindParam(':id_rol', $id_rol, PDO::PARAM_INT);
            $rs = $stmt->execute();
            return $rs;
        } */


        public function DropRegister($id_usuariopri, $id_rol){
                if (isset($id_usuariopri) && isset($id_rol)) {
                    $this->conexion();
                    $this->con->beginTransaction();
                    try{
                        $sql = "DELETE FROM usuariopri_rol
                                WHERE id_rol = :id_rol 
                                    AND id_usuariopri = :id_usuariopri";
                        $stmt = $this->con->prepare($sql);
                        $stmt->bindParam(':id_rol', $id_rol, PDO::PARAM_INT);
                        $stmt->bindParam(':id_usuariopri', $id_usuariopri, PDO::PARAM_INT);
                        $rs = $stmt->execute();
                        if ($stmt->rowCount()>0) {
                            $sql =  "DELETE FROM usuariopri
                                     WHERE id_usuariopri = :id_usuariopri";
                            $stmt = $this->con->prepare($sql);
                            $stmt->bindParam(':id_usuariopri', $id_usuariopri, PDO::PARAM_INT);
                            $rs = $stmt->execute();
                            $usuariopri = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            $sql = "SELECT * FROM usuariopri";
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

    $registro = new Registro;
    
?>