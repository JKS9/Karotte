<?php
require "Controller/ListeAgriculteur.php";

if(isset($urlExplodeFarmer[1])){
    $verif = $objOffice->verifFarmer($urlExplodeFarmer[1]);
    if($verif > 0){
        ?>
        <div class="container ListeUtilisateurs">
            <h4>The information of an farmer :</h4>
            <div class="InfoUtilisateur">
                <?php
                foreach ($objOffice->infoFarmer($urlExplodeFarmer[1]) as $info){
                    ?>
                    <h4>Id :</h4>
                    <h4>Name :</h4>
                    <h4>Surname :</h4>
                    <h4>Email :</h4>
                    <p><?= $info['Id'] ?></p>
                    <p><?= $info['Name'] ?></p>
                    <p><?= $info['LastName'] ?></p>
                    <p><?= $info['Email'] ?></p>
                    <h4>Date Birth :</h4>
                    <h4>CreationDate :</h4>
                    <h4>CreationIp :</h4>
                    <h4>Actif :</h4>
                    <p><?= $info['DateBirth'] ?></p>
                    <p><?= $info['CreationDate'] ?></p>
                    <p><?= $info['CreationIp'] ?></p>
                    <p><?= $info['Actif'] ?></p>
                    <?php
                }
                foreach ($objOffice->infoFarmerMore($urlExplodeFarmer[1]) as $info){
                    ?>
                    <h4>Qualiter :</h4>
                    <h4>Biography :</h4>
                    <h4>Bic :</h4>
                    <h4>IBAN :</h4>
                    <p><?= $info['Type'] ?></p>
                    <p><?= $info['Biography'] ?></p>
                    <p><?= $info['Bic'] ?></p>
                    <p><?= $info['IBAN'] ?></p>
                    <h4>Road :</h4>
                    <h4>RoadName :</h4>
                    <h4>roadNumber :</h4>
                    <h4>PostalCode :</h4>
                    <p><?= $info['Road'] ?></p>
                    <p><?= $info['RoadName'] ?></p>
                    <p><?= $info['roadNumber'] ?></p>
                    <p><?= $info['PostalCode'] ?></p>
                    <h4>City :</h4>
                    <h4>Department :</h4>
                    <h4>County :</h4>
                    <h4>Phone :</h4>
                    <p><?= $info['City'] ?></p>
                    <p><?= $info['Region'] ?></p>
                    <p><?= $info['County'] ?></p>
                    <p><?= $info['Phone'] ?></p>
                    <?php
                }
                ?>
            </div>
        </div>
        <?php
    }else{
        ?>
        <div class="container ListeUtilisateurs">
            <h4>The information of an farmer :</h4>
            <div class="InfoUtilisateur">
                <div class="alert alert-danger" role="alert">
                    Farmer not found :
                </div>
            </div>
        </div>
        <?php
    }
}else{
    ?>
    <div class="container ListeUtilisateurs">
        <h4>List farmers :</h4>
        <table class="table table-hover table-fixed">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Email</th>
                <th>DateBirth</th>
                <th>CreationDate</th>
                <th>CreationIp</th>
                <th>Actif</th>
                <th>info</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($listes as $Liste){
                ?>
                <tr>
                    <td><?= $Liste['Id'] ?></td>
                    <td><?= $Liste['Name'] ?></td>
                    <td><?= $Liste['LastName'] ?></td>
                    <td><?= $Liste['Email'] ?></td>
                    <td><?= $Liste['DateBirth'] ?></td>
                    <td><?= $Liste['CreationDate'] ?></td>
                    <td><?= $Liste['CreationIp'] ?></td>
                    <td>
                        <?php
                        if ($Liste['Actif'] == '1') {
                            ?>
                            <img src="<?= routeUrlBO() ?>src/images/icone/petiteIcone/minus-circle.svg" style="width: 20px" alt="icone">
                            <?php
                        } else if ($Liste['Actif'] == '0') {
                            ?>
                            <img src="<?= routeUrlBO() ?>src/images/icone/petiteIcone/check-circle.svg" style="width: 20px" alt="icone">
                            <?php
                        }
                        ?>
                    </td>
                    <th style="text-align: center" scope="row"><a href="<?= routeUrlBO() ?>ListeAgriulteurs/<?= $Liste['Id'] ?>"><img src="<?= routeUrlBO() ?>src/images/icone/petiteIcone/arrow-right.svg" style="width: 20px" alt="icone"></a></th>
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