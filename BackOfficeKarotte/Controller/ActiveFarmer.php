<?php
$erreur = "";
$objOffice = new office($connectOffice);

$listes = $objOffice->ListingFarmersActif();

$listesActive = $objOffice->ListingFarmersNoActif();

if(isset($_POST['active'])){
    $id = $_POST['num'];

    $objOffice->UpdateFarmers($id,'0');

    $erreur = '<div class="alert alert-success" role="alert">
    the farmer n°'.$id.' has been modified
    </div>';
}

if(isset($_POST['deactiver'])){
    $id = $_POST['num'];

    $objOffice->UpdateFarmers($id,'1');

    $erreur = '<div class="alert alert-success" role="alert">
    the farmer n°'.$id.' has been modified
    </div>';
}
?>