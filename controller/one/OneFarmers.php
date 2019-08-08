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
        <div class="farmers_block_2_select_farmer_info">
            <div class="farmer_picture_name_type">
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
                <div class="farmer_name">
                    <p><strong><?= $LastName . ' ' . $Name ?></strong></p>
                </div>
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
                <span>
                    adresse : <?= $roadNumber . " " . $Road . " " . $RoadName ?>
                </span>
                <span>
                    ville : <?= $City . ", " . $PostalCode ?>
                </span>
                    <span>
                    département :
                    <?php
                    foreach ($objProducts->flagRegion($Region) as $flag) {
                        ?>
                        <?= $flag['departement_nom'] . " (" . $flag['departement_code'] . ") " ?>
                        <?php
                    }
                    ?>
                </span>
                <span>
                    Pays : <?= $County ?>
                </span>
            </div>
        </div>
        <div class="farmers_block_2_select_farmer_biographie">
            <div class="products_block_2_select_produit_info_biography">
                <strong>Description :</strong>
                <p><?= $Biography ?></p>
            </div>
            <div class="products_block_2_select_produit_info_flag">
                <?php
                foreach ($objProducts->flagRegion($Region) as $flag) {
                    if ($flag['departement_code'] == '29') {
                        ?>
                        <img src="<?= routeUrl() ?>src/images/imageRegion/29_Finistère.JPG"
                             alt="blason département français">
                        <strong><?= $flag['departement_nom'] ?></strong>
                        <?php
                    } else {
                        ?>
                        <img src="<?= routeUrl() ?>src/images/imageRegion/<?= $flag['departement_code'] ?>_<?= $flag['departement_nom'] ?>.png"
                             alt="blason département français">
                        <strong><?= $flag['departement_nom'] ?></strong>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
        <div class="farmers_block_2_select_farmer_product">
            <?php
            foreach ($objFarmers->listeProduitsFarmer($idFarmer)as $produits){
                ?>
                <div class="produit">
                    <a href="<?= routeUrl() ?>Products/produit=<?= $produits['Id'] ?>">
                        <img src="<?= routeUrl() ?>src/images/produits/<?= $objProducts->listeProduit($produits['IdListeProduit']) ?>.jpg" style="width: 100px;" alt="produit image">
                        <p><?= $objProducts->listeProduit($produits['IdListeProduit'])?></p>
                        <p><?= $produits['Prix']?> €</p>
                        <p><?= $produits['UnitWeight']?></p>
                        <?php
                        if($produits['Qualiter'] == '1' ){
                            ?>
                            <img src="<?= routeUrl() ?>src/images/icone/petiteIcone/biologic.svg" style="width: 55px;" alt="logo qualiter organic">
                            <?php
                        }else{
                            ?>
                            <img src="--><?= routeUrl() ?>src/images/icone/petiteIcone/no-biologic-green.svg" style="width: 55px;" alt="logo qualiter no-organic">
                            <?php
                        }
                        foreach ($objProducts->flagRegion($produits['Region']) as $flag){
                            if($flag['departement_code'] == '29'){
                                ?>
                                <img src="<?= routeUrl() ?>src/images/imageRegion/29_Finistère.JPG" alt="blason département français">
                                <strong><?= $flag['departement_nom']?></strong>
                                <?php
                            }else{
                                ?>
                                <img src="<?= routeUrl() ?>src/images/imageRegion/<?= $flag['departement_code'] ?>_<?= $flag['departement_nom']?>.png" alt="blason département français">
                                <strong><?= $flag['departement_nom']?></strong>
                                <?php
                            }

                        }
                        ?>
                        <hr>
                    </a>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    <?php

}
?>