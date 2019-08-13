<?php
$replaceUrl = $_GET['p'];
$filters = explode('/', $replaceUrl);
$array = array();

$reqAnd = "0";
$query_cond_1 = "";
$query_cond_2 = "";

if($filters[2] != 0){
    $query_cond_1 .= " WHERE IdListeProduit = '".$filters[2]."' ";
    $reqAnd = "1";
}
if($filters[3] != 0){
    if($reqAnd == "1"){
        $query_cond_2 .= " AND Region = '".$filters[3]."' ";
    }else{
        $query_cond_2 .= " WHERE Region = '".$filters[3]."' ";
        $reqAnd = "1";
    }
}

$req = $query_cond_1.$query_cond_2;

$farmersFiltre = $objFarmers->searchFilters($req);
$nbpagination = sizeof($farmersFiltre);

foreach ($farmersFiltre as $farmers) {
    $iduser = $farmers['IdUser'];
    $idFarmers = $farmers['IdFarmer'];
    $FarmerRegion = $farmers['Region'];

    $farmersprofile = $objFarmers->infoUser($iduser);

    foreach ($farmersprofile as $farmerP) {
        $idUsers = $farmerP['Id'];
        $nameFarmer = $farmerP['Name'];
        $LastNameFaemer = $farmerP['LastName'];
        $TypeFaemer = $objFarmers->infoUFarmers($iduser);
        $Qualiter = "";
        foreach ($TypeFaemer as $type){
            $Qualiter = $type['Type'];
        }
        ;
        ?>
        <div class="col-sm-3 Agriculteur">
            <a href="<?= routeUrl() ?>Farmers/agriculteur=<?= $idFarmers ?>">
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
                <div class="agriculteur_Name">
                    <p><strong><?= $LastNameFaemer . ' ' . $nameFarmer ?></strong></p>
                </div>
                <div class="agriculteur_picture_departement">
                    <?php
                    foreach ($objProducts->flagRegion($FarmerRegion) as $flag) {
                        if ($flag['departement_code'] == '29') {
                            ?>
                            <img src="<?= routeUrl() ?>src/images/imageRegion/29_Finistère.JPG"
                                 alt="blason département français">
                            <p><strong><?= $flag['departement_nom'] ?></strong></p>
                            <?php
                        } else {
                            ?>
                            <img src="<?= routeUrl() ?>src/images/imageRegion/<?= $flag['departement_code'] ?>_<?= $flag['departement_nom'] ?>.png"
                                 alt="blason département français">
                            <p><strong><?= $flag['departement_nom'] ?></strong></p>
                            <?php
                        }
                    }
                    ?>
                </div>
            </a>
        </div>
        <?php
    }
}
if($nbpagination >= 10){
    $nb = ceil($nbpagination / 10);
    for ($i = 0; $i <= $nb; $i++) {
        ?>
        <a class="pagination" href="<?= routeUrl() ?><?= $filters[0] ?>/<?= $filters[1] ?>/<?= $filters[2] ?>/<?= $filters[3] ?>/<?= $i + 1 ?>"><?= $i + 1 ?></a>
        <?php
    }
}

?>