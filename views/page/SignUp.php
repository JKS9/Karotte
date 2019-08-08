<?php
include "controller/register.php"
?>
<section>
    <div class="container register_block">
        <div class="row register_block_1">
            <div class="col register_block_1_button">
                    <a href="<?= routeUrl() ?>SignUp/users" class="register_block_1_button_a">Register user</a>
            </div>
            <div class="col register_block_1_button">
                    <a href="<?= routeUrl() ?>SignUp/farms" class="register_block_1_button_a">Register farmers</a>
            </div>
        </div>
        <?php
        if(sizeof($url) <= 1){
            include "registerUsers.php";
        }else{
            if($url[1] === 'users'){
                include "registerUsers.php";
            }else if ($url[1] === 'farms'){
                include "registerFarmers.php";
            }else{
                include "registerUsers.php";
            }
        }
        ?>
    </div>
</section>