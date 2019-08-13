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
                Please complete all required fields :
            </div>";
        return $errorLog;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorLog = "
            <div class='alert alert-danger' role='alert'>
                Incorrect registered Email :
            </div>";
        return $errorLog;
    }

    if (!preg_match("/^[a-z\d_]{5,20}$/i", "$password")) {
        $errorLog = "
            <div class='alert alert-danger' role='alert'>
               Incorrect registered Password :
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