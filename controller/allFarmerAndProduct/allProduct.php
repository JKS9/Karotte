<?php
$produits = $objProducts->displayProducts();
foreach ($produits as $produit) {
    ?>
    <div class="col-sm-3 produit">
        <a href="<?= routeUrl() ?>Products/produit=<?= $produit['Id'] ?>">
            <div class="produit_picture">
                <img src="<?= routeUrl() ?>src/images/produits/<?= $objProducts->listeProduit($produit['IdListeProduit']) ?>.jpg" style="width: 100px;" alt="produit image">
            </div>
            <div class="produit_info">
                <p><?= $objProducts->listeProduit($produit['IdListeProduit'])?></p>
                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-3">
                        <p><?= $produit['Prix']?> €</p>
                    </div>
                    <div class="col-sm-3">
                        <?php
                        if($produit['Qualiter'] == '1' ){
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

$nb = $objProducts->rowCountPage();
if($nb > 10){
    for ($i = 0; $i <= $nb; $i++) {
        ?>
        <a class="pagination" href="<?= routeUrl() ?>Products/<?= $i + 1 ?>"><?= $i + 1 ?></a>
        <?php
    }
}
?>