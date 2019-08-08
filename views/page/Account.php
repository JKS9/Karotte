<?php
require "controller/account.php"
?>
<div class="container block_account">
    <div class="row block_account_row">
        <div class="col-sm-3">
            <ul class="list-group">
                <li class="list-group-item"><a href="<?= routeUrl() ?>Account/Profil">Moi</a></li>
                <li class="list-group-item"><a href="<?= routeUrl() ?>Account/Livraison">Adresse de livraison</a></li>
                <li class="list-group-item"><a href="<?= routeUrl() ?>Account/Messageries">Messageries</a></li>
                <?php
                if(isset($_SESSION['farmer'])){
                    ?>
                    <li class="list-group-item"><a href="<?= routeUrl() ?>Account/Virement">Virements</a></li>
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