<?php
$erreur = "";
$objOffice = new office($connectOffice);

$urlExplodeUser = explode('/',$_GET['i']);

$listes = $objOffice->validationAnnonces();

if(isset($_POST['validation'])){
    $id = $_POST['num'];

    $validation = $objOffice->updateValidationAnnonces($id);

    $erreur ='<div class="alert alert-success" role="alert">
        ad valide :
    </div>';
}

?>