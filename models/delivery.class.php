<?php
class delivery extends connect
{

    function __construct($connect)
    {
        parent::__construct($connect);
    }

    public function DeliveryToDo($idFarmer){
        $req = $this -> _connect -> query("SELECT Commande.Id as id_commande, Commande.IdUser as iduser_commande, Commande.idFarmer as id_farmer, Commande.Prix as prix_end, Commande.CreationDate as date_Commande, Commande.Status as commande_status, Commande.IdDelivery as id_delivery, Users.Id as id_user, Users.Name as name_user, Users.LastName as user_lastName, Delivery.Id as id_delivery_id, Delivery.IdUser as delivery_id_user, Delivery.Road as road, Delivery.RoadName as road_name, Delivery.RoadNumber as road_number, Delivery.PostalCode as postal_code, Delivery.City as city, Delivery.Region as region, Delivery.County as country, Delivery.Phone as phone FROM Commande INNER JOIN Users ON Users.Id = Commande.IdUser INNER JOIN Delivery ON Delivery.Id = Commande.IdDelivery WHERE Commande.idFarmer = '$idFarmer' AND Commande.Status = '0' ");
        $res = $req -> fetchAll();
        return $res;
    }

    public function DeliveryAll($idFarmer){
        $req = $this -> _connect -> query("SELECT Commande.Id as id_commande, Commande.IdUser as iduser_commande, Commande.idFarmer as id_farmer, Commande.Prix as prix_end, Commande.CreationDate as date_Commande, Commande.Status as commande_status, Commande.IdDelivery as id_delivery, Users.Id as id_user, Users.Name as name_user, Users.LastName as user_lastName, Delivery.Id as id_delivery_id, Delivery.IdUser as delivery_id_user, Delivery.Road as road, Delivery.RoadName as road_name, Delivery.RoadNumber as road_number, Delivery.PostalCode as postal_code, Delivery.City as city, Delivery.Region as region, Delivery.County as country, Delivery.Phone as phone FROM Commande INNER JOIN Users ON Users.Id = Commande.IdUser INNER JOIN Delivery ON Delivery.Id = Commande.IdDelivery WHERE Commande.idFarmer = '$idFarmer' ");
        $res = $req -> fetchAll();
        return $res;
    }

    public function DeliveryId($idFarmer,$idcommande){
        $req = $this -> _connect -> query("SELECT Commande.Id as id_commande, Commande.IdUser as iduser_commande, Commande.idFarmer as id_farmer, Commande.Prix as prix_end, Commande.CreationDate as date_Commande, Commande.Status as commande_status, Commande.IdDelivery as id_delivery, Users.Id as id_user, Users.Name as name_user, Users.LastName as user_lastName, Delivery.Id as id_delivery_id, Delivery.IdUser as delivery_id_user, Delivery.Road as road, Delivery.RoadName as road_name, Delivery.RoadNumber as road_number, Delivery.PostalCode as postal_code, Delivery.City as city, Delivery.Region as region, Delivery.County as country, Delivery.Phone as phone FROM Commande INNER JOIN Users ON Users.Id = Commande.IdUser INNER JOIN Delivery ON Delivery.Id = Commande.IdDelivery WHERE Commande.idFarmer = '$idFarmer' AND Commande.Id = '$idcommande'");
        $res = $req -> fetchAll();
        return $res;
    }

    public function DeliveryStatus($idFarmer,$status){
        $req = $this -> _connect -> query("SELECT Commande.Id as id_commande, Commande.IdUser as iduser_commande, Commande.idFarmer as id_farmer, Commande.Prix as prix_end, Commande.CreationDate as date_Commande, Commande.Status as commande_status, Commande.IdDelivery as id_delivery, Users.Id as id_user, Users.Name as name_user, Users.LastName as user_lastName, Delivery.Id as id_delivery_id, Delivery.IdUser as delivery_id_user, Delivery.Road as road, Delivery.RoadName as road_name, Delivery.RoadNumber as road_number, Delivery.PostalCode as postal_code, Delivery.City as city, Delivery.Region as region, Delivery.County as country, Delivery.Phone as phone FROM Commande INNER JOIN Users ON Users.Id = Commande.IdUser INNER JOIN Delivery ON Delivery.Id = Commande.IdDelivery WHERE Commande.idFarmer = '$idFarmer' AND Commande.Status = '$status'");
        $res = $req -> fetchAll();
        return $res;
    }

