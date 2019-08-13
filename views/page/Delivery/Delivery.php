<div class="block_delivery_to_do">
    <?= $DeliverySend ?>
    <h2>Delivery to do :</h2>
    <?php
    $oders = $objDelivery->DeliveryToDo($idFarmer);
    $nbOrders = sizeof($oders);
    if($nbOrders > 0){
        foreach($oders as $order){
            $orderId = $order['id_commande'];
            $status = $order['commande_status'];

            $color = '<div class="p-3 mb-2 bg-danger text-white" style="width: 50px;height: 50px;border-radius: 25px"></div>';

            ?>
            <div class="block_Ordder_history_order">
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
                            <p><strong>Delivery Adress :</strong></p>
                            <p><?= $order['road_number'].' '.$order['road'].' '.$order['road_name'].','?></p>
                            <p><?= $order['city'].', '.$order['postal_code'] ?></p>
                            <p><?= $order['region'].', '.$order['country'] ?></p>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th style="text-align: center" scope="col">Reference</th>
                                <th style="text-align: center" scope="col">Name</th>
                                <th style="text-align: center" scope="col">Weigth</th>
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
                            foreach($objDelivery->DeliveryToDoOrderProduit($orderId,$idFarmer) as $produit){
                                $total = $produit['Produit_prix']  * $produit['nb_produit'];
                                $calttc = $calttc + $total;
                                if($produit['Qualiter'] == 1){
                                    $qualiter = 0.15;
                                    $comPoucentage = '15%';
                                }else{
                                    $qualiter = 0.20;
                                    $comPoucentage = "20%";
                                }
                                ?>
                                <tr>
                                    <th style="text-align: center" scope="col"><a href="<?= routeUrl() ?>AdHistory/annonce=<?= $produit['Produit_id'] ?>/"><?= $produit['Produit_id']?></a></th>
                                    <th style="text-align: center" scope="col"><?= $produit['Liste_Produit_Name']?></th>
                                    <th style="text-align: center" scope="col"><?= $produit['Produit_Unit_Weight']?></th>
                                    <th style="text-align: center" scope="col"><?= $produit['Produit_prix']?>€</th>
                                    <th style="text-align: center" scope="col"><?= $produit['nb_produit']?></th>
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
                </div>
                <p>option :<p>
                <div class="row">
                    <div class="col-md-12">
                        <p>Send Order</p>
                        <form method="post">
                            <input type="hidden" name="id" value="<?= $orderId ?>">
                            <input class="EnvoyerColis" type="submit" name="envoyer" value="Send">
                        </form>
                    </div>
                </div>
            </div>
            <?php
        }
    }else{
        ?>
        <div class="block_delivery_no">
            <p style="text-align: center">You do not have delivery to do :</p>
        </div>
        <?php
    }
?>
</div>
<div class="block_delivery_all">
    <h2>Listing order :</h2>
    <?php
    $odersAll = $objDelivery->DeliveryAll($idFarmer);
    $nbOrdersAll = sizeof($odersAll);
    if($nbOrdersAll > 0){
        foreach($odersAll as $orderAll){
            $orderId = $orderAll['id_commande'];
            $status = $orderAll['commande_status'];

            if($status > 0){
                if($status > 1){
                    $color = '<div class="p-3 mb-2 bg-success text-white" style="width: 50px;height: 50px;border-radius: 25px"></div>';
                }else{
                    $color = '<div class="p-3 mb-2 bg-warning text-dark" style="width: 50px;height: 50px;border-radius: 25px"></div>';
                }
            }else{
                $color = '<div class="p-3 mb-2 bg-danger text-white" style="width: 50px;height: 50px;border-radius: 25px"></div>';
            }
            ?>
            <div class="block_Ordder_history_order">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-3">
                                <p><strong>Reference n° : </strong></p>
                                <p><?= $orderId ?></p>
                            </div>
                            <div class="col-lg-3">
                                <p><strong>Order Date :</strong></p>
                                <p><?= $orderAll['date_Commande'] ?></p>
                            </div>
                            <div class="col-lg-3">
                                <p><strong>TTC : </strong></p>
                                <p><?= $orderAll['prix_end'] ?> €</p>
                            </div>
                            <div class="col-lg-3">
                                <?= $color ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="block_delivery_to_do_order_acheteur">
                            <p><strong>Buyer : </strong></p>
                            <p><?= $orderAll['user_lastName'] ?> <?= $orderAll['name_user'] ?></p>
                            <p><?= $orderAll['phone'] ?></p>
                        </div>
                        <div class="block_delivery_to_do_order_delivery">
                            <p><strong>Delivery Adress :</strong></p>
                            <p><?= $orderAll['road_number'].' '.$orderAll['road'].' '.$orderAll['road_name'].','?></p>
                            <p><?= $orderAll['city'].', '.$orderAll['postal_code'] ?></p>
                            <p><?= $orderAll['region'].', '.$orderAll['country'] ?></p>
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
                            foreach($objDelivery->DeliveryToDoOrderProduit($orderId,$idFarmer) as $produit){
                                $total = $produit['Produit_prix']  * $produit['nb_produit'];
                                $calttc = $calttc + $total;
                                if($produit['Qualiter'] == 1){
                                    $qualiter = "0.15";
                                    $comPoucentage = '15%';
                                }else{
                                    $qualiter = "0.20";
                                    $comPoucentage = "20%";
                                }
                                ?>
                                <tr>
                                    <th style="text-align: center" scope="col"><a href="<?= routeUrl() ?>AdHistory/annonce=<?= $produit['Produit_id'] ?>/"><?= $produit['Produit_id']?></a></th>
                                    <th style="text-align: center" scope="col"><?= $produit['Liste_Produit_Name']?></th>
                                    <th style="text-align: center" scope="col"><?= $produit['Produit_Unit_Weight']?></th>
                                    <th style="text-align: center" scope="col"><?= $produit['Produit_prix']?>€</th>
                                    <th style="text-align: center" scope="col"><?= $produit['nb_produit']?></th>
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
                </div>
            </div>
            <?php
        }
    }else{
        ?>
        <div class="block_delivery_no">
            <p style="text-align: center">You do not have order</p>
        </div>
        <?php
    }
    ?>
</div>