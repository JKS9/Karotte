<?php
require "controller/carts.php";

if ($isPayment) {
    ?>
    <p>Vous allez être redirigé vers le site de paiement</p>

    <script src="https://js.stripe.com/v3/"></script>

    <script>
        const stripe = Stripe('<?= $stripe_api_pk ?>');

        const sessionId = "<?= $session['id'] ?>";

        stripe.redirectToCheckout({
            sessionId: sessionId
        }).then(function (result) {
            console.log(result)
        });
    </script>
    <?php
    return;
}

$size = sizeof($panier);

if ($size != 0) {
    ?>
    <div class="container block_Carts">
        <div class="row">
            <div class="col-lg-8 block_Carts_1">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th style="text-align: center" scope="col">&nbsp;</th>
                        <th style="text-align: center" scope="col">Référence</th>
                        <th style="text-align: center" scope="col">Annoceur</th>
                        <th style="text-align: center" scope="col">Nom</th>
                        <th style="text-align: center" scope="col">Nombres</th>
                        <th style="text-align: center" scope="col">Poids</th>
                        <th style="text-align: center" scope="col">Prix</th>
                        <th style="text-align: center" scope="col">total</th>
                        <th style="text-align: center" scope="col">+</th>
                        <th style="text-align: center" scope="col">-</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $nb = "1";
                    $total = 0;
                    foreach ($panier as $panierF) {
                        $id = $panierF['card_id'];
                        $IdProduct = $panierF['product_id'];
                        $idFarmerProduct = $panierF['farmer_id'];
                        $Nb = $panierF['card_quantity'];

                        $NameAnnonceur = $panierF['farmer_name'] . ' ' . $panierF['farmer_lastname'];
                        $ProduitForeach = $objCarts->idLIsteProduit($IdProduct);

                        $IdListeProduit = $panierF['lproduct_id'];
                        $Prix = $panierF['product_price'];
                        $UnitWeight = $panierF['product_weight'];
                        $NameProducts = $panierF['lproduct_name'];

                        $calcule1 = $Prix;
                        $calcule2 = $Nb;
                        $resCalcul = $calcule1 * $calcule2;
                        $total += $resCalcul;

                        $tva = $total * 0.055;
                        ?>
                        <tr>
                            <th scope="row"><?= $nb ?></th>
                            <th style="text-align: center" scope="row"><a
                                        href="<?= routeUrl() ?>Products/produit=<?= $IdProduct ?>"><?= $IdProduct ?></a>
                            </th>
                            <th style="text-align: center" scope="row"><a
                                        href="<?= routeUrl() ?>Farmers/agriculteur=<?= $idFarmerProduct ?>"><?= $NameAnnonceur ?></a>
                            </th>
                            <th style="text-align: center" scope="row"><a
                                        href="<?= routeUrl() ?>Products/filters/<?= $IdListeProduit ?>/0/0/0/1"><?= $NameProducts ?></a>
                            </th>
                            <th style="text-align: center" scope="row"><?= $Nb ?></th>
                            <th style="text-align: center" scope="row"><?= $UnitWeight ?></th>
                            <th style="text-align: center" scope="row"><?= $Prix ?>€</th>
                            <th style="text-align: center" scope="row"><?= $Prix * $Nb ?>€</th>
                            <th style="text-align: center" scope="row">
                                <form method="post">
                                    <input type="hidden" name="produit" value="<?= $id ?>"/>
                                    <input type="submit" name="add1" value="+"/>
                                </form>
                            </th>
                            <th style="text-align: center" scope="row">
                                <form method="post">
                                    <input type="hidden" name="produit" value="<?= $id ?>"/>
                                    <input type="submit" name="no1" value="-"/>
                                </form>
                            </th>
                        </tr>
                        <?php
                        $nb = $nb + "1";
                    }
                    ?>
                    <tr>
                        <th scope="row"></th>
                        <th style="text-align: center" scope="row"></th>
                        <th style="text-align: center" scope="row"></th>
                        <th style="text-align: center" scope="row"></th>
                        <th style="text-align: center" scope="row"></th>
                        <th style="text-align: center" scope="row"></th>
                        <th style="text-align: center" scope="row">HT :</th>
                        <th style="text-align: center" scope="row"><?= $total ?>€</th>
                        <th style="text-align: center" scope="row"></th>
                        <th style="text-align: center" scope="row"></th>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <th style="text-align: center" scope="row"></th>
                        <th style="text-align: center" scope="row"></th>
                        <th style="text-align: center" scope="row"></th>
                        <th style="text-align: center" scope="row"></th>
                        <th style="text-align: center" scope="row"></th>
                        <th style="text-align: center" scope="row">TVA :</th>
                        <th style="text-align: center" scope="row">5,5%</th>
                        <th style="text-align: center" scope="row"></th>
                        <th style="text-align: center" scope="row"></th>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <th style="text-align: center" scope="row"></th>
                        <th style="text-align: center" scope="row"></th>
                        <th style="text-align: center" scope="row"></th>
                        <th style="text-align: center" scope="row"></th>
                        <th style="text-align: center" scope="row"></th>
                        <th style="text-align: center" scope="row">TTC</th>
                        <th style="text-align: center" scope="row"><?= $total + $tva ?>€</th>
                        <th style="text-align: center" scope="row"></th>
                        <th style="text-align: center" scope="row"></th>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <th style="text-align: center" scope="row"></th>
                        <th style="text-align: center" scope="row"></th>
                        <th style="text-align: center" scope="row"></th>
                        <th style="text-align: center" scope="row"></th>
                        <th style="text-align: center" scope="row"></th>
                        <th style="text-align: center" scope="row">Livraison</th>
                        <th style="text-align: center" scope="row"><?= $delivery_price ?>€</th>
                        <th style="text-align: center" scope="row"></th>
                        <th style="text-align: center" scope="row"></th>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <th style="text-align: center" scope="row"></th>
                        <th style="text-align: center" scope="row"></th>
                        <th style="text-align: center" scope="row"></th>
                        <th style="text-align: center" scope="row"></th>
                        <th style="text-align: center" scope="row"></th>
                        <th style="text-align: center" scope="row">Total</th>
                        <th style="text-align: center" scope="row"><?= $total + $tva + $delivery_price ?>€</th>
                        <th style="text-align: center" scope="row"></th>
                        <th style="text-align: center" scope="row"></th>
                    </tr>
                    </tbody>
                </table>
                <div class="col-lg-4 block_Carts_2">
                    <form method="post">
                        <a href="<?= routeUrl() ?>Account/Livraison">Ajouter une adresse de livraison</a>
                        <label <?= $errorDelivery ? 'style="color: red"' : '' ?> >Adresse de livraison :</label>
                        <?php
                        foreach ($objCarts->selectAdresseLivraison($session) as $inputlivraison) {
                            ?>
                            <div class="block_Carts_2_livraison">
                                <input type="radio" value="<?= $inputlivraison['Id'] ?>" name="delivery"/>
                                <p><?= $inputlivraison['RoadNumber'] . ' ' . $inputlivraison['Road'] . ' ' . $inputlivraison['RoadName']?>,</p>
                                <p><?= $inputlivraison['PostalCode'] . ', ' . $inputlivraison['City']?></p>
                                <p><?= $inputlivraison['County'] ?></p>
                                <hr>
                            </div>
                            <?php
                        }
                        ?>
                        <br/>
                        <input type="submit" name="pay" value="Payer"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
} else {
    ?>
    <div class="container block_Carts">
        <p>Pas de produit dans votre panier : <a href="<?= routeUrl() ?>Products/1">Ajouter des produits</a></p>
    </div>
    <?php
}
?>