<?php
if(isset($_SESSION['farmer'])){
    ?>
    <div class="row block_account_me_row">
        <div class="col-md-12">
            <?php
            $filename = "././src/images/Agriculteurs/".$idfarmer.".jpg";
            if(file_exists($filename)) {
                ?>
                <img src="<?= routeUrl() ?>src/images/Agriculteurs/<?= $idfarmer ?>.jpg">
                <?php
            }else{
                ?>
                <img src="<?= routeUrl() ?>src/images/icone/iconeUsers/default.jpg" alt='icone defaut'/>
                <?php
            }
            ?>
        </div>
        <div class="col-md-12">
            <div class="block_account_me_info_name">
                <?php
                foreach($objProfile->infoUser($_SESSION['farmer']) as $info){
                    ?>
                    <p><?= $info['Name'] ?> <?= $info['LastName'] ?></p>
                    <?php
                }
                ?>
            </div>
            <div class="block_account_me_info_email">
                <?php
                foreach($objProfile->infoUser($_SESSION['farmer']) as $info){
                    ?>
                    <p><?= $info['Email'] ?></p>
                    <p><?= $info['DateBirth'] ?></p>
                    <?php
                }
                ?>
            </div>
        </div>
        <div class="col-md-12">
            <div class="block_account_me_info_type">
                <?php
                foreach($objProfile->infoFarmer($idfarmer) as $infoF){
                    ?>
                    <p><?= $infoF['Biography'] ?></p>
                    <?php
                    if($infoF['Type'] == '1' ){
                    ?>
                        <img src="<?= routeUrl() ?>src/images/icone/petiteIcone/biologic.svg" style="width: 55px;" alt="logo qualiter organic">
                    <?php
                    }else{
                        ?>
                        <img src="<?= routeUrl() ?>src/images/icone/petiteIcone/no-biologic-green.svg" style="width: 55px;" alt="logo qualiter no-organic">
                        <?php
                    }
                }
                ?>
            </div>
            <div class="block_account_me_info_road">
                <?php
                foreach($objProfile->infoFarmer($idfarmer) as $infoF){
                    ?>
                    <p><?= $infoF['roadNumber'].' '.$infoF['Road'].' '.$infoF['RoadName'].','?></p>
                    <p><?= $infoF['City'].', '.$infoF['PostalCode'] ?></p>
                    <p><?= $objProfile->infoRegion($infoF['Region']) ?> (<?= $infoF['Region'] ?>)</p>
                    <?php
                }
                ?>
            </div>
            <div class="block_account_me_info_phone">
                <?php
                foreach($objProfile->infoFarmer($idfarmer) as $infoF){
                    ?>
                    <p><?= $infoF['Phone'] ?></p>
                    <?php
                }
                ?>
            </div>
        </div>
        <div class="col-md-12">
            <a href="<?= routeUrl() ?>Account/Profil/Edit">éditer profil</a>
        </div>
    </div>
    <?php
}else{
    ?>
    <div class="row block_account_me_row">
        <div class="col-md-12">
            <div class="block_account_me_info_name">
                <?php
                foreach($objProfile->infoUser($_SESSION['user']) as $info){
                    ?>
                    <p><?= $info['Name'] ?></p>
                    <p><?= $info['LastName'] ?></p>
                    <?php
                }
                ?>
            </div>
            <div class="block_account_me_info_email">
                <?php
                foreach($objProfile->infoUser($_SESSION['user']) as $info){
                    ?>
                    <p><?= $info['Email'] ?></p>
                    <p><?= $info['DateBirth'] ?></p>
                    <?php
                }
                ?>
            </div>
            <div class="block_account_me_info_edit">
                <a href="<?= routeUrl() ?>Account/Profil/Edit">éditer profil</a>
            </div>
        </div>
    </div>
    <?php
}
?>