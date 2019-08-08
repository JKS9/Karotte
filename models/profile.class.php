<?php
class profile extends connect
{

    function __construct($connect)
    {
        parent::__construct($connect);
    }


    public function listeAddOneFarmer($idUser){
        $idFarmer = $this->infoIdFarmers($idUser);
        $req = $this -> _connect -> query("SELECT * FROM `Produit` WHERE IdFarmers = '$idFarmer' AND Actif ='1'");
        $res = $req -> fetchAll();
        return $res;
    }

    public function infoIdFarmers($idUser){
        $id= "";
        $req = $this -> _connect -> query("SELECT * FROM `Farmers`  WHERE IdUser = '$idUser'");
        $res = $req -> fetchAll();
        foreach($res as $r){
            $id = $r['Id'];
        }
        return $id;
    }

    public function infoFarmer($id){
        $req = $this -> _connect -> query("SELECT * FROM `Farmers`  WHERE Id = '$id'");
        $res = $req -> fetchAll();
        return $res;
    }

    public function infoDelivery($id){
        $req = $this -> _connect -> query("SELECT * FROM `Delivery` WHERE IdUser = '$id' AND Actif='1'");
        $res = $req -> fetchAll();
        return $res;
    }

    public function infoRegion($code){
        $name = "";
        $req = $this -> _connect -> query("SELECT * FROM `Departement` WHERE departement_code = '$code'");
        $res = $req -> fetchAll();
        foreach($res as $r){
            $name = $r['departement_nom'];
        }
        return $name;
    }

    public function infoUser($id){
        $req = $this -> _connect -> query("SELECT * FROM `Users` WHERE Id ='$id'");
        $res = $req -> fetchAll();
        return $res;
    }

    public function verifProducts($id, $idFarmer){
        $req = $this -> _connect -> query("SELECT * FROM `Produit` WHERE Id = '$id' AND IdFarmers = '$idFarmer' AND Actif='1'");
        $res = $req -> rowCount();
        return $res;
    }

    public function MyProducts($id, $idFarmer){
        $req = $this -> _connect -> query("SELECT * FROM `Produit` WHERE Id = '$id' AND IdFarmers = '$idFarmer'");
        $res = $req -> fetchAll();
        return $res;
    }

    public function nbProductsBuy($idProduits, $idFarmer){
        $req = $this -> _connect -> query("SELECT * FROM `ProduitOrder`  WHERE IdProduit = '$idProduits' AND idFarmerProduct = '$idFarmer' AND Status ='2'");
        $res = $req -> rowCount();
        return $res;
    }

    public function ProductsBuy($idProduits, $idFarmer){
        $req = $this -> _connect -> query("SELECT ProduitOrder.IdCommande as ProduitOrder_id_commande, ProduitOrder.IdProduit as ProduitOrder_id_produit, ProduitOrder.NbProduits as ProduitOrder_nb, ProduitOrder.idFarmerProduct as ProduitOrder_id_farmer, ProduitOrder.creationDate as creationDate, ProduitOrder.Status as ProduitOrder_Status, Produit.Id as Produit_id, Produit.IdListeProduit as Produit_idlisteProduits, Produit.Prix as prix, Produit.Qualiter as qualiter, Produit.UnitWeight as UnitWeight, Produit.IdFarmers as Produit_id_farmer, ListeProduit.Id as ListeProduit_id, ListeProduit.Name as ListeProduit_Name FROM ProduitOrder INNER JOIN Produit ON ProduitOrder.IdProduit = Produit.Id INNER JOIN ListeProduit ON Produit.IdListeProduit = ListeProduit.Id WHERE ProduitOrder.IdProduit = '$idProduits' AND Produit.IdFarmers = '$idFarmer' AND ProduitOrder.Status = '2' ");
        $res = $req -> fetchAll();
        return $res;
    }

    public function Messagerie($idUsers){
        $admin = "Admin";
        $req = $this -> _connect -> query("SELECT * FROM Messages WHERE idEnvoi IN('$idUsers','$admin') AND IdRecu IN('$admin','$idUsers') ORDER BY id");
        $res = $req -> fetchAll();
        return $res;
    }

    public function InsertMmessage($message,$iduser){
        $date = date("Y-m-d");
        $req = $this -> _connect ->exec("INSERT INTO `Messages`(`idEnvoi`, `IdRecu`, `date`, `message`) VALUES ('$iduser','Admin','$date','$message')");
    }

    public function InsertIbanBic($iban,$bic, $idfarmer){
        $req = $this -> _connect ->exec("UPDATE `Farmers` SET `Bic`='$bic',`IBAN`='$iban' WHERE Id = '$idfarmer'");
    }

    public function UpdateBank($iban,$bic, $idfarmer){
        $req = $this -> _connect ->exec("UPDATE `Farmers` SET `Bic`='$bic',`IBAN`='$iban' WHERE Id = '$idfarmer'");
    }


    public function updateInfoPerso($value,$colmun,$idUser){
        $req = $this -> _connect -> exec("UPDATE `Users` SET `$colmun`='$value' WHERE Id = '$idUser'");
    }

    public function updateInfoPersoFarmer($value,$colmun,$idFarmer){
        $req = $this -> _connect -> exec("UPDATE `Farmers` SET `$colmun`='$value' WHERE Id = '$idFarmer'");
    }

    public function AddEdit($value,$idAnnonce){
        $req = $this -> _connect -> exec("UPDATE `Produit` SET `Biographie`='$value' WHERE Id = '$idAnnonce'");
    }

    public function DeleteAdd($id){
        $req = $this -> _connect -> exec("UPDATE `Produit` SET `Actif`='2' WHERE Id = '$id'");
    }
}

?>