<?php

if (strpos($_GET['p'], '/filters/') !== false) {
    include "controller/filters/filtersProduits.php";
} else {

    $url = explode('=', $_GET['p']);
    if ($url[0] !== "Products/produit") {
        include "controller/allFarmerAndProduct/allProduct.php";
    } else {

        $url = explode('=', $_GET['p']);
        if($url[0] == "Products/produit"){

            $verif = $objProducts->verifListeProduit($url[1]);

            if($verif > 0){
                include "controller/one/OneProducts.php";
            }else{
                echo "<div class='produits'>
                    <p>produits introuvables, améliore ta recherche</p>
                    <hr>
                </div>";
            }
        }
    }
}
?>