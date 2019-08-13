<?php
class office extends connectOffice {

    function __construct($connectOffice)
    {
        parent::__construct($connectOffice);
    }

    /** Utilisateurs **/

    public function ListingUsers(){
        $req = $this -> _connectOffice -> query("SELECT * FROM `Users` WHERE `Type` = 1 ");
        $res = $req -> fetchAll();
        return $res;
    }
    public function ListingUsersActif(){
        $req = $this -> _connectOffice -> query("SELECT * FROM `Users` WHERE `Type` = 1 AND Actif ='0'");
        $res = $req -> fetchAll();
        return $res;
    }

    public function ListingUsersNoActif(){
        $req = $this -> _connectOffice -> query("SELECT * FROM `Users` WHERE `Type` = 1 AND Actif ='1'");
        $res = $req -> fetchAll();
        return $res;
    }

    public function verifUser($id){
        $req = $this -> _connectOffice -> query("SELECT * FROM `Users` WHERE  `Id` = '$id' AND `Type` = 1 ");
        $res = $req -> rowCount();
        return $res;
    }

    public function infoUser($id){
        $req = $this -> _connectOffice -> query("SELECT * FROM `Users` WHERE  `Id` = '$id'");
        $res = $req -> fetchAll();
        return $res;
    }

    public function UpdateUsers($id,$value){
        $req = $this -> _connectOffice -> exec("UPDATE `Users` SET `Actif`='$value' WHERE Id = '$id'");

        header('Location: ActiveUtilisateurs');
    }

    public function InfoNameUser($id){
        $name = "";
        $SurName = "";
        $req = $this -> _connectOffice -> query("SELECT * FROM `Users` WHERE Id='$id'");
        $res = $req -> fetchAll();
        foreach($res as $r){
            $name = $r['Name'];
            $SurName = $r['LastName'];
        }
        $fullName = $name.' '.$SurName;
        return $fullName;
    }

    /** Agriculteurs **/
    public function ListingFarmers(){
        $req = $this -> _connectOffice -> query("SELECT * FROM `Users` WHERE `Type` = 2 ");
        $res = $req -> fetchAll();
        return $res;
    }

    public function verifFarmer($id){
        $req = $this -> _connectOffice -> query("SELECT * FROM `Users` WHERE  `Id` = '$id' AND `Type` = 2 ");
        $res = $req -> rowCount();
        return $res;
    }

    public function ListingFarmersActif(){
        $req = $this -> _connectOffice -> query("SELECT * FROM `Users` WHERE `Type` = 2 AND Actif ='0'");
        $res = $req -> fetchAll();
        return $res;
    }

    public function ListingFarmersNoActif(){
        $req = $this -> _connectOffice -> query("SELECT * FROM `Users` WHERE `Type` = 2 AND Actif ='1'");
        $res = $req -> fetchAll();
        return $res;
    }

    public function infoFarmer($id){
        $req = $this -> _connectOffice -> query("SELECT * FROM `Users` WHERE  `Id` = '$id'");
        $res = $req -> fetchAll();
        return $res;
    }

    public function infoFarmerMore($id){
        $req = $this -> _connectOffice -> query("SELECT * FROM `Farmers` WHERE `IdUser` = '$id'");
        $res = $req -> fetchAll();
        return $res;
    }

    public function UpdateFarmers($id,$value){
        $req = $this -> _connectOffice -> query("UPDATE `Users` SET `Actif`='$value' WHERE Id = '$id'");

        header('Location: ActiveAgriculteur');
    }

    /** Annonces **/
    public function ListingAnnonces(){
        $req = $this -> _connectOffice -> query("SELECT * FROM `Produit` WHERE Actif='1' ");
        $res = $req -> fetchAll();
        return $res;
    }

    public function verifAnnonces($id){
        $req = $this -> _connectOffice -> query("SELECT * FROM `Produit` WHERE Id='$id' AND Actif='1'");
        $res = $req -> rowCount();
        return $res;
    }

    public function InfoAnnonce($id){
        $req = $this -> _connectOffice -> query("SELECT * FROM `Produit` WHERE Id='$id'");
        $res = $req -> fetchAll();
        return $res;
    }

    public function validationAnnonces(){
        $req = $this -> _connectOffice -> query("SELECT * FROM `Produit` WHERE Actif='0' ");
        $res = $req -> fetchAll();
        return $res;
    }

    public function updateValidationAnnonces($id){
        $req = $this -> _connectOffice -> query("UPDATE `Produit` SET `Actif`='1' WHERE Id = '$id'");

        header('Location: VerificationAnnonces');
    }

