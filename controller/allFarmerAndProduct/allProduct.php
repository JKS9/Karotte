<?php
$produits = $objProducts->displayProducts();
foreach ($produits as $produit) { ?>
    <div class="produit">
        <a href="<?= routeUrl() ?>Products/produit=<?= $produit['Id'] ?>">
            <img src="<?= routeUrl() ?>src/images/produits/<?= $objProducts->listeProduit($produit['IdListeProduit']) ?>.jpg" style="width: 100px;" alt="produit image">
            <p><?= $objProducts->listeProduit($produit['IdListeProduit'])?></p>
            <p><?= $produit['Prix']?> €</p>
            <p><?= $produit['UnitWeight']?></p>
            <?php
            if($produit['Qualiter'] == '1' ){
                ?>
                <img src="<?= routeUrl() ?>src/images/icone/petiteIcone/biologic.svg" style="width: 55px;" alt="logo qualiter organic">
                <?php
            }else{
                ?>
                <img src="<?= routeUrl() ?>src/images/icone/petiteIcone/no-biologic-green.svg" style="width: 55px;" alt="logo qualiter no-organic">
                <?php
            }
            foreach ($objProducts->flagRegion($produit['Region']) as $flag){
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

$nb = $objProducts->rowCountPage();
for ($i = 0; $i <= $nb; $i++) {
    //tu recup la page sur l'aquelle t'es et si c'est = a i
    ?>
    <a href="<?= routeUrl() ?>Products/<?= $i + 1 ?>"><?= $i + 1 ?></a>
    <?php
}
?>