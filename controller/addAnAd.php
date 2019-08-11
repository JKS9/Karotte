<?php
/** Page add product **/
/** appel des modules **/
$objProducts = new products($connect);
$objRegisters = new register($connect);

/** Variable error form "add products" **/
$error = "";
$errorPrice = "";
$errorProducts = "";
$errorUnitWeight = "";
$errorNbStore = "";
$errorBiography = "";

/** Variable error form "add li produits **/
$errorAddproduits= "";
$errorFile = "";

$inputProductsFilters = $objProducts->inputListeProduit();

if(isset($_POST['AddProducts'])){
    $Price = $objRegisters->test_input($_POST['Price']);
    $Products = $objRegisters->test_input($_POST['Products']);
    $UnitWeight = $objRegisters->test_input($_POST['UnitWeight']);
    $NbStore = $objRegisters->test_input($_POST['NbStore']);
    $Biography = addslashes($objRegisters->test_input($_POST['Biography']));

    $infoProducts = $objProducts->verifListeProduit($Products);
    $UnitWeightValue = array('200g', '500g', '1kg', '10kg', '50kg');

    if (empty($Price) || empty($Products) || empty($UnitWeight) || empty($NbStore) || empty($Biography)) {
        $error = "
            <div class='alert alert-danger' role='alert'>
                Veuillez remplir les champs obligatoire :
            </div>";
        return $error;
    }

    if($Price >= 1000){
        $errorPrice = "
            <div class='alert alert-danger' role='alert'>
                Prix inscrit 'trop élever' :
            </div>";
        return $errorPrice;
    }

    if($infoProducts == 0){
        $errorProducts = "
            <div class='alert alert-danger' role='alert'>
                Veuillez choisir un produits contenu dans la liste 'produits' :
            </div>";
        return $errorProducts;
    }

    if(!in_array($UnitWeight, $UnitWeightValue)){
        $errorUnitWeight = "
            <div class='alert alert-danger' role='alert'>
                Veuillez choisir un poinds contenu dans la liste 'poids' :
            </div>";
        return $errorUnitWeight;
    }

    if($NbStore < 2 || $NbStore > 5000){
        $errorNbStore = "
            <div class='alert alert-danger' role='alert'>
                votre sotck de produits doit faire 2kg minimum et 5000kg maximum :
            </div>";
        return $errorNbStore;
    }

    if(strlen($Biography) > 250){
        $errorBiography = "
            <div class='alert alert-danger' role='alert'>
                votre biographie doit faire moin de 250 caractéres :
            </div>";
        return $errorBiography;
    }

    $addProduits = $objProducts->AddProducts($_SESSION['farmer'],$Price,$Products,$UnitWeight,$NbStore,$Biography);

    $addProduitsFarmers = $objProducts->AddProductsFarmers($_SESSION['farmer'],$Products);
    $error = "
        <div class='alert alert-success' role='alert'>
            Votre produits à bien été ajouter : veuillez attendre confirmation de nos administrateur
        </div>";
}



if(isset($_POST['NewProducts'])){
    $Name = $objRegisters->test_input($_POST['NewProductsName']);
    $file_name = $_FILES['FileNewProducts']['name'];
    $file_size =$_FILES['FileNewProducts']['size'];
    $file_tmp =$_FILES['FileNewProducts']['tmp_name'];
    $file_type=$_FILES['FileNewProducts']['type'];
    $errorFile= $_FILES['FileNewProducts']['error'];

    $uploaddir = "src/images/produitNoActif/";

    echo $file_type;

    $extensionsAutorisees = array("image/jpeg", "image/jpg");
    if (!(in_array($file_type, $extensionsAutorisees))) {
        $errorAddproduits = "
        <div class='alert alert-danger' role='alert'>
            Votre image doit impérativement etre '.jpg' :
        </div>";
        return $errorAddproduits;
    }

    if (move_uploaded_file($_FILES['FileNewProducts']['tmp_name'],$uploaddir.$Name.'.jpg')) {

        $addProduitListeProduit = $objProducts->AddProduitAdmin($Name);

        $errorAddproduits = "
        <div class='alert alert-success' role='alert'>
            Votre demande à été envoi à un administrateur : fichier valide
        </div>";
        return $errorAddproduits;

    } else {
        $errorAddproduits = "
        <div class='alert alert-danger' role='alert'>
            image incorrecte :
        </div>";
        return $errorAddproduits;
    }

}
?>