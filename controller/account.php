<?php
$objProfile = new profile($connect);
$objRegister = new register($connect);
$objDelivery = new delivery($connect);

$session = "";
$idfarmer = "";

if(isset($_SESSION['farmer'])){
    $session = $_SESSION['farmer'];
    $idfarmer = $objProfile->infoIdFarmers($_SESSION['farmer']);
}else{
    $session = $_SESSION['user'];
}

$errorInfoPerso = "";
$errorProfilPicture = "";
$errorInfoPersoFarmer = "";
$errorinfoDelivery = "";
$errorAddadresse = "";

include "account/Me.php";
include "account/Delivery.php";
include "account/MessagerieBank.php";

?>