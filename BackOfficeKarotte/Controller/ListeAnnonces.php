<?php
$objOffice = new office($connectOffice);

$urlExplodeAnnonce = explode('/',$_GET['i']);

$listes = $objOffice->ListingAnnonces();

?>