    /** Produits **/
    public function NameAnnonce($id){
        $name = "";
        $req = $this->_connectOffice -> query("SELECT * FROM `ListeProduit` WHERE Id='$id' AND Actif='1'");
        $res = $req -> fetchAll();
        foreach($res as $r){
            $name = $r['Name'];
        }
        return $name;
    }

    public function ListeProduits(){
        $req = $this -> _connectOffice -> query("SELECT * FROM `ListeProduit` WHERE Actif='1'");
        $res = $req -> fetchAll();
        return $res;
    }

    public function LIsteProduitsNoActived(){
        $req = $this -> _connectOffice -> query("SELECT * FROM `ListeProduit` WHERE Actif='0'");
        $res = $req -> fetchAll();
        return $res;
    }

    public function UpdateProduit($id,$value){
        $req = $this -> _connectOffice -> query("UPDATE `ListeProduit` SET `Actif`='$value' WHERE Id = '$id'");

        header('Location: ListeProduits');
    }

    /** Commande **/
    public function Commandes(){
        $req = $this -> _connectOffice -> query("SELECT Commande.Id as id_commande, Commande.IdUser as iduser_commande, Commande.idFarmer as id_farmer, Commande.Prix as prix_end, Commande.CreationDate as date_Commande, Commande.Status as commande_status, Commande.IdDelivery as id_delivery, Users.Id as id_user, Users.Name as name_user, Users.LastName as user_lastName, Delivery.Id as id_delivery_id, Delivery.IdUser as delivery_id_user, Delivery.Road as road, Delivery.RoadName as road_name, Delivery.RoadNumber as road_number, Delivery.PostalCode as postal_code, Delivery.City as city, Delivery.Region as region, Delivery.County as country, Delivery.Phone as phone FROM Commande INNER JOIN Users ON Users.Id = Commande.IdUser INNER JOIN Delivery ON Delivery.Id = Commande.IdDelivery ");
        $res = $req -> fetchAll();
        return $res;
    }

    public function CommandesProduit($id){
        $req = $this -> _connectOffice -> query("SELECT ProduitOrder.Id as id_produit_order, ProduitOrder.IdCommande as id_commande, ProduitOrder.IdProduit as id_produit, ProduitOrder.NbProduits as nb_produit, ProduitOrder.idFarmerProduct as if_farmer, Produit.Id as Produit_id, Produit.IdListeProduit as Produit_Id_Liste_Produit, Produit.Prix as Produit_prix,Produit.Qualiter as Qualiter, Produit.UnitWeight as Produit_Unit_Weight, ListeProduit.Id as Liste_Produit_id, ListeProduit.Name as Liste_Produit_Name FROM ProduitOrder INNER JOIN Produit ON Produit.Id = ProduitOrder.IdProduit INNER JOIN ListeProduit ON ListeProduit.Id = Produit.IdListeProduit WHERE ProduitOrder.IdCommande = '$id'");
        $res = $req -> fetchAll();
        return $res;
    }

    /** Message **/
    public function listingConversation(){
        $req = $this -> _connectOffice -> query("SELECT * FROM `Conversation`");
        $res = $req -> fetchAll();
        return $res;
    }

    public function Messagerie($iduser){
            $admin = "Admin";
            $req = $this -> _connectOffice -> query("SELECT * FROM Messages WHERE idEnvoi IN('$iduser','$admin') AND IdRecu IN('$admin','$iduser') ORDER BY id");
            $res = $req -> fetchAll();
            return $res;
    }

    public function InsertMmessage($message,$iduser){
        $date = date("Y-m-d");
        $reqMessage = $this -> _connectOffice ->exec("INSERT INTO `Messages`(`idEnvoi`, `IdRecu`, `date`, `message`) VALUES ('Admin','$iduser','$date','$message')");
    }

    public function login($login,$password)
    {
        $errorMatch = "login, Password invilide, veuillez recommencez avec de nouvelles informations ";

        echo "SELECT * FROM `Admin` WHERE Login = '$login' AND Pasword = '$password' AND Actif='1'";
        $req = $this->_connectOffice->query("SELECT * FROM `Admin` WHERE Login = '$login' AND Pasword = '$password' AND Actif='1'");
        $nb = $req -> rowCount();

        if($nb == '0'){
            return $errorMatch;
        }else{
            $_SESSION['admin'] = "0";
            header('location: Menu');
        }
    }


}
?>