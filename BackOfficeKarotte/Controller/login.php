<?php
$log = "";

$objOffice = new office($connectOffice);

if(isset($_POST['Log'])){
    $login = $_POST['Login'];
    $password = $_POST['Password'];

    $log = $objOffice->login($login,$password);

    return $log;
}
?>