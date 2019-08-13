<?php
/** Page de register Farmer et Users **/

/** Variable message erreur et validation "USER" **/
$error = "";
$validation = "";
$errorSignUpUsersName = "";
$errorSignUpUsersFirstName = "";
$errorSignUpUsersEmail = "";
$errorSignUpUsersPassword = "";
$errorSignUpUsersDate = "";

/** Variable message erreur et validation "Farmer" **/
$errorFarmers = "";
$validationFarmers = "";
$errorSignUpFarmersName = "";
$errorSignUpFarmersFirstName = "";
$errorSignUpFarmersEmail = "";
$errorSignUpFarmersPassword = "";
$errorSignUpFarmersDate = "";
$errorSignUpFarmersTypeAgriculture = "";
$errorSignUpFarmersAdress = "";
$errorSignUpFarmersPhone = "";

/** appel du module register **/
$objRegister = new register($connect);

$selectRegion = $objRegister->displayRegion();

/** Condition register Users **/
if (isset($_POST['signUpUsers'])) {

    $Name = $objRegister->test_input($_POST['Name']);
    $FirstName = $objRegister->test_input($_POST['First-Name']);
    $Email = $objRegister->test_input($_POST['Email']);
    $Password = $objRegister->test_input($_POST['Password']);
    $Date = $objRegister->test_input($_POST['Date']);

    $type = "1";
    $creationDate = date("Y-m-d");
    $creationIp = $_SERVER['REMOTE_ADDR'];


    if (empty($Name) || empty($FirstName) || empty($Email) || empty($Password)) {
        $error = "
            <div class='alert alert-danger' role='alert'>
                Please complete all required fields :
            </div>";
        return $error;
    }

    if (!preg_match("/^[a-zA-Z-'\s]+$/", "$Name")) {
        $errorSignUpUsersName = "
            <div class='alert alert-danger' role='alert'>
                Incorrect registered Name
            </div>";
        return $errorSignUpUsersName;
    }

    if (!preg_match("/^([a-zA-Z' ]+)$/", "$FirstName")) {
        $errorSignUpUsersFirstName = "
            <div class='alert alert-danger' role='alert'>
                 Incorrect registered Surname
            </div>";
        return $errorSignUpUsersFirstName;

    }

    if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        $errorSignUpUsersEmail = "
            <div class='alert alert-danger' role='alert'>
                 Incorrect registered Email
            </div>";
        return $errorSignUpUsersEmail;
    }

    $verifEmail = $objRegister->verifEmail($Email);

    if ($verifEmail === 1) {
        $error = "
            <div class='alert alert-danger' role='alert'>
                the registered e-mail is already used
            </div>";
        return $error;
    }

    if (!preg_match("/^[a-z\d_]{5,20}$/i", "$Password")) {
        $errorSignUpUsersPassword = "
            <div class='alert alert-danger' role='alert'>
                Incorrect registered Password
            </div>";
        return $errorSignUpUsersPassword;
    }

    $legalAge = $objRegister->calculateAge($Date);

    if ($legalAge < 16) {
        $errorSignUpUsersDate = "
            <div class='alert alert-danger' role='alert'>
                the minimum age required is 16 years old
            </div>";
        return $errorSignUpUsersDate;

    }

    $register = $objRegister->register($Name, $FirstName, $Email, $Password, $Date, $type, $creationDate, $creationIp);

    $validation = "
        <div class='alert alert-success' role='alert'>
            Your account has been successfully registered ! Now <a href='" . routeUrl() . "Login' class='alert-link'>log you</a> !
        </div>";

}


