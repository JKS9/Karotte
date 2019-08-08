<?php
$Farmers = $objFarmers->displayFarmers();
foreach ($Farmers as $farmers) {
    $iduser = $farmers['IdUser'];
    $idFarmers = $farmers['Id'];
    $FarmerRegion = $farmers['Region'];
    $farmersprofile = $objFarmers->infoUser($iduser);
    $TypeFarmer = $farmers['Type'];

    $nbpagination = sizeof($Farmers);


    foreach ($farmersprofile as $farmerP) {

        $nameFarmer = $farmerP['Name'];
        $LastNameFaemer = $farmerP['LastName'];
        ?>
        <div class="agriculteur">
            <a href="<?= routeUrl() ?>Farmers/agriculteur=<?= $idFarmers ?>">
                <div class="agriculteur_Name">
                    <p><strong><?= $LastNameFaemer . ' ' . $nameFarmer ?></strong></p>
                </div>
                <div class="agriculteur_picture">
                    <?php
                    $filename = "././src/images/Agriculteurs/".$idFarmers.".jpg";
                    if(file_exists($filename)) {
                        ?>
                        <img src="<?= routeUrl() ?>src/images/Agriculteurs/<?= $idFarmers ?>.jpg">
                        <?php
                    }else{
                        ?>
                        <img src="<?= routeUrl() ?>src/images/icone/iconeUsers/default.jpg" alt='icone defaut'/>
                        <?php
                    }
                    ?>
                </div>
                <div class="agriculteur_Type">
                    <?php
                    if ($TypeFarmer == '1') {
                        ?>
                        <img src="<?= routeUrl() ?>src/images/icone/petiteIcone/biologic.svg" style="width: 55px;" alt="logo qualiter organic">
                        <?php
                    } else {
                        ?>
                        <img src="<?= routeUrl() ?>src/images/icone/petiteIcone/no-biologic-green.svg" style="width: 55px;" alt="logo qualiter no-organic">
                        <?php
                    }
                    ?>
                </div>
                <div class="agriculteur_picture_departement">
                    <?php
                    foreach ($objProducts->flagRegion($FarmerRegion) as $flag) {
                        if ($flag['departement_code'] == '29') {
                            ?>
                            <img src="<?= routeUrl() ?>src/images/imageRegion/29_Finistère.JPG"
                                 alt="blason département français">
                            <strong><?= $flag['departement_nom'] ?></strong>
                            <?php
                        } else {
                            ?>
                            <img src="<?= routeUrl() ?>src/images/imageRegion/<?= $flag['departement_code'] ?>_<?= $flag['departement_nom'] ?>.png"
                                 alt="blason département français">
                            <strong><?= $flag['departement_nom'] ?></strong>
                            <?php
                        }
                    }
                    ?>
                </div>
                <hr>
            </a>
        </div>
        <?php
    }
}
if($nbpagination >= 5) {
    $nb = $objFarmers->rowCountPageAgriculteur();
    for ($i = 0; $i <= $nb; $i++) {
        //tu recup la page sur l'aquelle t'es et si c'est = a i
        ?>
        <a href="<?= routeUrl() ?>Farmers/<?= $i + 1 ?>"><?= $i + 1 ?></a>
        <?php
    }
}
?>