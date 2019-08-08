<?php
$objDelivery = new delivery($connect);
$objProfile = new profile($connect);

$idFarmer = $objProfile->infoIdFarmers($_SESSION['farmer']);

$DeliverySend = "";

if(isset($_POST['envoyer'])){
    $id = $_POST['id'];
    $objDelivery->DeliveryCommande($id);

    $DeliverySend = "<div class='alert alert-success' role='alert'>
            LA commande à été marquer 'Envoyer', en attente de la validation 'reception du client'.
        </div>";
}
?>