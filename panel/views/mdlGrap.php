<?php
    require_once('../sistemas.php');

    class Grap extends Sistema{

    //////////////////////////////////////// Metodos CRUD CELULAR ////////////////////////////////////////
    public function read(){
        $this->conexion();
        $sql = "SELECT t.id_ticket_cel, 
        t.fecha_entrega,
        t.descripcion,
        (u.nombre_completo) as empleado,
        tel.imei,
        (c.descripcion) as cambio
        FROM ticket_cel t
        INNER JOIN usuario u on u.no_empleado=t.no_empleado
        INNER JOIN cambios c on c.id_cambio=t.id_cambio
        INNER JOIN telefonos tel on tel.imei=t.imei
        LIMIT 3;";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $datosTicketCels = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $datosTicketCels; 
    }

        public function robos(){
            $this->conexion();
            $sql = "SELECT COUNT(*)as robo from ticket_cel WHERE id_cambio=1;";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $equiposRobo = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $equiposRobo;
        }
        public function reposicion(){
            $this->conexion();
            $sql = "SELECT COUNT(*)as reposicion from ticket_cel WHERE id_cambio=2;";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $equiposReposicion = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $equiposReposicion;
        }
        public function extravio(){
            $this->conexion();
            $sql = "SELECT COUNT(*)as extravio from ticket_cel WHERE id_cambio=3;";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $equiposExtravio = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $equiposExtravio;
        }
        public function nuevo(){
            $this->conexion();
            $sql = "SELECT COUNT(*)as nuevo from ticket_cel WHERE id_cambio=4;";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $equiposNuevo = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $equiposNuevo;
        }
        public function danoUs(){
            $this->conexion();
            $sql = "SELECT COUNT(*)as Dano_Usuario from ticket_cel WHERE id_cambio=5;";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $equiposDañoUs = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $equiposDañoUs;
        }
        public function danoEqui(){
            $this->conexion();
            $sql = "SELECT COUNT(*)as Dano_Equipo from ticket_cel WHERE id_cambio=6;";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $equiposDañoEq = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $equiposDañoEq;
        }
        //////////////////////////////////////// Metodos CRUD DIADEMA////////////////////////////////////////
        public function nuevoDia(){
            $this->conexion();
            $sql = "SELECT COUNT(*)as nuevo from ticket_daidema WHERE id_cambio=4;";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $equiposNuevoD = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $equiposNuevoD;
        }
        public function danoUsDia(){
            $this->conexion();
            $sql = "SELECT COUNT(*)as Dano_Usuario from ticket_daidema WHERE id_cambio=5;";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $equiposDañoUsD = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $equiposDañoUsD;
        }
        public function danoEquiDia(){
            $this->conexion();
            $sql = "SELECT COUNT(*)as Dano_Equipo from ticket_daidema WHERE id_cambio=6;";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $equiposDañoEqD = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $equiposDañoEqD;
        }
        public function reposicionDia(){
            $this->conexion();
            $sql = "SELECT COUNT(*)as reposicion from ticket_daidema WHERE id_cambio=2;";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $equiposReposicionD = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $equiposReposicionD;
        }
        public function roboDia(){
            $this->conexion();
            $sql = "SELECT COUNT(*)as robo from ticket_daidema WHERE id_cambio=1;";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $equiposRoboD = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $equiposRoboD;
        }
    }


    $graficas = new Grap();
?>