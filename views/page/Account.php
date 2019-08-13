<?php
require "controller/account.php"
?>
<div class="container block_account">
    <div class="row block_account_row">
        <div class="col-sm-3">
            <ul class="list-group">
                <li class="list-group-item"><a style="text-decoration: none;" href="<?= routeUrl() ?>Account/Profil">Me</a></li>
                <li class="list-group-item"><a style="text-decoration: none;" href="<?= routeUrl() ?>Account/Livraison">Delivery Adress</a></li>
                <li class="list-group-item"><a style="text-decoration: none;" href="<?= routeUrl() ?>Account/Messageries">Messenger</a></li>
                <?php
                if(isset($_SESSION['farmer'])){
                    ?>
                    <li class="list-group-item"><a style="text-decoration: none;" href="<?= routeUrl() ?>Account/Virement">Transfer</a></li>
                    <?php
                }
                ?>
            </ul>
        </div>
        <div class="col-sm-9">
            <?php
            include "controller/display/displayAccount.php";
            ?>
        </div>
    </div>
</div>