    public function OrderDelivery($iduser, $status){
        $req = $this -> _connect -> query("SELECT Commande.Id as id_commande, Commande.IdUser as iduser_commande, Commande.idFarmer as id_farmer, Commande.Prix as prix_end, Commande.CreationDate as date_Commande, Commande.Status as commande_status, Commande.IdDelivery as id_delivery, Users.Id as id_user, Users.Name as name_user, Users.LastName as user_lastName, Delivery.Id as id_delivery_id, Delivery.IdUser as delivery_id_user, Delivery.Road as road, Delivery.RoadName as road_name, Delivery.RoadNumber as road_number, Delivery.PostalCode as postal_code, Delivery.City as city, Delivery.Region as region, Delivery.County as country, Delivery.Phone as phone FROM Commande INNER JOIN Users ON Users.Id = Commande.IdUser INNER JOIN Delivery ON Delivery.Id = Commande.IdDelivery WHERE Commande.IdUser = '$iduser' AND Commande.Status = '$status'");
        $res = $req -> fetchAll();
        return $res;
    }

    public function DeliveryToDoOrderProduit($IdCommande,$idfarmer){
        $req = $this -> _connect -> query("SELECT ProduitOrder.Id as id_produit_order, ProduitOrder.IdCommande as id_commande, ProduitOrder.IdProduit as id_produit, ProduitOrder.NbProduits as nb_produit, ProduitOrder.idFarmerProduct as if_farmer, Produit.Id as Produit_id, Produit.IdListeProduit as Produit_Id_Liste_Produit, Produit.Prix as Produit_prix,Produit.Qualiter as Qualiter, Produit.UnitWeight as Produit_Unit_Weight, ListeProduit.Id as Liste_Produit_id, ListeProduit.Name as Liste_Produit_Name FROM ProduitOrder INNER JOIN Produit ON Produit.Id = ProduitOrder.IdProduit INNER JOIN ListeProduit ON ListeProduit.Id = Produit.IdListeProduit WHERE ProduitOrder.IdCommande = '$IdCommande' AND ProduitOrder.idFarmerProduct = '$idfarmer' ");
        $res = $req -> fetchAll();
        return $res;
    }

    public function infoDelivery($id, $idUser){
        $req = $this -> _connect -> query("SELECT * FROM `Delivery` WHERE Id = '$id' AND IdUser='$idUser'");
        $res = $req -> fetchAll();
        return $res;
    }

    public function updateDelivery($value,$colmun,$id){
        $req = $this -> _connect -> exec("UPDATE `Delivery` SET `$colmun`='$value' WHERE Id = '$id'");
    }

    public function insertDelivery($session,$roadNumber, $Road, $RoadName, $City, $PostalCode, $Region, $Country, $Phone){
        $req = $this -> _connect -> exec("INSERT INTO `Delivery`(`IdUser`, `Road`, `RoadName`, `RoadNumber`, `PostalCode`, `City`, `Region`, `County`, `Phone`) VALUES ('$session','$Road','$RoadName','$roadNumber','$PostalCode','$City','$Region','$Country','$Phone')");
    }

    public function DeliveryDelete($id){
        $req = $this -> _connect -> exec("UPDATE `Delivery` SET `Actif`='0' WHERE Id = '$id'");
    }

    public function DeliveryCommande($id){
        $reqCommande = $this -> _connect -> exec("UPDATE `Commande` SET `Status`='1' WHERE Id = '$id'");

        $reqProduit = $this -> _connect -> exec("UPDATE `ProduitOrder` SET `Status`='1' WHERE IdCommande = '$id'");
    }




}

?>