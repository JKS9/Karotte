<?php
foreach ($objFarmers->infoUserFarmers($url[1]) as $infoFarmer){
    $idFarmer = $infoFarmer['Id'];
    $idUser = $infoFarmer['IdUser'];
    $Type = $infoFarmer['Type'];
    $Biography = $infoFarmer['Biography'];
    $Road = $infoFarmer['Road'];
    $RoadName = $infoFarmer['RoadName'];
    $roadNumber = $infoFarmer['roadNumber'];
    $PostalCode = $infoFarmer['PostalCode'];
    $City = $infoFarmer['City'];
    $Region = $infoFarmer['Region'];
    $County = $infoFarmer['County'];

    foreach ($objFarmers->infoUser($idUser) as $infoUser) {

        $Name = $infoUser['Name'];
        $LastName = $infoUser['LastName'];
    }


    ?>
    <div class="farmers_block_2_select_farmer">
        <div class="col-sm-6 farmers_block_2_select_farmer_info">
            <div class="farmer_picture_name_type">
                <div class="farmer_name">
                    <p><strong><?= $LastName . ' ' . $Name ?></strong></p>
                </div>
                <div class="products_block_2_select_produit_info_biography">
                    <strong>Description :</strong>
                    <p><?= $Biography ?></p>
                    <div class="farmer_type">
                        <?php
                        if ($Type == '1') {
                            ?>
                            <img src="<?= routeUrl() ?>src/images/icone/petiteIcone/biologic.svg" style="width: 55px;"
                                 alt="logo qualiter organic">
                            <?php
                        } else {
                            ?>
                            <img src="<?= routeUrl() ?>src/images/icone/petiteIcone/no-biologic-green.svg"
                                 style="width: 55px;" alt="logo qualiter no-organic">
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="products_block_2_select_produit_info_flag">
                    <?php
                    foreach ($objProducts->flagRegion($Region) as $flag) {
                        if ($flag['departement_code'] == '29') {
                            ?>
                            <img src="<?= routeUrl() ?>src/images/imageRegion/29_Finistère.JPG"
                                 alt="blason département français">
                            <p><strong><?= $flag['departement_nom'] ?></strong></p>
                            <?php
                        } else {
                            ?>
                            <img src="<?= routeUrl() ?>src/images/imageRegion/<?= $flag['departement_code'] ?>_<?= $flag['departement_nom'] ?>.png"
                                 alt="blason département français">
                            <p><strong><?= $flag['departement_nom'] ?></strong></p>
                            <?php
                        }
                    }
                    ?>
                </div>
                <div class="products_block_2_select_produit_info_ferme">
                    <h4>Adresse de la ferme :</h4>
                    <p>
                        <?= $roadNumber . " " . $Road . " " . $RoadName ?>
                    </p>
                    <p>
                        <?= $City . ", " . $PostalCode ?>
                    </p>
                        <p>
                        <?php
                        foreach ($objProducts->flagRegion($Region) as $flag) {
                            ?>
                            <?= $flag['departement_nom'] . " (" . $flag['departement_code'] . ") " ?>
                            <?php
                        }
                        ?>
                    </p>
                    <p>
                        <?= $County ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-sm-6 farmers_block_2_select_farmer_biographie">
            <div class="farmer_picture">
                <?php
                $filename = "././src/images/Agriculteurs/".$idFarmer.".jpg";
                if(file_exists($filename)) {
                    ?>
                    <img src="<?= routeUrl() ?>src/images/Agriculteurs/<?= $idFarmer ?>.jpg">
                    <?php
                }else{
                    ?>
                    <img src="<?= routeUrl() ?>src/images/icone/iconeUsers/default.jpg" alt='icone defaut'/>
                    <?php
                }
                ?>
            </div>
        </div>
        <div class="col-sm-12 farmers_block_2_select_farmer_product">
            <h2>Annonces :</h2>
            <div class="row">
            <?php
            foreach ($objFarmers->listeProduitsFarmer($idFarmer)as $produits){
                ?>
                <div class="col-sm-3 produit">
                    <a href="<?= routeUrl() ?>Products/produit=<?= $produits['Id'] ?>">
                        <div class="produit_picture">
                            <img src="<?= routeUrl() ?>src/images/produits/<?= $objProducts->listeProduit($produits['IdListeProduit']) ?>.jpg" style="width: 100%;" alt="produit image">
                        </div>
                        <div class="produit_info">
                            <p><?= $objProducts->listeProduit($produits['IdListeProduit'])?></p>
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-3">
                                    <p><?= $produits['Prix']?> €</p>
                                </div>
                                <div class="col-sm-3">
                                    <?php
                                    if($produits['Qualiter'] == '1' ){
                                        ?>
                                        <img src="<?= routeUrl() ?>src/images/icone/petiteIcone/biologic.svg" style="width: 25px;" alt="logo qualiter organic">
                                        <?php
                                    }else{
                                        ?>
                                        <img src="<?= routeUrl() ?>src/images/icone/petiteIcone/no-biologic-green.svg" style="width: 25px;" alt="logo qualiter no-organic">
                                        <?php
                                    }
                                    ?>
                                </div>
                                <div class="col-sm-3"></div>
                            </div>
                        </div>
                    </a>
                </div>
                <?php
            }
            ?>
            </div>
        </div>
    </div>
    <?php

}
?>