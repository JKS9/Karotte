<?php
include "controller/OrderHistory.php";

if(isset($_SESSION['user'])){
    ?>
    <div class="container block_Ordder_history">
        <div class="row block_Ordder_history_info">
            <div class="col-sm-12 block_Ordder_history_info_title">
                <h4>Information :</h4>
            </div>
            <div class="col-sm-4 block_Ordder_history_info_danger">
                <div class="p-3 mb-2 bg-danger text-white" style="width: 50px;height: 50px;border-radius: 25px;margin: 0 auto;border: 1px solid #fff;"></div>
                <p>Confirmation waiting</p>
            </div>
            <div class="col-sm-4 block_Ordder_history_info_warning">
                <div class="p-3 mb-2 bg-warning text-white" style="width: 50px;height: 50px;border-radius: 25px;margin: 0 auto;border: 1px solid #fff;"></div>
                <p>shipping in progress</p>
            </div>
            <div class="col-sm-4 block_Ordder_history_info_success">
                <div class="p-3 mb-2 bg-success text-white" style="width: 50px;height: 50px;border-radius: 25px;margin: 0 auto;border: 1px solid #fff;"></div>
                <p>Delivery made</p>
            </div>
        </div>
        <h2>Order list :</h2>
        <?php
        $odersAll = $objDelivery->OrderDelivery($_SESSION['user'], '0');
        $nbOrdersAll = sizeof($odersAll);
        if($nbOrdersAll > 0){
            foreach($odersAll as $orderAll){
                $orderId = $orderAll['id_commande'];
                $status = $orderAll['commande_status'];
                $idfarmer = $orderAll['id_farmer'];

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
                                    <p><strong>referance n° : </strong></p>
                                    <p><?= $orderId ?></p>
                                </div>
                                <div class="col-lg-3">
                                    <p><strong>Order date :</strong></p>
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
                            <div class="block_Ordder_history_acheteur">
                                <p><strong>Buyer : </strong></p>
                                <p><?= $orderAll['user_lastName'] ?> <?= $orderAll['name_user'] ?></p>
                                <p><?= $orderAll['phone'] ?></p>
                            </div>
                            <div class="block_Ordder_history_delivery">
                                <p><strong>Delivery address :</strong></p>
                                <p><?= $orderAll['road_number'].' '.$orderAll['road'].' '.$orderAll['road_name'].','?></p>
                                <p><?= $orderAll['city'].', '.$orderAll['postal_code'] ?></p>
                                <p><?= $orderAll['region'].', '.$orderAll['country'] ?></p>
                            </div>
                        </div>
                        <div class="col-lg-10 block_Ordder_history_produit">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th style="text-align: center" scope="col">Referance</th>
                                    <th style="text-align: center" scope="col">Name</th>
                                    <th style="text-align: center" scope="col">Weight</th>
                                    <th style="text-align: center" scope="col">unit Price</th>
                                    <th style="text-align: center" scope="col">number</th>
                                    <th style="text-align: center" scope="col">Total Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $calttc = 0;
                                $qualiter = "";
                                $comPoucentage = "";
                                foreach($objDelivery->DeliveryToDoOrderProduit($orderId,$idfarmer) as $produit){
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
                <p style="text-align: center">You have not command</p>
            </div>
            <?php
        }
        ?>
    </div>
    <?php
}else{
    ?>
    <div class="container block_Ordder_history">
        <div class="row block_Ordder_history_info">
            <div class="col-sm-12 block_Ordder_history_info_title">
                <h4>Information :</h4>
            </div>
            <div class="col-sm-4 block_Ordder_history_info_danger">
                <div class="p-3 mb-2 bg-danger text-white" style="width: 50px;height: 50px;border-radius: 25px;margin: 0 auto;border: 1px solid #fff;"></div>
                <p>Confirmation waiting</p>
            </div>
            <div class="col-sm-4 block_Ordder_history_info_warning">
                <div class="p-3 mb-2 bg-warning text-white" style="width: 50px;height: 50px;border-radius: 25px;margin: 0 auto;border: 1px solid #fff;"></div>
                <p>shipping in progress</p>
            </div>
            <div class="col-sm-4 block_Ordder_history_info_success">
                <div class="p-3 mb-2 bg-success text-white" style="width: 50px;height: 50px;border-radius: 25px;margin: 0 auto;border: 1px solid #fff;"></div>
                <p>Delivery made</p>
            </div>
        </div>
        <h2>Order list :</h2>
        <?php
        $odersAll = $objDelivery->OrderDelivery($_SESSION['farmer'], '0');
        $nbOrdersAll = sizeof($odersAll);
        if($nbOrdersAll > 0){
            foreach($odersAll as $orderAll){
                $orderId = $orderAll['id_commande'];
                $status = $orderAll['commande_status'];
                $idfarmer = $orderAll['id_farmer'];

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
                                    <p><strong>Order date :</strong></p>
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
                            <div class="block_Ordder_history_acheteur">
                                <p><strong>Buyer : </strong></p>
                                <p><?= $orderAll['user_lastName'] ?> <?= $orderAll['name_user'] ?></p>
                                <p><?= $orderAll['phone'] ?></p>
                            </div>
                            <div class="block_Ordder_history_delivery">
                                <p><strong>Delivery address :</strong></p>
                                <p><?= $orderAll['road_number'].' '.$orderAll['road'].' '.$orderAll['road_name'].','?></p>
                                <p><?= $orderAll['city'].', '.$orderAll['postal_code'] ?></p>
                                <p><?= $orderAll['region'].', '.$orderAll['country'] ?></p>
                            </div>
                        </div>
                        <div class="col-lg-10 block_Ordder_history_produit">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th style="text-align: center" scope="col">Referance</th>
                                    <th style="text-align: center" scope="col">Name</th>
                                    <th style="text-align: center" scope="col">Weight</th>
                                    <th style="text-align: center" scope="col">unit Price</th>
                                    <th style="text-align: center" scope="col">number</th>
                                    <th style="text-align: center" scope="col">Total Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $calttc = 0;
                                $qualiter = "";
                                $comPoucentage = "";
                                foreach($objDelivery->DeliveryToDoOrderProduit($orderId,$idfarmer) as $produit){
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
                                        <th style="text-align: center" scope="col"><a href="<?= routeUrl() ?>Products/produit=<?= $produit['Produit_id'] ?>/"><?= $produit['Produit_id']?></a></th>
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
                <p style="text-align: center">You have not command</p>
            </div>
            <?php
        }
        ?>
    </div>
    <?php
}
?>