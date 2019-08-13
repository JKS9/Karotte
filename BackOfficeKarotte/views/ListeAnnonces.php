<?php
require "Controller/ListeAnnonces.php";

if(isset($urlExplodeAnnonce[1])){
    $verif = $objOffice->verifAnnonces($urlExplodeAnnonce[1]);
    if($verif > 0){
        ?>
        <div class="container ListeUtilisateurs">
            <h4>The information of an ad:</h4>
            <div class="InfoUtilisateur">
            <?php
            foreach ($objOffice->InfoAnnonce($urlExplodeAnnonce[1]) as $info) {
                ?>
                <h4>Id :</h4>
                <h4>IdListeProduit :</h4>
                <h4>Name :</h4>
                <h4>Price :</h4>
                <p><?= $info['Id'] ?></p>
                <p><?= $info['IdListeProduit'] ?></p>
                <p><?= $objOffice->NameAnnonce($info['IdListeProduit']) ?></p>
                <p><?= $info['Prix'] ?></p>
                <h4>Biographie :</h4>
                <h4>Qualiter :</h4>
                <h4>Unit Weight :</h4>
                <h4>Nunber Stock :</h4>
                <p><?= $info['Biographie'] ?></p>
                <p><?= $info['Qualiter'] ?></p>
                <p><?= $info['UnitWeight'] ?></p>
                <p><?= $info['NbStock'] ?></p>
                <h4>IdFarmers :</h4>
                <h4>Department :</h4>
                <h4>CreationDate :</h4>
                <h4>....</h4>
                <p><?= $info['IdFarmers'] ?></p>
                <p><?= $info['Region'] ?></p>
                <p><?= $info['CreationDate'] ?></p>
                <p>null</p>
                <?php
            }
            ?>
            </div>
        </div>
        <?php
    }else{
        ?>
        <div class="container ListeUtilisateurs">
            <h4>The information af an ad :</h4>
            <div class="InfoUtilisateur">
                <div class="alert alert-danger" role="alert">
                    ad not found :
                </div>
            </div>
        </div>
        <?php
    }
}else{
    ?>
    <div class="container ListeUtilisateurs">
        <h4>List ad :</h4>
        <table class="table table-hover table-fixed">
            <thead>
            <tr>
                <th>Id</th>
                <th>IdListeProduit</th>
                <th>Name</th>
                <th>Price</th>
                <th>Qualiter</th>
                <th>IdFarmers</th>
                <th>CreationDate</th>
                <th>Info</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($listes as $Liste){
                ?>
                <tr>
                    <td><?= $Liste['Id'] ?></td>
                    <td><?= $Liste['IdListeProduit'] ?></td>
                    <td><?= $objOffice->NameAnnonce($Liste['IdListeProduit']) ?></td>
                    <td><?= $Liste['Prix'] ?>€</td>
                    <td><?= $Liste['Qualiter'] ?></td>
                    <td><?= $Liste['IdFarmers'] ?></td>
                    <td><?= $Liste['CreationDate'] ?></td>
                    <th style="text-align: center" scope="row"><a href="<?= routeUrlBO() ?>ListeAnnonces/<?= $Liste['Id'] ?>"><img src="<?= routeUrlBO() ?>src/images/icone/petiteIcone/arrow-right.svg" style="width: 20px" alt="icone"></a></th>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
    <?php
}
?>