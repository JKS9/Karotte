<div class="block_Ad_Historie_2_Produit">
    <div class="block_Ad_Historie_2_Produit_info">
        <?php
        foreach ($objProfile->MyProducts($verifannonce[1], $idFarmer) as $product) {
            ?>
            <div class="block_Ad_Historie_2_Produit_info_picture">
                <img src="<?= routeUrl() ?>src/images/produits/<?= $objProducts->listeProduit($product['IdListeProduit']) ?>.jpg"
                     style="width: 100px;" alt="produit image">
                <p>
                    <strong><?= $objProducts->listeProduit($product['IdListeProduit']) ?></strong>
                </p>
            </div>
            <div class="block_Ad_Historie_2_Produit_info_poids_prix">
                <p> vendu par format de : <strong><?= $product['UnitWeight'] ?></strong></p>
                <p>vendu au prix de : <strong><?= $product['Prix'] ?>€</strong> /
                    <strong><?= $product['UnitWeight'] ?></strong></p>
                <p>biographie :</p>
                <p><?= $product['Biographie'] ?></p>
                <hr>
            </div>
            <div class="block_Ad_Historie_2_Produit_info_stock">
                <p>Nombre encore en stock : </p>
                <div class="block_Ad_Historie_2_Produit_info_stock_block"
                     style="width: 80px; height: 40px; background-color: #4bbdaa; border-radius: 3px; text-align: center; padding: 10px 0px; color: #ffffff">
                    <strong><?= $product['NbStock'] ?></strong>
                </div>
                <p>Nombre vendu : </p>
                <div class="block_Ad_Historie_2_Produit_nb_buy">
                    <?php
                    $nbBuy = $objProfile->nbProductsBuy($verifannonce[1], $idFarmer);
                    ?>
                    <div class="block_Ad_Historie_2_Produit_info_stock_block"
                         style="width: 80px; height: 40px; background-color: #4bbdaa; border-radius: 3px; text-align: center; padding: 10px 0px; color: #ffffff">
                        <strong><?= ($nbBuy > 0)? $nbBuy : '0' ?></strong>
                    </div>
                </div>
                <hr>
            </div>
            <div class="block_Ad_Historie_2_Produit_info_qualiter">
                <?php
                if ($product['Qualiter'] == '1') {
                    ?>
                    <img src="<?= routeUrl() ?>src/images/icone/petiteIcone/biologic.svg"
                         style="width: 55px;" alt="logo qualiter organic"/>
                    <p>Votre produit est d'origine biologique</p>
                    <p>commission de "Karotte" : <strong>15</strong>% sur chaque produit
                        vendu via le
                        site "Karotte".</p>
                    <hr>
                    <?php
                } else {
                    ?>
                    <img src="<?= routeUrl() ?>src/images/icone/petiteIcone/no-biologic-green.svg"
                         style="width: 55px;" alt="logo qualiter no-organic"/>
                    <p>Votre produit n'est pas d'origine biologique.</p>
                    <p>commission de "Karotte" : <strong>20</strong>% sur chaque produit
                        vendu via le
                        site "Karotte".</p>
                    <p>Pour baiser la commissiion suffit juste de faire <strong>vérifier
                            votre
                            ferme</strong> par nos controlleurs, et notre commission passera
                        à <strong>15</strong>%.
                    </p>
                    <hr>
                    <?php
                }
                ?>
            </div>
            <div class="row block_Ad_Historie_2_Produit_info_qualiter_option">
                <div class="col-sm-12 block_Ad_Historie_2_Produit_info_qualiter_option_title">
                    <p>option du produit :</p>
                </div>
                <div class="col-sm-4 block_Ad_Historie_2_Produit_info_qualiter_option_lien" style="margin: 25px 0px;">
                    <a href="<?= routeUrl() ?><?= $explode['0'] ?>/<?= $explode['1'] ?>/Modification">Modifier
                        Annnonces</a>
                </div>
                <div class="col-sm-4 block_Ad_Historie_2_Produit_info_qualiter_option_lien" style="margin: 25px 0px;">
                    <a href="<?= routeUrl() ?><?= $explode['0'] ?>/<?= $explode['1'] ?>/Livraison">Visualiser
                        les livraisons faite</a>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>