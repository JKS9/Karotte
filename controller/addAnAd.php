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
                Please complete all required fields :
            </div>";
        return $error;
    }

    if($Price >= 1000){
        $errorPrice = "
            <div class='alert alert-danger' role='alert'>
                Price too high
            </div>";
        return $errorPrice;
    }

    if($infoProducts == 0){
        $errorProducts = "
            <div class='alert alert-danger' role='alert'>
                Please select a product from the product list
            </div>";
        return $errorProducts;
    }

    if(!in_array($UnitWeight, $UnitWeightValue)){
        $errorUnitWeight = "
            <div class='alert alert-danger' role='alert'>
                Please select a weight from the weight list
            </div>";
        return $errorUnitWeight;
    }

    if($NbStore < 2 || $NbStore > 5000){
        $errorNbStore = "
            <div class='alert alert-danger' role='alert'>
                Your product stock must weight 2kg minimum and 5 tonnes maximum
            </div>";
        return $errorNbStore;
    }

    if(strlen($Biography) > 250){
        $errorBiography = "
            <div class='alert alert-danger' role='alert'>
                Your biography mustbe less than 250 caracters :
            </div>";
        return $errorBiography;
    }

    $addProduits = $objProducts->AddProducts($_SESSION['farmer'],$Price,$Products,$UnitWeight,$NbStore,$Biography);

    $addProduitsFarmers = $objProducts->AddProductsFarmers($_SESSION['farmer'],$Products);
    $error = "
        <div class='alert alert-success' role='alert'>
            Your product was added. PLease wait for confirmation from our administrators
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
            Your image must imperatively be '.jpg' :
        </div>";
        return $errorAddproduits;
    }

    if (move_uploaded_file($_FILES['FileNewProducts']['tmp_name'],$uploaddir.$Name.'.jpg')) {

        $addProduitListeProduit = $objProducts->AddProduitAdmin($Name);

        $errorAddproduits = "
        <div class='alert alert-success' role='alert'>
            Your request has been sent to an administrator
        </div>";
        return $errorAddproduits;

    } else {
        $errorAddproduits = "
        <div class='alert alert-danger' role='alert'>
            Incorrect Picture :
        </div>";
        return $errorAddproduits;
    }

}
?>