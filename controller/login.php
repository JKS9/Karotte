<?php
/** Page de Login **/
/** Variable message erreur **/
$errorLog = "";

/** appel des modules **/
$objLogin = new login($connect);
$objRegister = new register($connect);

/** condition de connexion **/

if(isset($_POST['Login'])){
    $email = $objRegister->test_input($_POST['Email']);
    $password = $objRegister->test_input($_POST['Password']);

    if (empty($email) || empty($password)) {
        $errorLog = "
            <div class='alert alert-danger' role='alert'>
                Veuillez remplir les champs obligatoire :
            </div>";
        return $errorLog;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorLog = "
            <div class='alert alert-danger' role='alert'>
                Email inscrit incorrecte :
            </div>";
        return $errorLog;
    }

    if (!preg_match("/^[a-z\d_]{5,20}$/i", "$password")) {
        $errorLog = "
            <div class='alert alert-danger' role='alert'>
               Password inscrit incorrecte :
            </div>";
        return $errorLog;
    }

    $res = $objLogin->login($email,$password);
    $errorLog = "
        <div class='alert alert-danger' role='alert'>
           ".$res.":
        </div>";
    return $errorLog;
}