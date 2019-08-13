<?php
$objProducts = new products($connect);
$objRegisters = new register($connect);
$objCarts = new carts($connect);
$objProfile = new profile($connect);

$errorEdit = "";

$annonces = $objProfile->listeAddOneFarmer($_SESSION['farmer']);

$idFarmer = $objProfile->infoIdFarmers($_SESSION['farmer']);

if(isset($_POST['AddEdit'])){
    $explodeur = explode('/', $_GET['p']);
    $annonce = explode('=', $explodeur[1]);

    $idAnnonce = $annonce['1'];

    $Biography = addslashes($objRegisters->test_input($_POST['Biographie']));

    if (empty($Biography)) {
        $errorEdit = "
            <div class='alert alert-danger' role='alert'>
                Please complete all required fields :
            </div>";
        return $errorEdit;
    }

    if(strlen($Biography) > 250){
        $errorEdit = "
            <div class='alert alert-danger' role='alert'>
                Your biography mustbe less than 250 caracters
            </div>";
        return $errorEdit;
    }

    $objProfile->AddEdit($Biography,$idAnnonce);
}

if(isset($_POST['DeleteAdd'])){
    $explodeur = explode('/', $_GET['p']);
    $annonce = explode('=', $explodeur[1]);

    $idAnnonce = $annonce['1'];

    $objProfile->deleteAdd($idAnnonce);

    $errorEdit = "
        <div class='alert alert-success' role='alert'>
           Your Add is delete
        </div>";
}

?>