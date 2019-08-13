<?php
session_start();

error_reporting(E_ALL);
ini_set("display_errors", 1);

include "configbdd.php";

spl_autoload_register('chargerClasse');

$classe = "";
function chargerClasse($classe){
    include 'model/' . $classe . '.class.php';
}

function routeUrlBO(){
    $nbslash = '';
    if(isset($_GET['i'])){
        $nburl = count(explode('/', $_GET['i']));

        if($nburl !== 0){
            for($i=1; $i < $nburl; $i++){
                $nbslash .= "../";
            }
        }
    }
    return $nbslash;
}
?>

