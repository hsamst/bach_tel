<?php
    class Sistema{
        public $con;

        public function conexion(){
            $dbDriver = "mysql";
            $dbHost = "localhost";
            $dbUser = "telefonia";
            $dbPass = "t3l3c0mT";
            $db = "telefonia";
            /*$this->con = new mysqli($dbHost,$dbUser,$dbPass,$db);*/
            $this->con = new PDO($dbDriver.':host='.$dbHost.';dbname='.$db, $dbUser, $dbPass);
        }

        public function query($sql){
            $this->connect();
            $rs = $this->con->query($sql);
            return $rs;
        }
    }

    $sistema = new Sistema();
?>