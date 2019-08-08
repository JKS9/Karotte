<?php
session_start();

error_reporting(E_ALL);
ini_set("display_errors", 1);

include "configbdd.php";

$base_url = 'http://localhost/Karotte/';
$jwt_secret = "codesecret";
$stripe_api_sk = 'sk_test_E12mYClbmBtxklCfVCPsZjme00AFONzvDV'; // token secret
$stripe_api_pk = 'pk_test_K3Q3ZqcxNyTquD3LsotQ7tPh00NDR1QIGg'; // token public
$delivery_price = 3;

spl_autoload_register('chargerClasse');

$classe = "";
function chargerClasse($classe){
    include 'models/' . $classe . '.class.php';
}

function routeUrl(){
    $nbslash = '';
    if(isset($_GET['p'])){
        $nburl = count(explode('/', $_GET['p']));

        if($nburl !== 0){
            for($i=1; $i < $nburl; $i++){
                $nbslash .= "../";
            }
        }
    }
    return $nbslash;
}