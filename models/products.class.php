<?php
class products extends connect
{

    function __construct($connect)
    {
        parent::__construct($connect);
    }

    public function inputListeProduit(){
        $input = array();
        $req = $this ->_connect -> query("SELECT * FROM `ListeProduit` WHERE Actif = 1");
        $res = $req -> fetchAll();
        foreach ($res as $r){
            $input[$r['Name'] ]= $r['Id'];
        }
        return $input;
    }

    public function listeProduit($id){
        $name = "";
        $req = $this->_connect -> query("SELECT * FROM `ListeProduit` WHERE Id='$id' AND Actif='1'");
        $res = $req -> fetchAll();
        foreach($res as $r){
            $name = $r['Name'];
        }
        return $name;
    }

    public function verifListeProduit($id){
        $req = $this -> _connect -> query("SELECT * FROM `ListeProduit` WHERE Id='$id' ");
        $res = $req -> rowCount();
        return $res;
    }

    public function idUser($id){
        $req = $this -> _connect -> query("SELECT * FROM `Users` WHERE Id = '$id'");
        $res = $req->fetchAll();
        return $res;
    }

    public function idUserFarmer($id){
        $req = $this -> _connect -> query("SELECT * FROM `Farmers` WHERE Id = '$id'");
        $res = $req->fetchAll();
        return $res;
    }

    public function rowCountPage(){
        $explode = explode('/', $_GET['p']);
        $nbprod = "1";
        if(!$explode[1]) {
            $req = $this->_connect->query("SELECT * FROM `Produit` WHERE Actif ='1'");
            $nb = $req->rowCount();
            if($nb < 6) {
                $nbprod = 0;
            } else {
                $nbprod = $nb / 5;
            }
        }

        return $nbprod;
    }

    public function displayProducts($limit = 5)
    {
        $explode = explode('/', $_GET['p']);
        if ($explode[1]) {
            $offset = 5 * $explode[1];
            if ($explode[1] != 0) {
                $offset = $offset - 5;
            }
        } else {
            $offset = 0;
        }

        $req = $this->_connect->query("SELECT * FROM `Produit` WHERE Actif='1' LIMIT " . $limit . " OFFSET " . $offset);
        $res = $req->fetchAll();
        return $res;
    }


    public function searchFilters($query,$limit = 10){
        $explode = explode('/', $_GET['p']);
        if ($explode[6]) {
            $offset = 10 * $explode[6];
            if ($explode[6] != 0) {
                $offset = $offset - 10;
            }
        } else {
            $offset = 0;
        }
        $req = $this -> _connect -> query("SELECT * FROM `Produit` $query AND Actif= '1' LIMIT $limit OFFSET $offset");
        $res = $req->fetchAll();
        return $res;
    }

    public function selectOneProduct($id){
        $req = $this -> _connect -> query("SELECT * FROM `Produit` WHERE Id='$id' AND Actif='1'");
        $res = $req -> fetchAll();
        return $res;
    }

    public function verifOneProduct($id){
        $req = $this -> _connect -> query("SELECT * FROM `Produit` WHERE Id='$id' AND Actif='1'");
        $res = $req -> rowCount();
        return $res;
    }

    public function flagRegion($code){
        $req = $this -> _connect -> query("SELECT * FROM `Departement` WHERE departement_code = '$code'");
        $res = $req -> fetchAll();
        return $res;
    }

    public function AddProducts($iduser,$Price,$Products,$UnitWeight,$NbStore,$Biography){

        $date = date("Y-m-d");
        $reqQuality = $this -> _connect -> query("SELECT * FROM `Farmers` WHERE IdUser= '$iduser'");
        $resQuality = $reqQuality->fetchAll();

        foreach($resQuality as $r){
            $idfarmer = $r['Id'];
            $Quality = $r['Type'];
            $region = $r['Region'];
        }
        $addProducts = $this -> _connect -> exec("INSERT INTO `Produit`(`IdListeProduit`, `Prix`, `Biographie`, `Qualiter`, `UnitWeight`, `NbStock`, `IdFarmers`, `Region`, `CreationDate`, `Actif`) VALUES ('$Products','$Price','$Biography','$Quality','$UnitWeight','$NbStore','$idfarmer','$region','$date','0')");
    }

    public function AddProductsFarmers($idUser,$Products){
        $reqFarmers = $this -> _connect -> query("SELECT * FROM `Farmers` WHERE IdUser= '$idUser'");
        $resFarmers = $reqFarmers->fetchAll();

        foreach($resFarmers as $r){
            $idfarmer = $r['Id'];
            $region = $r['Region'];
        }
        $add = $this -> _connect -> exec("INSERT INTO `FarmerProduits`(`IdUser`, `IdFarmer`, `IdListeProduit`, `Region`) VALUES ('$idUser','$idfarmer','$Products','$region')");
    }







}