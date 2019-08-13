<?php
require "Controller/ActiveUtilisateur.php"
?>
<div class="container-fluid ListeUtilisateurs">
    <?= $erreur ?>
    <div class="row">
        <div class="col-lg-6">
            <h4>Actif users list :</h4>
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
                    <th>Désactivation</th>
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
                            <form method="post">
                                <input type="hidden" name="num" value="<?= $Liste['Id'] ?>">
                                <input class="produitInput" type="submit" name="deactiver" value="Désactivation">
                            </form>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
        <div class="col-lg-6">
            <h4>Deactivated users list :</h4>
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
                    <th>Activation</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach($listesActive as $Liste){
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
                            <form method="post">
                                <input type="hidden" name="num" value="<?= $Liste['Id'] ?>">
                                <input class="produitInput" type="submit" name="active" value="Activation">
                            </form>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>