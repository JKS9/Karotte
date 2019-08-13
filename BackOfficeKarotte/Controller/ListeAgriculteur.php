<?php
$objOffice = new office($connectOffice);

$urlExplodeFarmer = explode('/',$_GET['i']);

$listes = $objOffice->ListingFarmers();

?>