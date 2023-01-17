<?php
    class Sistema{
        public $con;

        public function conexion(){
            $dbDriver = "mysql";
            $dbHost = "localhost";
            $dbUser = "telefonia";
            $dbcontrasena = "t3l3c0mT";
            $db = "telefonia";
            /*$this->con = new mysqli($dbHost,$dbUser,$dbcontrasena,$db);*/
            $this->con = new PDO($dbDriver.':host='.$dbHost.';dbname='.$db, $dbUser, $dbcontrasena);
        }

        public function query($sql){
            $this->conexion();
            $rs = $this->con->query($sql);
            return $rs;
        }

         //validar corrreo
         public function validarcorrreo($corrreo){
            if(filter_var($corrreo, FILTER_VALIDATE_EMAIL)){
                return true;
            }
            return false;
        }

        //Login
        public function login($corrreo,$contrasena){
            $this->conexion();

            if($this->validarcorrreo($corrreo)){
                $contrasena = md5($contrasena);
                $sql = "SELECT * FROM usuariobach 
                    WHERE corrreo = :corrreo 
                    and contrasena = :contrasena";
                $stmt = $this->con->prepare($sql);
                $stmt -> bindParam(':corrreo', $corrreo, PDO::PARAM_STR);
                $stmt -> bindParam(':contrasena', $contrasena, PDO::PARAM_STR);
                $stmt->execute();
                $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
                if(isset($datos[0])){
                    return true;
                }
                return false; 
            }
        }

        public function validarRol($rol){
            $roles = array();
            if(isset($_SESSION['roles'])){
                $roles = $_SESSION['roles'];
            }
            
            if(!in_array($rol,$roles)){
                require_once '../componentes/headerSinM.php';
                $this->message(0,"Usted no tiene el rol necesario, consulate al administrador" );
                require_once '../componentes/footer.php';
                die();
            }
        }


        //elimir la sesion 
        public function logOut(){
            unset($_SESSION);
            session_destroy();
        } 

    }

    $sistema = new Sistema();
?>