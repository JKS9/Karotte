<?php

class carts extends connect
{

    function __construct($connect)
    {
        parent::__construct($connect);
    }

    public function idLIsteProduit($id)
    {
        $req = $this->_connect->query("SELECT * FROM `Produit` WHERE Id='$id'");
        $res = $req->fetchAll();

        return $res;
    }

    public function NameAnnoceur($idFarmers)
    {
        $idUser = "";
        $name = "";
        $req = $this->_connect->query("SELECT Id, IdUser FROM `Farmers` WHERE Id='$idFarmers'");
        $res = $req->fetchAll();
        foreach ($res as $r) {
            $idUser = $r['IdUser'];
        }

        $reqUser = $this->_connect->query("SELECT * FROM `Users` WHERE Id ='$idUser'");
        $resUser = $reqUser->fetchAll();
        foreach ($resUser as $rUser) {
            $name = $rUser['Name'] . ' ' . $rUser['LastName'];
        }
        return $name;

    }

    public function selectCarts($iduser)
    {
        $req = $this->_connect->query("SELECT Cards.Id as card_id, Cards.Nb as card_quantity, Produit.Id as product_id, Produit.Prix as product_price, Produit.UnitWeight as product_weight, Users.Id as farmer_id, Farmers.Id as farmer_farmer_id, Users.Name as farmer_name, Users.LastName as farmer_lastname, ListeProduit.Id as lproduct_id, ListeProduit.Name as lproduct_name FROM `Cards` INNER JOIN Farmers ON Cards.idFarmerProduct = Farmers.Id INNER JOIN Users ON Farmers.IdUser = Users.Id INNER JOIN Produit ON Cards.IdProduct = Produit.Id INNER JOIN ListeProduit ON Produit.IdListeProduit = ListeProduit.Id WHERE Cards.Idusers = '$iduser' AND Cards.Status = '0' ");
        $res = $req->fetchAll();
        return $res;
    }

    public function checkidProduits($idproduits, $iduser)
    {
        $req = $this->_connect->query("SELECT * FROM `Cards` WHERE IdProduct = '$idproduits' AND Idusers ='$iduser'");
        $nb = $req->rowCount();

        return $nb;
    }

    public function checkidIdCards($idproduits, $iduser)
    {
        $Id = "";
        $req = $this->_connect->query("SELECT * FROM `Cards` WHERE IdProduct = '$idproduits' AND Idusers ='$iduser'");
        $res = $req->fetchAll();
        foreach ($res as $r) {
            $Id = $r['Id'];
        }
        return $Id;
    }

    public function checkidFarmer($idproduits)
    {
        $idfarmers = "";
        $req = $this->_connect->query("SELECT * FROM `Produit` WHERE Id = '$idproduits'");
        $res = $req->fetchAll();
        foreach ($res as $r) {
            $idfarmers = $r['IdFarmers'];
        }
        return $idfarmers;
    }

    public function updateCarts($nb, $idcarts)
    {
        $req = $this->_connect->exec("UPDATE `Cards` SET Nb = Nb+$nb WHERE Id='$idcarts'");
    }

    public function insertCarts($iduser, $nb, $idFarmerProduct, $idproduits)
    {
        $date = date("Y-m-d");
        $req = $this->_connect->query("INSERT INTO `Cards`(`IdProduct`, `idFarmerProduct`, `Nb`, `Idusers`, `Status`, `creationDate`) VALUES ('$idproduits','$idFarmerProduct','$nb','$iduser','0', '$date')");
    }

    public function cartsAddNb($id)
    {
        $req = $this->_connect->exec("UPDATE `Cards` SET Nb = Nb + 1 WHERE Id='$id'");
    }

    public function cartsNoNb($id){
        $nb = "";
        $req = $this -> _connect -> query("SELECT * FROM `Cards` WHERE Id='$id'");
        $res = $req -> fetchAll();
        foreach($res as $r){
            $nb = $r['Nb'];
        }

        if($nb == '1'){
            $delete = $this -> _connect -> exec("DELETE FROM `Cards` WHERE Id = '$id'");
        }else{
            $update = $this -> _connect -> exec("UPDATE `Cards` SET Nb = Nb - 1 WHERE Id='$id'");
        }
    }

    public function emptyCarts($user_id)
    {
        $req = $this->_connect->exec("DELETE FROM `Cards` WHERE Idusers='$user_id'");
    }

    public function selectAdresseLivraison($idUser)
    {
        $req = $this->_connect->query("SELECT * FROM `Delivery` WHERE IdUser = '$idUser' LIMIT 3");
        $res = $req->fetchAll();
        return $res;
    }


}

?>