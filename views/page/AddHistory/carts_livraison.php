<h3>Livraison faite sur ce produit :</h3>
<div class="block_Ad_Historie_2_Produit_livraison_table">
    <table class="table table-striped">
        <thead class="thead-dark">
        <tr>
            <th style="text-align: center" scope="col">IdCommande</th>
            <th style="text-align: center" scope="col">IdProduit</th>
            <th style="text-align: center" scope="col">Name</th>
            <th style="text-align: center" scope="col">Nombres</th>
            <th style="text-align: center" scope="col">Poids</th>
            <th style="text-align: center" scope="col">Prix unitaire</th>
            <th style="text-align: center" scope="col">Prix totale</th>
            <th style="text-align: center" scope="col">Commission %</th>
            <th style="text-align: center" scope="col">Commission €</th>
            <th style="text-align: center" scope="col">TTC</th>
            <th style="text-align: center" scope="col">Livraison</th>
            <th style="text-align: center" scope="col">Date</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $liste = $objProfile->ProductsBuy($verifannonce[1], $idFarmer);
        $nbListe = sizeof($liste);
        if ($nbListe > '0') {
            foreach ($liste as $produitBuy) {
                $calcule1 = $produitBuy['prix'];
                $calcule2 = $produitBuy['ProduitOrder_nb'];
                $resCalcul = $calcule1 * $calcule2;
                $total = $resCalcul;
                $qualit = $produitBuy['qualiter'] == 1 ? 0.15 : 0.20;
                $commision = $total * $qualit;
                ?>
                <tr>
                    <th style="text-align: center"
                        scope="col"><?= $produitBuy['ProduitOrder_id_commande'] ?></th>
                    <th style="text-align: center"
                        scope="col"><?= $produitBuy['ProduitOrder_id_produit'] ?></th>
                    <th style="text-align: center" scope="col"><?= $produitBuy['ListeProduit_Name'] ?></th>
                    <th style="text-align: center" scope="col"><?= $produitBuy['ProduitOrder_nb'] ?></th>
                    <th style="text-align: center" scope="col"><?= $produitBuy['UnitWeight'] ?></th>
                    <th style="text-align: center" scope="col"><?= $produitBuy['prix'] ?></th>
                    <th style="text-align: center" scope="col"><?= $resCalcul ?>€</th>
                    <th style="text-align: center"
                        scope="col"><?= ($produitBuy['qualiter'] == 1) ? '15%' : '20%' ?></th>
                    <th style="text-align: center" scope="col"><?= $commision ?></th>
                    <th style="text-align: center" scope="col"><?= $total - $commision ?></th>
                    <th style="text-align: center" scope="col">Livrer</th>
                    <th style="text-align: center" scope="col"><?= $produitBuy['creationDate'] ?></th>
                </tr>
                <?php
            }
        } else {
            ?>
            <tr>
                <th style="text-align: center" scope="col"></th>
                <th style="text-align: center" scope="col"></th>
                <th style="text-align: center" scope="col"></th>
                <th style="text-align: center" scope="col"></th>
                <th style="text-align: center" scope="col"></th>
                <th style="text-align: center" scope="col"></th>
                <th style="text-align: center" scope="col"></th>
                <th style="text-align: center" scope="col">pas de livraison</th>
                <th style="text-align: center" scope="col"></th>
                <th style="text-align: center" scope="col"></th>
                <th style="text-align: center" scope="col"></th>
                <th style="text-align: center" scope="col"></th>
                <th style="text-align: center" scope="col"></th>
                <th style="text-align: center" scope="col"></th>
                <th style="text-align: center" scope="col"></th>
            </tr>
            <?php
        }
        ?>

        </tbody>
    </table>
</div>