<?php
require "Controller/VerificationAnnonces.php";
?>
<div class="container ListeUtilisateurs">
    <?= $erreur ?>
    <h4>List of products awaiting validation :</h4>
    <table class="table table-hover table-fixed">
        <thead>
        <tr>
            <th>Id</th>
            <th>IdListeProduit</th>
            <th>Name</th>
            <th>Prix</th>
            <th>Biography</th>
            <th>Qualiter</th>
            <th>UnitWeight</th>
            <th>NbStock</th>
            <th>IdFarmers</th>
            <th>CreationDate</th>
            <th>Validation</th>
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
                <td><?= $Liste['Prix'] ?></td>
                <td><?= $Liste['Biographie'] ?></td>
                <td><?= $Liste['Qualiter'] ?></td>
                <td><?= $Liste['UnitWeight'] ?></td>
                <td><?= $Liste['NbStock'] ?></td>
                <td><?= $Liste['IdFarmers'] ?></td>
                <td><?= $Liste['CreationDate'] ?></td>
                <td>
                    <form method="post">
                        <input type="hidden" name="num" value="<?= $Liste['Id'] ?>">
                        <input class="produitInput" type="submit" name="validation" value="Activation">
                    </form>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>