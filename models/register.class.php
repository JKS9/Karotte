<?php
class register extends connect {

    function __construct($connect)
    {
        parent::__construct($connect);
    }

    public function test_input($data) {
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function calculateAge($date){
        $dob = new DateTime($date);
        $now = new DateTime();
        $difference = $now->diff($dob);
        $age = $difference->y;
        return $age;
    }

    public function verifEmail($email){
        $req = $this -> _connect ->query("SELECT Email FROM `Users` WHERE Email = '$email'");
        $nb = $req->rowCount();
        return $nb;
    }

    public function selectId($email){
        $req = $this -> _connect ->query("SELECT id FROM `Users` WHERE Email = '$email'");
        $res = $req->fetchAll();
        $id = "";
        foreach($res as $r){
            $id = $r['id'];
        }
        return $id;
    }

    public function displayRegion(){
        $req = $this -> _connect -> query("SELECT * FROM `Departement`");
        $res = $req -> fetchAll();
        $results = array();
        foreach ($res as $r){
            $results[$r['departement_code'] ]= $r['departement_nom'];
        }
        return $results;
    }

    public function register($name,$Firstname,$email,$password,$date,$type,$creationDate,$ip){
        $req = $this -> _connect -> exec("INSERT INTO `Users`(`Name`, `LastName`, `Email`, `Password`, `DateBirth`, `Type`, `CreationDate`, `CreationIp`) VALUES ('$name','$Firstname','$email','$password','$date','$type','$creationDate','$ip')");
    }

    public function registerFarmers($idUser,$Type,$Road,$RoadName,$roadNumber,$PostalCode,$City,$Region,$County,$Phone,$creationDate){
        $req = $this -> _connect -> exec("INSERT INTO `Farmers`(`IdUser`, `Type`, `Road`, `RoadName`, `roadNumber`, `PostalCode`, `City`, `Region`, `County`, `Phone`, `creationDate`) VALUES ('$idUser','$Type','$Road','$RoadName','$roadNumber','$PostalCode','$City','$Region','$County','$Phone','$creationDate')");
    }


}
?>