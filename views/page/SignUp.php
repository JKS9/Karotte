<?php
include "controller/register.php"
?>
<section>
    <div class="container register_block">
        <div class="row">
            <div class="col-sm-3">
                <div class="register_block_1_button">
                    <a href="<?= routeUrl() ?>SignUp/users">I am User</a>
                </div>
                <div class="register_block_1_button">
                    <a href="<?= routeUrl() ?>SignUp/farms">I am Farmer</a>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="register_block_2">
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
            </div>
        </div>
    </div>
</section>