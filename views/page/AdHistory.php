<?php
require "controller/AdHistory.php";

if (isset($_SESSION['farmer'])) {
    $nb = sizeof($annonces);
    if ($nb != 0) {
        ?>
        <div class="container-fluid no-padding block_Ad_Historie">
            <div class="row">
                <div class="col-lg-4 block_Ad_Historie_1">
                    <?php
                    include "views/page/AddHistory/listeCarts.php";
                    ?>
                </div>
                <div class="col-lg-8 block_Ad_Historie_2">
                    <?php
                    $url = explode('/', $_GET['p']);

                    if (!$url[1]) {
                        include "views/page/AddHistory/addCarts.php";
                    } else {
                        $verifannonce = explode('=', $url[1]);

                        if ($verifannonce[0] == "annonce") {

                            $verif = $objProfile->verifProducts($verifannonce[1], $idFarmer);

                            if ($verif > 0) {

                                $explode = explode('/', $_GET['p']);
                                if(isset($explode[2])){
                                    if ($explode[2] == "Modification") {
                                        include "views/page/AddHistory/modifCarts.php";
                                    } else {
                                        include "views/page/AddHistory/infoCarts.php";

                                        if($explode[2] == "Livraison"){
                                            include "views/page/AddHistory/carts_livraison.php";
                                        }
                                    }
                                }else{
                                    include "views/page/AddHistory/addCarts.php";
                                }
                            }else{
                                include "views/page/AddHistory/noCarts.php";
                            }
                        } else {
                            include "views/page/AddHistory/noCarts.php";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
    } else {
        include "views/page/AddHistory/noCarts.php";
    }
}
?>