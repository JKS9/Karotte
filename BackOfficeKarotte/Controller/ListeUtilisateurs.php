<?php
$objOffice = new office($connectOffice);

$urlExplodeUser = explode('/',$_GET['i']);

$listes = $objOffice->ListingUsers();

?>