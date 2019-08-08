<?php
$replaceUrl = $_GET['p'];
$filters = explode('/', $replaceUrl);
$array = array();

$reqAnd = "0";
$query_cond_1 = "";
$query_cond_2 = "";
$query_cond_3 = "";
$query_cond_4 = "";

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
if($filters[4] != 0) {
    if($reqAnd == "1"){
        $query_cond_3 .= " AND UnitWeight = '".$filters[4]."' ";
    }else{
        $query_cond_3 .= " WHERE UnitWeight = '".$filters[4]."' ";
        $reqAnd = "1";
    }
}
if($filters[5] != 0){
    if($filters[5] == 1){
        $query_cond_4 .= " ORDER BY `Prix` ASC ";
    }
    if($filters[5] == 2){
        $query_cond_4 .= " ORDER BY `Prix` DESC ";
    }
}

$req = $query_cond_1.$query_cond_2.$query_cond_3.$query_cond_4;

$produitsFiltre = $objProducts->searchFilters($req);
$nbpagination = sizeof($produitsFiltre);

foreach($produitsFiltre as $filtres){
?>
    <div class="produit">
        <a href="<?= routeUrl() ?>Products/produit=<?= $filtres['Id'] ?>">
            <img src="<?= routeUrl() ?>src/images/produits/<?= $objProducts->listeProduit($filtres['IdListeProduit']) ?>.jpg" style="width: 100px;" alt="produit image">
            <p><?= $objProducts->listeProduit($filtres['IdListeProduit'])?></p>
            <p><?= $filtres['Prix']?> €</p>
            <p><?= $filtres['UnitWeight']?></p>
                <?php
            if($filtres['Qualiter'] == '1' ){
                ?>
            <img src="<?= routeUrl() ?>src/images/icone/petiteIcone/biologic.svg" style="width: 55px;" alt="logo qualiter organic">
                <?php
            }else{
                ?>
            <img src="<?= routeUrl() ?>src/images/icone/petiteIcone/no-biologic-green.svg" style="width: 55px;" alt="logo qualiter no-organic">
                <?php
            }
            foreach ($objProducts->flagRegion($filtres['Region']) as $flag){
                if($flag['departement_code'] == '29'){
                    ?>
                    <img src="<?= routeUrl() ?>src/images/imageRegion/29_Finistère.JPG" alt="blason département français">
                    <strong><?= $flag['departement_nom']?></strong>
                    <?php
                }else{
                    ?>
                    <img src="<?= routeUrl() ?>src/images/imageRegion/<?= $flag['departement_code'] ?>_<?= $flag['departement_nom']?>.png" alt="blason département français">
                    <strong><?= $flag['departement_nom']?></strong>
                    <?php
                }

            }
            ?>
            <hr>
        </a>
    </div>
        <?php
}
$exlpodeUrl = explode('/', $_GET['p']);

if($nbpagination >= 10){
    $nb = ceil($nbpagination / 10);
    for ($i = 0; $i <= $nb; $i++) {
        //tu recup la page sur l'aquelle t'es et si c'est = a i
        ?>
            <a href="<?= routeUrl() ?><?= $exlpodeUrl[0] ?>/<?= $exlpodeUrl[1] ?>/<?= $exlpodeUrl[2] ?>/<?= $exlpodeUrl[3] ?>/<?= $exlpodeUrl[4] ?>/<?= $exlpodeUrl[5] ?>/<?= $i + 1 ?>"><?= $i + 1 ?></a>
            <?php
    }
}
    ?>