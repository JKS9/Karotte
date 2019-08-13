<?php
$explode = explode('/', $_GET['p']);

if(isset($_SESSION['farmer'])){
    if(isset($explode[3])){
        $selectRegion = $objRegister->displayRegion();
        $verifDelivery = $objDelivery->infoDelivery($explode[3],$_SESSION['farmer']);
        $nbVerif = sizeof($verifDelivery);
        if($nbVerif == '1'){
            ?>
            <div class="row Block_Delivery_Edit_From">
                <h4>Edit my delivery adress :</h4>
                <?= $errorinfoDelivery ?>
                <form method="post">
                    <?php
                    foreach($verifDelivery as $delivery){
                        ?>
                        <div class="col-md-12">
                            <label>Number street :</label>
                            <input type="text" name="roadNumber" value="<?= $delivery['RoadNumber']?>">
                        </div>
                        <div class="col-md-12">
                            <label>Street :</label>
                            <input type="text" name="Road" value="<?= $delivery['Road']?>">
                        </div>
                        <div class="col-md-12">
                            <label>Name of the street :</label>
                            <input type="text" name="RoadName" value="<?= $delivery['RoadName']?>">
                        </div>
                        <div class="col-md-12">
                            <label>City :</label>
                            <input type="text" name="City" value="<?= $delivery['City']?>">
                        </div>
                        <div class="col-md-12">
                            <label>Postal code :</label>
                            <input type="text" name="PostalCode" value="<?= $delivery['PostalCode']?>">
                        </div>
                        <div class="col-md-12">
                            <label>Department :</label>
                            <label><?= $objProfile->infoRegion($delivery['Region']) ?> (<?= $delivery['Region'] ?>) </label>
                        </div>
                        <div class="col-md-12">
                            <label>New department :</label>
                            <select name="Region">
                                <?php
                                foreach($selectRegion as $key => $value){
                                    ?>
                                    <option <?= ($key == $delivery['Region'])? 'selected': ''?> value="<?= $key; ?>"><?= $value ?></option>
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
                        <div class="col-md-12">
                            <label>Phone :</label>
                            <input type="number" name="Phone" value="<?= $delivery['Phone']?>">
                        </div>
                        <div class="col-md-12 editDeliveryOne">
                            <input type="submit" name="infoDelivery" value="Save">
                        </div>
                        <?php
                    }
                    ?>
                </form>
            </div>
            <?php
        }else{
            ?>
            <div class="row Block_Delivery_Edit_From">
                <p>the searched address was not found</p>
            </div>
            <?php
        }
        ?>

        <?php
    }else{
        ?>
        <div class="row Block_Delivery_Edit_From">
            <p>the searched address was not found</p>
        </div>
        <?php
    }
}else{
    if(isset($explode[3])){
        $selectRegion = $objRegister->displayRegion();
        $verifDelivery = $objDelivery->infoDelivery($explode[3],$_SESSION['user']);
        $nbVerif = sizeof($verifDelivery);
        if($nbVerif == '1'){
            ?>
            <div class="row Block_Delivery_Edit_From">
                <h4>Edit my delivery adress :</h4>
                <?= $errorinfoDelivery ?>
                <form method="post">
                    <?php
                    foreach($verifDelivery as $delivery){
                        ?>
                        <div class="col-md-12">
                            <label>Number street :</label>
                            <input type="text" name="roadNumber" value="<?= $delivery['RoadNumber']?>">
                        </div>
                        <div class="col-md-12">
                            <label>street :</label>
                            <input type="text" name="Road" value="<?= $delivery['Road']?>">
                        </div>
                        <div class="col-md-12">
                            <label>Name of the street :</label>
                            <input type="text" name="RoadName" value="<?= $delivery['RoadName']?>">
                        </div>
                        <div class="col-md-12">
                            <label>City :</label>
                            <input type="text" name="City" value="<?= $delivery['City']?>">
                        </div>
                        <div class="col-md-12">
                            <label>POstal code :</label>
                            <input type="text" name="PostalCode" value="<?= $delivery['PostalCode']?>">
                        </div>
                        <div class="col-md-12">
                            <label>Department :</label>
                            <label><?= $objProfile->infoRegion($delivery['Region']) ?> (<?= $delivery['Region'] ?>) </label>
                        </div>
                        <div class="col-md-12">
                            <label>New department :</label>
                            <select name="Region">
                                <?php
                                foreach($selectRegion as $key => $value){
                                    ?>
                                    <option <?= ($key == $delivery['Region'])? 'selected': ''?> value="<?= $key; ?>"><?= $value ?></option>
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
                        <div class="col-md-12">
                            <label>Phone :</label>
                            <input type="number" name="Phone" value="<?= $delivery['Phone']?>">
                        </div>
                        <div class="col-md-12 editDeliveryOne">
                            <input type="submit" name="infoDelivery" value="Save">
                        </div>
                        <?php
                    }
                    ?>
                </form>
            </div>
            <?php
        }else{
            ?>
            <div class="row Block_Delivery_Edit_From">
                <p>the searched address was not found</p>
            </div>
            <?php
        }
        ?>

        <?php
    }else{
        ?>
        <div class="row Block_Delivery_Edit_From">
            <p>the searched address was not found</p>
        </div>
        <?php
    }
}
?>