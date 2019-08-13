<div class="block_delivery_to_do">
    <h2>Search for an order for reference :</h2>
    <?php
    $id = explode('/', $_GET['p']);

    $oders = $objDelivery->DeliveryId($idFarmer, $id[2]);
    $nbOrders = sizeof($oders);
    if ($nbOrders > 0){
    foreach ($oders

    as $order){
    $orderId = $order['id_commande'];
    $status = $order['commande_status'];

    $color = '<div class="p-3 mb-2 bg-danger text-white" style="width: 50px;height: 50px;border-radius: 25px"></div>';

    ?>
    <div class="block_delivery_to_do_order" style="border: 1px solid #000;">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-3">
                        <p><strong>Reference n° : </strong></p>
                        <p><?= $orderId ?></p>
                    </div>
                    <div class="col-lg-3">
                        <p><strong>Order date :</strong></p>
                        <p><?= $order['date_Commande'] ?></p>
                    </div>
                    <div class="col-lg-3">
                        <p><strong>TTC : </strong></p>
                        <p><?= $order['prix_end'] ?> €</p>
                    </div>
                    <div class="col-lg-3">
                        <?= $color ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="block_delivery_to_do_order_acheteur">
                    <p><strong>Buyer : </strong></p>
                    <p><?= $order['user_lastName'] ?> <?= $order['name_user'] ?></p>
                    <p><?= $order['phone'] ?></p>
                </div>
                <div class="block_delivery_to_do_order_delivery">
                    <p><strong>Delivery adress :</strong></p>
                    <p><?= $order['road_number'] . ' ' . $order['road'] . ' ' . $order['road_name'] . ',' ?></p>
                    <p><?= $order['city'] . ', ' . $order['postal_code'] ?></p>
                    <p><?= $order['region'] . ', ' . $order['country'] ?></p>
                </div>
            </div>
            <div class="col-lg-10">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th style="text-align: center" scope="col">Reference</th>
                        <th style="text-align: center" scope="col">Name</th>
                        <th style="text-align: center" scope="col">Weight</th>
                        <th style="text-align: center" scope="col">Unit Price</th>
                        <th style="text-align: center" scope="col">Number</th>
                        <th style="text-align: center" scope="col">Total Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $calttc = 0;
                    $qualiter = "";
                    $comPoucentage = "";
                    foreach ($objDelivery->DeliveryToDoOrderProduit($orderId, $idFarmer) as $produit) {
                        $total = $produit['Produit_prix'] * $produit['nb_produit'];
                        $calttc = $calttc + $total;
                        if ($produit['Qualiter'] == 1) {
                            $qualiter = "0.15";
                            $comPoucentage = '15%';
                        } else {
                            $qualiter = "0.20";
                            $comPoucentage = "20%";
                        }
                        ?>
                        <tr>
                            <th style="text-align: center" scope="col"><a
                                        href="<?= routeUrl() ?>AdHistory/annonce=<?= $produit['Produit_id'] ?>/"><?= $produit['Produit_id'] ?></a>
                            </th>
                            <th style="text-align: center" scope="col"><?= $produit['Liste_Produit_Name'] ?></th>
                            <th style="text-align: center" scope="col"><?= $produit['Produit_Unit_Weight'] ?></th>
                            <th style="text-align: center" scope="col"><?= $produit['Produit_prix'] ?>€</th>
                            <th style="text-align: center" scope="col"><?= $produit['nb_produit'] ?></th>
                            <th style="text-align: center" scope="col"><?= $total ?> €</th>
                        </tr>
                        <?php
                    }
                    ?>
                    <tr>
                        <th style="text-align: center" scope="col"></th>
                        <th style="text-align: center" scope="col"></th>
                        <th style="text-align: center" scope="col"></th>
                        <th style="text-align: center" scope="col"></th>
                        <?php
                        $com = $calttc * $qualiter;
                        ?>
                        <th style="text-align: center" scope="col">commision <?= $comPoucentage ?></th>
                        <th style="text-align: center" scope="col"><?= $com ?>€</th>
                    </tr>
                    <tr>
                        <th style="text-align: center" scope="col"></th>
                        <th style="text-align: center" scope="col"></th>
                        <th style="text-align: center" scope="col"></th>
                        <th style="text-align: center" scope="col"></th>
                        <th style="text-align: center" scope="col">Delivery</th>
                        <th style="text-align: center" scope="col">3 €</th>
                    </tr>
                    <?php
                    $ttc = $calttc + $com + 3;
                    ?>
                    <tr>
                        <th style="text-align: center" scope="col"></th>
                        <th style="text-align: center" scope="col"></th>
                        <th style="text-align: center" scope="col"></th>
                        <th style="text-align: center" scope="col"></th>
                        <th style="text-align: center" scope="col">TTC</th>
                        <th style="text-align: center" scope="col"><?= $ttc ?> €</th>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-12">
                <?php
                $dlfacture = explode('/', $_GET['p']);
                ?>
                option :

                <p>Send Order</p>
                <form method="post">
                    <input type="hidden" name="id" value="<?= $orderId ?>">
                    <input type="submit" name="envoyer" value="Send">
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<?php
}
} else {
    ?>
    <div class="block_delivery_to_do_order">
        <p style="text-align: center">Order not found</p>
    </div>
    <?php
}
?>
</div>