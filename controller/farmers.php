<?php
/** Page Farmers **/
/** appel des modules **/
$objRegister = new register($connect);

$objFarmers = new farmers($connect);

$objProducts = new products($connect);

/** chargement des input formulaire département **/
$inputRegionFilters = $objRegister->displayRegion();

/** chargement des input formulaire produits **/
$inputProductsFilters = $objProducts->inputListeProduit();




?>