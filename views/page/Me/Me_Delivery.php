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
                <p>Vous n'avez pas ajouter d'adresse à votre carnet.</p>
                <p>Seulement 3 adresse autoriser</p>
                <p>Remplir le formulaire si-dessous pour ajouter une adresse</p>
                <?php
            }else{
                ?>
                <ul class="list-group">
                    <?php
                    $nb = 1;
                    foreach($deliverys as $delivery){
                        ?>
                        <li class="list-group-item">
                            <h3>Adresse de livraison n°<?= $nb ?></h3>
                            <div class="row">
                                <div class="col-sm-9">
                                    <p><?= $delivery['RoadNumber'].' '.$delivery['Road'].' '.$delivery['RoadName'].','?></p>
                                    <p><?= $delivery['City'].', '.$delivery['PostalCode'] ?></p>
                                    <p><?= $objProfile->infoRegion($delivery['Region']) ?> (<?= $delivery['Region'] ?>)</p>
                                    <p><?= $delivery['County'] ?>)</p>
                                    <span>Téléphone :</span>
                                    <p><?= $delivery['Phone'] ?></p>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form_delivery">
                                        <form method="post">
                                            <input type="hidden" name="adresse" value="<?= $delivery['Id'] ?>">
                                            <input type="submit" name="deleteDelivery" value="Supprimer">
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
                <p>Vous ne pouvez pas ajouter de nouvelles adresse à votre carnet.</p>
                <p>seulement 3 adresse autoriser</p>
            </div>
            <?php
        }else{
            ?>
            <div class="col-md-12">
                <div class="row">
                    <?= $errorAddadresse ?>
                    <form method="post">
                        <div class="col-sm-12">
                            <label>Rue :</label>
                            <select name="Road">
                                <option value="Rue">Rue</option>
                                <option value="Avenue">Avenue</option>
                                <option value="boulevard">boulevard</option>
                                <option value="Impasse">Impasse</option>
                            </select>
                        </div>
                        <div class="col-sm-12">
                            <label>Nom de rue :</label>
                            <input type="text" name="NameStreet" placeholder="Name Street">
                        </div>
                        <div class="col-sm-12">
                            <label>Numéro de la rue :</label>
                            <input type="number" name="NumberStreet" placeholder="Number Street">
                        </div>
                        <div class="col-sm-12">
                            <label>Code postal :</label>
                            <input type="number" name="PostalCode" placeholder="Postal Code">
                        </div>
                        <div class="col-sm-12">
                            <label>Ville :</label>
                            <input type="text" name="City" placeholder="City">
                        </div>
                        <div class="col-sm-12">
                            <label>Département :</label>
                            <select name="Region">
                                <option>choisir un département</option>
                                <?php
                                foreach($selectRegion as $key => $value){
                                    ?>
                                    <option value="<?= $key; ?>"><?= $value ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-12">
                            <label>Pays :</label>
                            <select name="Country">
                                <option value="France">France</option>
                            </select>
                        </div>
                        <div class="col-sm-12">
                            <label>Téléphone :</label>
                            <input type="number" name="Phone" placeholder="Phone">
                        </div>
                        <div class="col-sm-12">
                            <input type="submit" name="Addadresse" value="Ajouter une adresse">
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
                <p>Vous n'avez pas ajouter d'adresse à votre carnet.</p>
                <p>Seulement 3 adresse autoriser</p>
                <p>Remplir le formulaire si-dessous pour ajouter une adresse</p>
                <?php
            }else{
                ?>
                <ul class="list-group">
                    <?php
                    $nb = 1;
                    foreach($deliverys as $delivery){
                        ?>
                        <li class="list-group-item">
                            <h3>Adresse de livraison n°<?= $nb ?></h3>
                            <div class="row">
                                <div class="col-sm-9">
                                    <p><?= $delivery['RoadNumber'].' '.$delivery['Road'].' '.$delivery['RoadName'].','?></p>
                                    <p><?= $delivery['City'].', '.$delivery['PostalCode'] ?></p>
                                    <p><?= $objProfile->infoRegion($delivery['Region']) ?> (<?= $delivery['Region'] ?>)</p>
                                    <p><?= $delivery['County'] ?></p>

                                    <span>Téléphone :</span>
                                    <p><?= $delivery['Phone'] ?></p>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form_delivery">
                                        <form method="post">
                                            <input type="hidden" name="adresse" value="<?= $delivery['Id'] ?>">
                                            <input type="submit" name="deleteDelivery" value="Supprimer">
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
                <p>Vous ne pouvez pas ajouter de nouvelles adresse à votre carnet.</p>
                <p>seulement 3 adresse autoriser</p>
            </div>
            <?php
        }else{
            ?>
            <div class="col-md-12">
                <div class="row">
                    <?= $errorAddadresse ?>
                    <form method="post">
                        <div class="col-sm-12">
                            <label>Rue :</label>
                            <select name="Road">
                                <option value="Rue">Rue</option>
                                <option value="Avenue">Avenue</option>
                                <option value="boulevard">boulevard</option>
                                <option value="Impasse">Impasse</option>
                            </select>
                        </div>
                        <div class="col-sm-12">
                            <label>Nom de rue :</label>
                            <input type="text" name="NameStreet" placeholder="Name Street">
                        </div>
                        <div class="col-sm-12">
                            <label>Numéro de la rue :</label>
                            <input type="number" name="NumberStreet" placeholder="Number Street">
                        </div>
                        <div class="col-sm-12">
                            <label>Code postal :</label>
                            <input type="number" name="PostalCode" placeholder="Postal Code">
                        </div>
                        <div class="col-sm-12">
                            <label>Ville :</label>
                            <input type="text" name="City" placeholder="City">
                        </div>
                        <div class="col-sm-12">
                            <label>Département :</label>
                            <select name="Region">
                                <option>choisir un département</option>
                                <?php
                                foreach($selectRegion as $key => $value){
                                    ?>
                                    <option value="<?= $key; ?>"><?= $value ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-12">
                            <label>Pays :</label>
                            <select name="Country">
                                <option value="France">France</option>
                            </select>
                        </div>
                        <div class="col-sm-12">
                            <label>Téléphone :</label>
                            <input type="number" name="Phone" placeholder="Phone">
                        </div>
                        <div class="col-sm-12">
                            <input type="submit" name="Addadresse" value="Ajouter une adresse">
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
