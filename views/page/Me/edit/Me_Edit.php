<?php
if(isset($_SESSION['farmer'])){
    $objRegister = new register($connect);
    $selectRegion = $objRegister->displayRegion();
    ?>
    <div class="row block_account_me_edit">
        <h4>Modifier mes informations :</h4>
        <?= $errorInfoPerso ?>
        <?= $errorProfilPicture ?>
        <?= $errorInfoPersoFarmer ?>
        <?php
        foreach($objProfile->infoUser($_SESSION['farmer']) as $edit){
            ?>
            <form method="post">
                <div class="col-md-12">
                    <label>Nom :</label>
                    <input type="text" name="Name" value="<?= $edit['Name']?>">
                </div>
                <div class="col-md-12">
                    <label>Prénom :</label>
                    <input type="text" name="LastName" value="<?= $edit['LastName']?>">
                </div>
                <div class="col-md-12">
                    <label>Email :</label>
                    <input type="text" name="Email" value="<?= $edit['Email']?>">
                </div>
                <div class="col-md-12">
                    <label>Date de naissance :</label>
                    <input type="date" name="DateBirth" value="<?= $edit['DateBirth']?>">
                </div>
                <div class="col-md-12 editAccount">
                    <input type="submit" class="ButtonPay" name="infoPerso" value="edit">
                </div>
            </form>
            <?php
        }
        ?>
        <form method="post" enctype="multipart/form-data">
            <div class="col-md-12">
                <?php
                $filename = "././src/images/Agriculteurs/".$idfarmer.".jpg";
                if(file_exists($filename)) {
                    ?>
                    <img style="width: 100px" src="<?= routeUrl() ?>src/images/Agriculteurs/<?= $idfarmer ?>.jpg">
                    <?php
                }else{
                    ?>
                    <img style="width: 100px" src="<?= routeUrl() ?>src/images/icone/iconeUsers/default.jpg" alt='icone defaut'/>
                    <?php
                }
                ?>
                <h4>photo de profil :</h4>
                <input type="file" name="file_picture">
                <div class="editAccount">
                    <input type="submit" name="picture" value="ajouter"/>
                </div>
            </div>
        </form>
        <form method="post">
            <div class="row">
                <?php
                foreach($objProfile->infoFarmer($idfarmer) as $editFarmer) {
                    ?>
                    <div class="col-md-12 textArea_account">
                        <label>Biography :</label>
                        <textarea name="Biography"><?= $editFarmer['Biography']?></textarea>
                    </div>
                    <div class="col-md-12">
                        <label>Numéro de rue :</label>
                        <input type="text" name="roadNumber" value="<?= $editFarmer['roadNumber']?>">
                    </div>
                    <div class="col-md-12">
                        <label>rue :</label>
                        <input type="text" name="Road" value="<?= $editFarmer['Road']?>">
                    </div>
                    <div class="col-md-12">
                        <label>Nom de rue :</label>
                        <input type="text" name="RoadName" value="<?= $editFarmer['RoadName']?>">
                    </div>
                    <div class="col-md-12">
                        <label>Ville :</label>
                        <input type="text" name="City" value="<?= $editFarmer['City']?>">
                    </div>
                    <div class="col-md-12">
                        <label>Code postal :</label>
                        <input type="text" name="PostalCode" value="<?= $editFarmer['PostalCode']?>">
                    </div>
                    <div class="col-md-12">
                        <label>Département :</label>
                        <label><?= $objProfile->infoRegion($editFarmer['Region']) ?> (<?= $editFarmer['Region'] ?>) </label>
                    </div>
                    <div class="col-md-12 region_account">
                        <label>Nouveau département :</label>
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
                    <div class="col-md-12">
                        <label>Phone :</label>
                        <input type="number" name="Phone" value="<?= $editFarmer['Phone']?>">
                    </div>
                    <div class="col-md-12 editAccountend">
                        <input type="submit" name="infoPersofarmer" value="sauvgarder">
                    </div>
                    <?php
                }
                ?>
            </div>
        </form>
    </div>
    <?php
}else{
    ?>
    <div class="row block_account_me_edit">
        <h4>Modifier mes informations :</h4>
        <?= $errorInfoPerso ?>
        <?php
        foreach($objProfile->infoUser($_SESSION['user']) as $edit) {
        ?>
            <form method="post">
                <div class="col-md-12">
                    <label>Nom :</label>
                    <input type="text" name="Name" value="<?= $edit['Name'] ?>">
                </div>
                <div class="col-md-12">
                    <label>Prénom :</label>
                    <input type="text" name="LastName" value="<?= $edit['LastName'] ?>">
                </div>
                <div class="col-md-12">
                    <label>Email :</label>
                    <input type="text" name="Email" value="<?= $edit['Email'] ?>">
                </div>
                <div class="col-md-12">
                    <label>Date de naissance :</label>
                    <input type="date" name="DateBirth" value="<?= $edit['DateBirth'] ?>">
                </div>
                <div class="col-md-12 editAccountend">
                    <input type="submit" name="infoPerso" value="sauvgarder">
                </div>
            </form>
        <?php
        }
        ?>
    </div>
    <?php
}