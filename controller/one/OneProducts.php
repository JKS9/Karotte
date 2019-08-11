<?php
foreach ($objProducts->selectOneProduct($url[1]) as $r) {

    $IdListeProduit = $r['IdListeProduit'];
    $Prix = $r['Prix'];
    $Biographie = $r['Biographie'];
    $Qualiter = $r['Qualiter'];
    $UnitWeight = $r['UnitWeight'];
    $NbStock = $r['NbStock'];
    $IdFarmers = $r['IdFarmers'];
    $Region = $r['Region'];

    $image = $objProducts->listeProduit($IdListeProduit) . ".jpg";
    ?>
    <div class="products_block_2_select_produit">
        <?= $erreurAdd ?>
        <div class="col-sm-6 products_block_2_select_produit_info_prix_UnitWeight_Stock">
            <div class=" row products_block_2_select_produit_info_name">
                <div class="col-sm-6">
                    <p><?= $objProducts->listeProduit($r['IdListeProduit'])?></p>
                </div>
                <div class="col-sm-6">
                    <p><strong><?= $Prix ?>€</strong></p>
                </div>
                <div class="col-sm-6">
                    <p>stock :<strong><?= $NbStock ?>kg</strong><span class="glyphicon glyphicon-grain"></span></p>
                </div>
                <div class="col-sm-6">
                    <p><strong><?= $UnitWeight ?></strong><span class="glyphicon glyphicon-stats"></span></p>
                </div>
                <div class="col-sm-12">
                    <?php
                    if ($Qualiter == '1') {
                        ?>
                        <img src="<?= routeUrl() ?>src/images/icone/petiteIcone/biologic.svg" style="width: 55px;margin-top: 15px;"
                             alt="logo qualiter organic">
                        <?php
                    } else {
                        ?>
                        <img src="<?= routeUrl() ?>src/images/icone/petiteIcone/no-biologic-green.svg" style="width: 55px;margin-top: 15px;"
                             alt="logo qualiter no-organic">
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="products_block_2_select_produit_add_carts">
                <form method="post">
                    <select name="nbProduits">
                        <?php
                        for ($i = 1; $i <= 10; $i++) {
                            ?>
                            <option value='<?= $i ?>'><?= $i ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <input type="submit" name="addCarts" value="Ajouter au panier">
                </form>
            </div>
        </div>
        <div class="col-sm-6 products_block_2_select_produit_info">
            <div class="products_block_2_select_produit_info_image">
                <img src="<?= routeUrl() ?>src/images/produits/<?= $image ?>" alt="image produit"/>
            </div>
        </div>
        <div class="col-sm-12 products_block_2_select_produit_info_flag_biography">
            <div class="products_block_2_select_produit_info_biography">
                <strong>Description :</strong>
                <p><?= $Biographie ?></p>
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
        <div class="col-sm-12 products_block_2_select_produit_info_farmer">
            <?php
            foreach ($objProducts->idUserFarmer($IdFarmers) as $farmer) {
                $id = $farmer['Id'];
                $IdUser = $farmer['IdUser'];
                $Type = $farmer['Type'];
                $Road = $farmer['Road'];
                $RoadName = $farmer['RoadName'];
                $roadNumber = $farmer['roadNumber'];
                $PostalCode = $farmer['PostalCode'];
                $City = $farmer['City'];
                $Region = $farmer['Region'];
                $County = $farmer['County'];

                $name = "";
                $LastName = "";

                foreach ($objProducts->idUser($IdUser) as $users) {
                    $name = $users['Name'];
                    $LastName = $users['LastName'];
                }

                ?>
                <div class="row products_block_2_select_produit_info_farmer_add">
                    <h4>information sur l'annonceur :</h4>
                    <div class="col-sm-8 row products_block_2_select_produit_info_farmer_name">
                        <div class="col-sm-6">
                            <p>
                                Nom : <?= $LastName ?> <?= $name ?>
                            </p>
                        </div>
                        <div class="col-sm-6 products_block_2_select_produit_info_farmer_a">
                            <p>
                                <strong>
                                    <a href="<?= routeUrl() ?>Farmers/agriculteur=<?= $id ?>">
                                        visité la ferme
                                    </a>
                                </strong>
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-12 products_block_2_select_produit_info_farmer_add_2">
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
                <?php
            }
            ?>
        </div>
    </div>
    <?php
}
?>