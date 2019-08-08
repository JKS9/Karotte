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
        <div class="products_block_2_select_produit_info">
            <div class="products_block_2_select_produit_info_image">
                <img src="<?= routeUrl() ?>src/images/produits/<?= $image ?>" alt="image produit"/>
            </div>
            <div class="products_block_2_select_produit_info_qualiter">
                <?php
                if ($Qualiter == '1') {
                    ?>
                    <img src="<?= routeUrl() ?>src/images/icone/petiteIcone/biologic.svg" style="width: 55px;"
                         alt="logo qualiter organic">
                    <?php
                } else {
                    ?>
                    <img src="<?= routeUrl() ?>src/images/icone/petiteIcone/no-biologic-green.svg" style="width: 55px;"
                         alt="logo qualiter no-organic">
                    <?php
                }
                ?>
            </div>
            <div class="products_block_2_select_produit_info_prix_UnitWeight_Stock">
                <div class="products_block_2_select_produit_info_prix">
                    <p>Prix de vente :</p>
                    <strong><?= $Prix ?></strong>
                    <span class="glyphicon glyphicon-euro"></span>
                </div>
                <div class="products_block_2_select_produit_info_UnitWeight">
                    <p>Vendu par quantituer de :</p>
                    <strong><?= $UnitWeight ?></strong>
                    <span class="glyphicon glyphicon-stats"></span>
                </div>
                <div class="products_block_2_select_produit_info_UnitWeight">
                    <p>Nombre en stock encore :</p>
                    <strong><?= $NbStock ?>kg</strong>
                    <span class="glyphicon glyphicon-grain"></span>
                </div>
                <div class="products_block_2_select_produit_add_carts">
                    <form method="post">
                        <div class="products_block_2_select_produit_add_carts_form_select">
                            <select name="nbProduits">
                                <?php
                                for ($i = 1; $i <= 10; $i++) {
                                    ?>
                                    <option value='<?= $i ?>'><?= $i ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="products_block_2_select_produit_add_carts_form_submit">
                            <input type="submit" name="addCarts" value="Ajouter au panier">
                        </div>
                    </form>
                    <?= $erreurAdd ?>
                </div>
            </div>
        </div>

        <div class="products_block_2_select_produit_info_flag_biography">
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
        <div class="products_block_2_select_produit_info_farmer">
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
                    <p>information sur l'annonceur :</p>
                    <div class="products_block_2_select_produit_info_farmer_name">
                        <span>
                            Nom : <?= $LastName ?>
                        </span>
                        <span>
                            Prénom : <?= $name ?>
                        </span>
                        <p>
                            <strong>
                                <a href="<?= routeUrl() ?>Farmers/agriculteur=<?= $id ?>">
                                    visité la ferme
                                </a>
                            </strong>
                        </p>
                        <br>
                    </div>
                    <div class="products_block_2_select_produit_info_farmer_add_2">
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
                <?php
            }
            ?>
        </div>
    </div>
    <?php
}
?>