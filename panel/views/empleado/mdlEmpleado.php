<?php
    require_once('../../sistemas.php');

    class Empleado extends Sistema{
        public $no_empleado;
        public $nombre_completo;
        public $id_un;
        public $id_puesto;
 
        public function getNo_empleado()
        {
                return $this->no_empleado;
        }

        public function setNo_empleado($no_empleado)
        {
                $this->no_empleado = $no_empleado;

                return $this;
        }

        public function getNombre_completo()
        {
                return $this->nombre_completo;
        }

        public function setNombre_completo($nombre_completo)
        {
                $this->nombre_completo = $nombre_completo;

                return $this;
        }

        public function getId_un()
        {
                return $this->id_un;
        }

        public function setId_un($id_un)
        {
                $this->id_un = $id_un;

                return $this;
        }

        public function getId_puesto()
        {
                return $this->id_puesto;
        }

        public function setId_puesto($id_puesto)
        {
                $this->id_puesto = $id_puesto;

                return $this;
        }

        //////////////////////////////////////// Metodos CRUD ////////////////////////////////////////


        //////////////////////////////////////// Metodo read ////////////////////////////////////////
        public function read(){
            $this->conexion();
            $sql = "SELECT u.no_empleado, 
                            u.nombre_completo,
                            (p.nombre) AS puesto,
                            (un.nombre) AS Un
                    FROM usuario u
                    INNER JOIN puestos p ON p.id_puesto = u.id_puesto
                    INNER JOIN un un ON un.id_un = u.id_un;";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $datosEmpleados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $datosEmpleados; 
        }

        //////////////////////////////////////// Metodo read One ////////////////////////////////////////
        public function readOne($no_empleado){
            $this->conexion();
            $sql = "SELECT u.no_empleado, 
                            u.nombre_completo,
                            (p.nombre) AS puesto,
                            (un.nombre) AS Un
                    FROM usuario u
                    INNER JOIN puestos p ON p.id_puesto = u.id_puesto
                    INNER JOIN un un ON un.id_un = u.id_un
                    WHERE no_empleado = :no_empleado;";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':no_empleado', $no_empleado, PDO::PARAM_INT);
            $stmt->execute();
            $datosEmpleado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $datosEmpleado = (isset($datosEmpleado[0]))?$datosEmpleado[0]:null;
            return $datosEmpleado;
        }

        //////////////////////////////////////// Metodo Create ////////////////////////////////////////
        public function create($datosEmpleado){
            $this->conexion();
            $sql = "INSERT INTO usuario (no_empleado,
                                        nombre_completo,
                                        id_puesto,
                                        id_un) 
                            VALUES (:no_empleado,
                                        :nombre_completo,
                                        :id_puesto,
                                        :id_un)"; 
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':no_empleado', $datosEmpleado['no_empleado'], PDO::PARAM_INT);
            $stmt -> bindParam(':nombre_completo', $datosEmpleado['nombre_completo'], PDO::PARAM_STR);
            $stmt -> bindParam(':id_puesto', $datosEmpleado['id_puesto'], PDO::PARAM_INT);
            $stmt -> bindParam(':id_un', $datosEmpleado['id_un'], PDO::PARAM_INT);
            $rs = $stmt->execute();
            return  $stmt->rowCount();
        }

        //////////////////////////////////////// Metodo Update ////////////////////////////////////////
        public function update($datosEmpleado, $no_empleado){
            $this->conexion();
            $sql = "UPDATE usuario set 
                    nombre_completo = :nombre_completo,
                    id_puesto = :id_puesto,
                    id_un = :id_un
                    WHERE no_empleado = :no_empleado";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':nombre_completo', $datosEmpleado['nombre_completo'], PDO::PARAM_STR);
            $stmt -> bindParam(':id_puesto', $datosEmpleado['id_puesto'], PDO::PARAM_INT);
            $stmt -> bindParam(':id_un', $datosEmpleado['id_un'], PDO::PARAM_INT);
            $stmt -> bindParam(':no_empleado', $no_empleado, PDO::PARAM_INT);
            $rs = $stmt->execute();
            return  $stmt->rowCount();
        }

        //////////////////////////////////////// Metodo Delete ////////////////////////////////////////
        public function delete($no_empleado){
            $this->conexion();
            $sql = "DELETE FROM usuario WHERE no_empleado = :no_empleado";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':no_empleado', $no_empleado, PDO::PARAM_INT);
            $rs = $stmt->execute();
            return $stmt->rowCount();
        }
    }

    //////////////////////////////////////// Metodos CRUD ////////////////////////////////////////

    $empleado = new Empleado();
?>