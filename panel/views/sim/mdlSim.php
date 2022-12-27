<?php
    require_once('../../sistemas.php');

    class Sim extends Sistema{
        public $iccid;
        public $region;

        public function getIccid(){
            return $this->iccid;
        }
 
        public function setIccid($iccid){
                $this->iccid = $iccid;
                return $this;
        }

        public function getdRegion(){
            return $this->region;
        }

        public function setRegion($region){
            $this->region = $region;
            return $this;
        }

        //////////////////////////////////////// Metodos CRUD ////////////////////////////////////////


        //////////////////////////////////////// Metodo read ////////////////////////////////////////
        public function read(){
            $this->conexion();
            $sql = "SELECT iccid, 
                     region
                     FROM sim;";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $datosSims = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $datosSims; 
        }

        //////////////////////////////////////// Metodo read One ////////////////////////////////////////
        public function readOne($iccid){
            $this->conexion();
            $sql = "SELECT iccid, region  
                        from sim
                        WHERE iccid = :iccid;";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':iccid', $iccid, PDO::PARAM_STR);
            $stmt->execute();
            $datosSim = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $datosSim = (isset($datosSim[0]))?$datosSim[0]:null;
            return $datosSim;
        }

        //////////////////////////////////////// Metodo Create ////////////////////////////////////////
        public function create($datosSim){
            $this->conexion();
            $sql = "INSERT INTO sim (iccid, region) VALUES (:iccid, :region)"; 
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':iccid', $datosSim['iccid'], PDO::PARAM_STR);
            $stmt -> bindParam(':region', $datosSim['region'], PDO::PARAM_STR);
            $rs = $stmt->execute();
            return  $stmt->rowCount();
        }

        //////////////////////////////////////// Metodo Update ////////////////////////////////////////
        public function update($datosSim, $iccid){
            $this->conexion();
            $sql = "UPDATE sim set 
                    region = :region 
                    WHERE iccid = :iccid";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':region', $datosSim['region'], PDO::PARAM_STR);
            $stmt -> bindParam(':iccid', $iccid, PDO::PARAM_STR);
            $rs = $stmt->execute();
            return  $stmt->rowCount();
        }

        //////////////////////////////////////// Metodo Delete ////////////////////////////////////////
        public function delete($iccid){
            $this->conexion();
            $sql = "DELETE FROM sim WHERE iccid = :iccid";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':iccid', $iccid, PDO::PARAM_STR);
            $rs = $stmt->execute();
            return $stmt->rowCount();
        }
    }

    //////////////////////////////////////// Metodos CRUD ////////////////////////////////////////

    $sim = new Sim();
?>