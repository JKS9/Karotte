<?php
require "../../config.php";
require "../../configbdd.php";
require "../../models/connect.class.php";
require "../../models/all.class.php";
$objAll = new all($connect);

if(isset($_SESSION['farmer'])){
    $session = $_SESSION['farmer'];
}else{
    $session = $_SESSION['user'];
}
$nb = $objAll->menucardsIconeNb($session);
if($nb > 0){
    echo '<span class="glyphicon glyphicon-shopping-cart">'.$nb.'</span>';
}else{
    echo '<span class="glyphicon glyphicon-shopping-cart">+</span>';
}
?>