<?php
$objOffice = new office($connectOffice);
$orders = $objOffice->Commandes();
$nbOrders = sizeof($orders);
?>