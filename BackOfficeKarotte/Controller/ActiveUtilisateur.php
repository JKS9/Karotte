<?php
$erreur = "";
$objOffice = new office($connectOffice);

$listes = $objOffice->ListingUsersActif();

$listesActive = $objOffice->ListingUsersNoActif();

if(isset($_POST['active'])){
    $id = $_POST['num'];

    $objOffice->UpdateUsers($id,'0');

    $erreur = '<div class="alert alert-success" role="alert">
    the user n°'.$id.' has been modified
    </div>';
}

if(isset($_POST['deactiver'])){
    $id = $_POST['num'];

    $objOffice->UpdateUsers($id,'1');

    $erreur = '<div class="alert alert-success" role="alert">
    the user n°'.$id.' has been modified
    </div>';
}
?>