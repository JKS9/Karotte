<?php
$erreur = "";
$objOffice = new office($connectOffice);

$listes = $objOffice->ListeProduits();

$listesActive = $objOffice->LIsteProduitsNoActived();

if(isset($_POST['active'])){
    $id = $_POST['num'];

    $objOffice->UpdateProduit($id,'1');

    $erreur = '<div class="alert alert-success" role="alert">
        the product n°'.$id.' has been modified
    </div>';
}

if(isset($_POST['deactiver'])){
    $id = $_POST['num'];

    $objOffice->UpdateProduit($id,'0');

    $erreur = '<div class="alert alert-success" role="alert">
        the product n°'.$id.' has been modified
    </div>';
}
?>