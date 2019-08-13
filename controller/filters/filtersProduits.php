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
    <div class=" col-sm-3 produit">
        <a href="<?= routeUrl() ?>Products/produit=<?= $filtres['Id'] ?>">
            <div class="produit_picture">
                <img src="<?= routeUrl() ?>src/images/produits/<?= $objProducts->listeProduit($filtres['IdListeProduit']) ?>.jpg" style="width: 100px;" alt="produit image">
            </div>
            <div class="produit_info">
                <p><?= $objProducts->listeProduit($filtres['IdListeProduit'])?></p>
                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-3">
                        <p><?= $filtres['Prix']?> €</p>
                    </div>
                    <div class="col-sm-3">
                        <?php
                        if($filtres['Qualiter'] == '1' ){
                            ?>
                            <img src="<?= routeUrl() ?>src/images/icone/petiteIcone/biologic.svg" style="width: 25px;" alt="logo qualiter organic">
                            <?php
                        }else{
                            ?>
                            <img src="<?= routeUrl() ?>src/images/icone/petiteIcone/no-biologic-green.svg" style="width: 25px;" alt="logo qualiter no-organic">
                            <?php
                        }
                        ?>
                    </div>
                    <div class="col-sm-3"></div>
                </div>
            </div>
        </a>
    </div>
        <?php
}
$exlpodeUrl = explode('/', $_GET['p']);

if($nbpagination >= 10){
    $nb = ceil($nbpagination / 10);
    for ($i = 0; $i <= $nb; $i++) {
        ?>
            <a href="<?= routeUrl() ?><?= $exlpodeUrl[0] ?>/<?= $exlpodeUrl[1] ?>/<?= $exlpodeUrl[2] ?>/<?= $exlpodeUrl[3] ?>/<?= $exlpodeUrl[4] ?>/<?= $exlpodeUrl[5] ?>/<?= $i + 1 ?>"><?= $i + 1 ?></a>
            <?php
    }
}
    ?>