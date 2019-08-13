<?php
require "Controller/ListeProduits.php"
?>
<div class="container ListeUtilisateurs">
    <?= $erreur ?>
    <div class="row">
        <div class="col-sm-5">
            <h4>Product list :</h4>
            <table class="table table-hover table-fixed">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Off</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach($listes as $Liste){
                    ?>
                    <tr>
                        <td><?= $Liste['Id'] ?></td>
                        <td><?= $Liste['Name'] ?></td>
                        <td>
                            <form method="post">
                                <input type="hidden" name="num" value="<?= $Liste['Id'] ?>">
                                <input class="produitInput" type="submit" name="deactiver" value="off">
                            </form>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
        <div class="col-sm-7">
            <h4>List of products awaiting activation:</h4>
            <table class="table table-hover table-fixed">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
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