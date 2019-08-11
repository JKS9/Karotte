<?php

if (strpos($_GET['p'], '/filters/') !== false) {
    include "controller/filters/filtersFarmers.php";
} else {

    $url = explode('=', $_GET['p']);
    if ($url[0] !== "Farmers/agriculteur") {
        include "controller/allFarmerAndProduct/allFarmer.php";
    } else {

        $url = explode('=', $_GET['p']);
        if($url[0] == "Farmers/agriculteur"){

            $verif = $objFarmers->verifFarmer($url[1]);

            if($verif > 0){
                include "controller/one/OneFarmers.php";
            }else{
                echo "<div class='no-agriculteur'>
                    <p>Argriculteur introuvables, améliore ta recherche</p>
                </div>";
            }
        }
    }
}
?>