/** Condition register Farmers **/
if (isset($_POST['signUpFarmers'])) {

    $Name = $objRegister->test_input($_POST['Name']);
    $FirstName = $objRegister->test_input($_POST['First-Name']);
    $Email = $objRegister->test_input($_POST['Email']);
    $Password = $objRegister->test_input($_POST['Password']);
    $Date = $objRegister->test_input($_POST['Date']);
    $TypeAgriculture = $objRegister->test_input($_POST['TypeAgriculture']);
    $Road = $objRegister->test_input($_POST['Road']);
    $NameStreet = $objRegister->test_input($_POST['NameStreet']);
    $NumberStreet = $objRegister->test_input($_POST['NumberStreet']);
    $PostalCode = $objRegister->test_input($_POST['PostalCode']);
    $City = $objRegister->test_input($_POST['City']);
    $Region = $_POST['Region'];
    $Country = $objRegister->test_input($_POST['Country']);
    $Phone = $objRegister->test_input($_POST['Phone']);

    $type = "2";
    $creationDate = date("Y-m-d");
    $creationIp = $_SERVER['REMOTE_ADDR'];

    $arrayTypeAgriculture = array('1', '2', '3');
    $arrayRoad = array('Rue', 'Avenue', 'boulevard', 'Impasse');
    $arrayCountry = array('France', 'Espagne', 'England');


    if (empty($Name) || empty($FirstName) || empty($Email) || empty($Password) || empty($TypeAgriculture) || empty($Road) || empty($NameStreet) || empty($PostalCode) || empty($City) || empty($Region) || empty($Country) || empty($Phone)) {
        $errorFarmers = "
            <div class='alert alert-danger' role='alert'>
                 Please complete all required fields :
            </div>";
        return $errorFarmers;
    }

    if (!preg_match("/^[a-zA-Z-'\s]+$/", "$Name")) {
        $errorSignUpFarmersName = "
            <div class='alert alert-danger' role='alert'>
                Incorrect registered Name
            </div>";
        return $errorSignUpFarmersName;
    }

    if (!preg_match("/^([a-zA-Z' ]+)$/", "$FirstName")) {
        $errorSignUpFarmersFirstName = "
            <div class='alert alert-danger' role='alert'>
                Incorrect registered Surname
            </div>";
        return $errorSignUpFarmersFirstName;
    }

    if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        $errorSignUpFarmersEmail = "
            <div class='alert alert-danger' role='alert'>
                Incorrect registered Email
            </div>";
        return $errorSignUpFarmersEmail;
    }

    $verifmail = $objRegister->verifEmail($Email);

    if ($verifmail === 1) {
        $errorFarmers = "
            <div class='alert alert-danger' role='alert'>
                the registered e-mail is already used
            </div>";
        return $errorFarmers;
    }

    if (!preg_match("/^[a-z\d_]{5,20}$/i", "$Password")) {
        $errorSignUpFarmersPassword = "
            <div class='alert alert-danger' role='alert'>
               Incorrect registered Password
            </div>";
        return $errorSignUpFarmersPassword;
    }

    $legalAge = $objRegister->calculateAge($Date);

    if ($legalAge < 18) {
        $errorSignUpUsersDate = "
            <div class='alert alert-danger' role='alert'>
                the minimum age required is 18 years old
            </div>";
        return $errorSignUpUsersDate;
    }

    if (!in_array($TypeAgriculture, $arrayTypeAgriculture)) {
        $errorSignUpFarmersTypeAgriculture = "
            <div class='alert alert-danger' role='alert'>
                the selected value is not listed
            </div>";
        return $errorSignUpFarmersTypeAgriculture;
    }

    if (!in_array($Road, $arrayRoad)) {
        $errorSignUpFarmersAdress = "
            <div class='alert alert-danger' role='alert'>
                the selected value is not listed
            </div>";
        return $errorSignUpFarmersAdress;
    }

    if (!preg_match("/^[a-zA-Z- '\s]+$/", "$NameStreet")) {
        $errorSignUpFarmersAdress = "
            <div class='alert alert-danger' role='alert'>
               Incorrect registered Name street
            </div>";
        return $errorSignUpFarmersAdress;
    }

    if (!preg_match('/^[0-9]*$/', $NumberStreet)) {
        $errorSignUpFarmersAdress = "
            <div class='alert alert-danger' role='alert'>
                Incorrect registered Number of street
            </div>";
        return $errorSignUpFarmersAdress;
    }

    if (!preg_match('/^[0-9]*$/', $PostalCode)) {
        $errorSignUpFarmersAdress = "
            <div class='alert alert-danger' role='alert'>
                Incorrect registered Postal Code
            </div>";
        return $errorSignUpFarmersAdress;
    }

    if (!preg_match("/^[a-zA-Z- '\s]+$/", $City)) {
        $errorSignUpFarmersAdress = "
            <div class='alert alert-danger' role='alert'>
                Incorrect registered City
            </div>";
        return $errorSignUpFarmersAdress;
    }

    if (!in_array($Country, $arrayCountry)) {
        $errorSignUpFarmersAdress = "
            <div class='alert alert-danger' role='alert'>
                 the selected value is not listed
            </div>";
        return $errorSignUpFarmersAdress;
    }

    if (preg_match("/^((\+)33|0)[1-9](\d{2}){4}$/", $Phone)) {
        $errorSignUpFarmersPhone = "
            <div class='alert alert-danger' role='alert'>
                 Incorrect registered Phone
            </div>";
        return $errorSignUpFarmersPhone;
    }

    $register = $objRegister->register($Name, $FirstName, $Email, $Password, $Date, $type, $creationDate, $creationIp);

    $idUsers = $objRegister->selectId($Email);

    $registerFarmers = $objRegister->registerFarmers($idUsers, $TypeAgriculture, $Road, $NameStreet, $NumberStreet, $PostalCode, $City, $Region, $Country, $Phone, $creationDate);

    $validationFarmers = "
        <div class='alert alert-success' role='alert'>
            Your account has been successfully registered ! Now <a href='" . routeUrl() . "Login' class='alert-link'>log you</a> !
        </div>";

}
?>