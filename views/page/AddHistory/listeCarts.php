<table class="table table-striped">
    <thead>
    <tr>
        <th style="text-align: center" scope="col">N°</th>
        <th style="text-align: center" scope="col">reference</th>
        <th style="text-align: center" scope="col">Name</th>
        <th style="text-align: center" scope="col">Weight</th>
        <th style="text-align: center" scope="col">Price</th>
        <th style="text-align: center" scope="col">Actif</th>
        <th style="text-align: center" scope="col">info</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $nb = "1";
    foreach ($annonces as $annonce){
    ?>
    <tr>
        <th style="text-align: center" scope="row"><?= $nb ?></th>
        <th style="text-align: center" scope="row"><?= $annonce['Id'] ?></th>
        <th style="text-align: center" scope="row"><?= $objProducts->listeProduit($annonce['IdListeProduit']); ?></th>
        <th style="text-align: center" scope="row"><?= $annonce['UnitWeight'] ?></th>
        <th style="text-align: center" scope="row"><?= $annonce['Prix'] ?></th>
        <th style="text-align: center" scope="row">
            <?php
            if ($annonce['Actif'] == '0') {
                ?>
                <img src="<?= routeUrl() ?>src/images/icone/petiteIcone/minus-circle.svg" style="width: 20px" alt="icone">
                <?php
            } else if ($annonce['Actif'] == '1') {
                ?>
                <img src="<?= routeUrl() ?>src/images/icone/petiteIcone/check-circle.svg" style="width: 20px" alt="icone">
                <?php
            }
            ?>
        </th>
        <th style="text-align: center" scope="row"><a href="<?= routeUrl() ?>AdHistory/annonce=<?= $annonce['Id'] ?>/"><img src="<?= routeUrl() ?>src/images/icone/petiteIcone/arrow-right.svg" style="width: 20px" alt="icone"></a></th>
        <?php
        $nb = $nb + "1";
        }
        ?>
    </tbody>
</table>