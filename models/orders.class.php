<?php

class orders extends connect
{

    function __construct($connect)
    {
        parent::__construct($connect);
    }

    public function isJwtUsed($jwt)
    {
        $req = $this->_connect->query("SELECT Id FROM `Commande` WHERE jwt='$jwt'");
        $nb = $req -> rowCount();

        return $nb > 0;
    }

    public function insertOrder($idUser, $idFarmer, $totalAmount, $idDelivery, $jwt)
    {
        $date = date("Y-m-d");
        $this->_connect->exec("INSERT INTO `Commande`(`IdUser`, `IdFarmer`, `Prix`, `CreationDate`, `Status`, `IdDelivery`, `jwt`) VALUES ('$idUser','$idFarmer','$totalAmount','$date','0', '$idDelivery', '$jwt')");
        return $this->_connect->lastInsertId();
    }

    public function insertProductOrder($idCommande, $idProduit, $quantity, $idFarmer)
    {
        $date = date("Y-m-d");
        $req = $this->_connect->exec("INSERT INTO `ProduitOrder`(`IdCommande`, `IdProduit`, `NbProduits`, `idFarmerProduct`, `Status`, `creationDate`) VALUES ('$idCommande','$idProduit','$quantity','$idFarmer','0', '$date')");

        $reqStorage = $this ->_connect -> exec("UPDATE `Produit` SET `NbStock`= NbStock - '$quantity' WHERE Id='$idProduit'");
    }

}

?>