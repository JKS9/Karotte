<?php
/** Page produits **/
/** appel des modules **/
$objProducts = new products($connect);
$objRegister = new register($connect);
$objCarts = new carts($connect);

/** chargement des input formulaire département **/
$inputProductsFilters = $objProducts->inputListeProduit();

/** chargement des input formulaire département **/
$inputRegionFilters = $objRegister->displayRegion();

$erreurAdd = "";

/** Variable erreur **/
if(isset($_POST['addCarts'])){
    if(isset($_SESSION['user'])){
        $explode = explode('=',$_GET['p']);

        $nb = $_POST['nbProduits'];
        $idproduits = $explode[1];
        $idFarmerProduct = $objCarts->checkidFarmer($idproduits);
        $iduser = $_SESSION['user'];

        $checkProduit = $objCarts->checkidProduits($idproduits, $_SESSION['user']);
        if($checkProduit > 0){
            $idcarts = $objCarts->checkidIdCards($idproduits,$iduser);

            $objCarts->updateCarts($nb, $idcarts);

            $erreurAdd =  "<div class='alert alert-success' role='alert'>
                profuit ajouter au panier :
            </div>";

        }else{
            $objCarts->insertCarts($iduser, $nb, $idFarmerProduct, $idproduits);
            $erreurAdd =  "<div class='alert alert-success' role='alert'>
                profuit ajouter au panier :
            </div>";
        }
    }else if(isset($_SESSION['farmer'])){
        $explode = explode('=',$_GET['p']);

        $nb = $_POST['nbProduits'];
        $idproduits = $explode[1];
        $idFarmerProduct = $objCarts->checkidFarmer($idproduits);
        $iduser = $_SESSION['farmer'];

        $checkProduit = $objCarts->checkidProduits($idproduits, $_SESSION['farmer']);
        if($checkProduit > 0){
            $idcarts = $objCarts->checkidIdCards($idproduits,$iduser);

            $objCarts->updateCarts($nb, $idcarts);

            $erreurAdd =  "<div class='alert alert-success' role='alert'>
                profuit ajouter au panier :
            </div>";
        }else{
            $objCarts->insertCarts($iduser, $nb, $idFarmerProduct, $idproduits);
            $erreurAdd =  "<div class='alert alert-success' role='alert'>
                profuit ajouter au panier :
            </div>";
        }
    }else{
        $erreurAdd =  "<div class='alert alert-danger' role='alert'>
                Veuillez vous coonecter pour ajouter un produit à votre panier :
            </div>";
    }
}

?>