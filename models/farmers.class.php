<?php
class farmers extends connect
{

    function __construct($connect)
    {
        parent::__construct($connect);
    }

    public function rowCountPageAgriculteur(){
        $explode = explode('/', $_GET['p']);
        $nbprod = "1";
        if(!$explode[1]) {
            $req = $this->_connect->query("SELECT * FROM `Farmers` ");
            $nb = $req->rowCount();
            if($nb < 6) {
                $nbprod = 0;
            } else {
                $nbprod = $nb / 5;
            }
        }

        return $nbprod;
    }

    public function searchFilters($query,$limit = 10){
        $explode = explode('/', $_GET['p']);
        if ($explode[4]) {
            $offset = 10 * $explode[4];
            if ($explode[4] != 0) {
                $offset = $offset - 10;
            }
        } else {
            $offset = 0;
        }
        $req = $this -> _connect -> query ("SELECT DISTINCT IdUser, IdFarmer, Region, IdListeProduit FROM `FarmerProduits` $query LIMIT  $limit  OFFSET  $offset ");
        $res = $req -> fetchAll();
        return $res;
    }

    public function displayFarmers($limit = 5) {
        $explode = explode('/', $_GET['p']);
        if ($explode[1]) {
            $offset = 5 * $explode[1];
            if ($explode[1] != 0) {
                $offset = $offset - 5;
            }
        } else {
            $offset = 0;
        }
        $req = $this -> _connect -> query ("SELECT * FROM `Farmers` LIMIT " . $limit . " OFFSET ". $offset);
        $res = $req -> fetchAll();
        return $res;
    }

    public function infoUser($idUser){
        $req = $this -> _connect -> query("SELECT * FROM `Users` WHERE Id='$idUser'");
        $res = $req -> fetchAll();
        return $res;
    }

    public function infoUserFarmers($id){
        $req = $this -> _connect -> query("SELECT * FROM `Farmers` WHERE Id ='$id'");
        $res = $req -> fetchAll();
        return $res;
    }

    public function infoUFarmers($id){
        $req = $this -> _connect -> query("SELECT * FROM `Farmers` WHERE IdUser ='$id'");
        $res = $req -> fetchAll();
        return $res;
    }

    public function listeProduitsFarmer($idFarmers){
        $req = $this -> _connect -> query("SELECT * FROM `Produit` WHERE IdFarmers ='$idFarmers' AND Actif = '1'");
        $res = $req -> fetchAll();
        return $res;
    }

    public function NameProduit($id){
        $name = "";
        $req = $this->_connect -> query("SELECT * FROM `ListeProduit` WHERE Id='$id' AND Actif='1'");
        $res = $req -> fetchAll();
        foreach($res as $r){
            $name = $r['Name'];
        }
        return $name;
    }

    public function verifFarmer($id){
        $req = $this -> _connect -> query("SELECT * FROM `Farmers` WHERE Id ='$id'");
        $nb = $req -> rowCount();
        return $nb;
    }

}