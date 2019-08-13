<?php
if(isset($_SESSION['farmer'])){
    $selectRegion = $objRegister->displayRegion();
    $deliverys = $objProfile->infoDelivery($_SESSION['farmer']);
    $nbDelivery = sizeof($deliverys);
    ?>
    <div class="row block_account_Delivery">
        <div class="col-md-12">
            <?php
            if($nbDelivery == 0){
                ?>
                <p>You have not added an adress to your netBook</p>
                <p>Only three authorized adresses</p>
                <p>Fill out the form below to add an adress</p>
                <?php
            }else{
                ?>
                <ul class="list-group">
                    <?php
                    $nb = 1;
                    foreach($deliverys as $delivery){
                        ?>
                        <li class="list-group-item">
                            <h3>Delivery adress n°<?= $nb ?></h3>
                            <div class="row">
                                <div class="col-sm-9">
                                    <p><?= $delivery['RoadNumber'].' '.$delivery['Road'].' '.$delivery['RoadName'].','?></p>
                                    <p><?= $delivery['City'].', '.$delivery['PostalCode'] ?></p>
                                    <p><?= $objProfile->infoRegion($delivery['Region']) ?> (<?= $delivery['Region'] ?>)</p>
                                    <p><?= $delivery['County'] ?></p>
                                    <p><?= $delivery['Phone'] ?></p>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form_delivery">
                                        <form method="post">
                                            <input type="hidden" name="adresse" value="<?= $delivery['Id'] ?>">
                                            <input type="submit" name="deleteDelivery" value="Delete">
                                        </form>
                                    </div>
                                    <div class="edit_delivery">
                                        <a href="Livraison/Edit/<?= $delivery['Id'] ?>">Edit</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php
                        $nb = $nb + 1;
                    }
                    ?>
                </ul>
                <?php
            }
            ?>
        </div>
        <?php
        if($nbDelivery >= 3){
            ?>
            <div class="col-md-12">
                <p>Only three authorized adresses</p>
            </div>
            <?php
        }else{
            ?>
            <div class="col-md-12 block_account_delivery_add">
                <h4>Add delivery adress :</h4>
                <div class="row">
                    <?= $errorAddadresse ?>
                    <form method="post">
                        <div class="col-sm-12 region_delivery">
                            <label>Street :</label>
                            <select name="Road">
                                <option value="Rue">Rue</option>
                                <option value="Avenue">Avenue</option>
                                <option value="boulevard">boulevard</option>
                                <option value="Impasse">Impasse</option>
                            </select>
                        </div>
                        <div class="col-sm-12">
                            <label>Name of the street :</label>
                            <input type="text" name="NameStreet" placeholder="Name Street">
                        </div>
                        <div class="col-sm-12">
                            <label>Street number :</label>
                            <input type="number" name="NumberStreet" placeholder="Number Street">
                        </div>
                        <div class="col-sm-12">
                            <label>Postal code :</label>
                            <input type="number" name="PostalCode" placeholder="Postal Code">
                        </div>
                        <div class="col-sm-12">
                            <label>City :</label>
                            <input type="text" name="City" placeholder="City">
                        </div>
                        <div class="col-sm-12 region_delivery">
                            <label>Department :</label>
                            <select name="Region">
                                <option>Choise department</option>
                                <?php
                                foreach($selectRegion as $key => $value){
                                    ?>
                                    <option value="<?= $key; ?>"><?= $value ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-12 region_delivery">
                            <label>Country :</label>
                            <select name="Country">
                                <option value="France">France</option>
                            </select>
                        </div>
                        <div class="col-sm-12">
                            <label>Phone :</label>
                            <input type="number" name="Phone" placeholder="Phone">
                        </div>
                        <div class="col-sm-12 editDeliveryend">
                            <input type="submit" name="Addadresse" value="Add Delivery">
                        </div>
                    </form>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <?php
}else{
    $selectRegion = $objRegister->displayRegion();
    $deliverys = $objProfile->infoDelivery($_SESSION['user']);
    $nbDelivery = sizeof($deliverys);
    ?>
    <div class="row block_account_Delivery">
        <div class="col-md-12">
            <?php
            if($nbDelivery == 0){
                ?>
                <p>You have not added an adress to your netBook</p>
                <p>Only three authorized adresses</p>
                <p>Fill out the form below to add an adress</p>
                <?php
            }else{
                ?>
                <ul class="list-group">
                    <?php
                    $nb = 1;
                    foreach($deliverys as $delivery){
                        ?>
                        <li class="list-group-item">
                            <h3>Delivery adress n°<?= $nb ?></h3>
                            <div class="row">
                                <div class="col-sm-9">
                                    <p><?= $delivery['RoadNumber'].' '.$delivery['Road'].' '.$delivery['RoadName'].','?></p>
                                    <p><?= $delivery['City'].', '.$delivery['PostalCode'] ?></p>
                                    <p><?= $objProfile->infoRegion($delivery['Region']) ?> (<?= $delivery['Region'] ?>)</p>
                                    <p><?= $delivery['County'] ?></p>
                                    <p><?= $delivery['Phone'] ?></p>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form_delivery">
                                        <form method="post">
                                            <input type="hidden" name="adresse" value="<?= $delivery['Id'] ?>">
                                            <input type="submit" name="deleteDelivery" value="Delete">
                                        </form>
                                    </div>
                                    <div class="edit_delivery">
                                        <a href="Livraison/Edit/<?= $delivery['Id'] ?>">Edit</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php
                        $nb = $nb + 1;
                    }
                    ?>
                </ul>
            <?php
            }
            ?>
        </div>
        <?php
        if($nbDelivery >= 3){
            ?>
            <div class="col-md-12">
                <p>Only three authorized adresses</p>
            </div>
            <?php
        }else{
            ?>
            <div class="col-md-12 block_account_delivery_add">
                <h4>Add Delivery adress :</h4>
                <div class="row">
                    <?= $errorAddadresse ?>
                    <form method="post">
                        <div class="col-sm-12 region_delivery">
                            <label>Street :</label>
                            <select name="Road">
                                <option value="Rue">Rue</option>
                                <option value="Avenue">Avenue</option>
                                <option value="boulevard">boulevard</option>
                                <option value="Impasse">Impasse</option>
                            </select>
                        </div>
                        <div class="col-sm-12">
                            <label>Name of the street :</label>
                            <input type="text" name="NameStreet" placeholder="Name Street">
                        </div>
                        <div class="col-sm-12">
                            <label>Number street :</label>
                            <input type="number" name="NumberStreet" placeholder="Number Street">
                        </div>
                        <div class="col-sm-12">
                            <label>Postal code :</label>
                            <input type="number" name="PostalCode" placeholder="Postal Code">
                        </div>
                        <div class="col-sm-12">
                            <label>City :</label>
                            <input type="text" name="City" placeholder="City">
                        </div>
                        <div class="col-sm-12 region_delivery">
                            <label>Department :</label>
                            <select name="Region">
                                <option>Choise department</option>
                                <?php
                                foreach($selectRegion as $key => $value){
                                    ?>
                                    <option value="<?= $key; ?>"><?= $value ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-12 region_delivery">
                            <label>Country :</label>
                            <select name="Country">
                                <option value="France">France</option>
                            </select>
                        </div>
                        <div class="col-sm-12">
                            <label>Phone :</label>
                            <input type="number" name="Phone" placeholder="Phone">
                        </div>
                        <div class="col-sm-12 editDeliveryend">
                            <input type="submit" name="Addadresse" value="Add Delivery">
                        </div>
                    </form>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <?php
}
?>
