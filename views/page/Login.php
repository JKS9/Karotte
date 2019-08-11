<?php
include "controller/login.php";
?>
<div class="container login_block">
    <div class="row">
        <div class="col-sm-5">
            <form method="post">
                <div class="login_block_form">
                    <h4><strong>Member Login</strong></h4>
                    <div class="input_Login">
                        <span class="glyphicon glyphicon-user">
                            <input type="text" name="Email" placeholder="Email"/>
                        </span>
                    </div>
                    <div class="input_Login">
                        <span class="glyphicon glyphicon-lock">
                            <input type="password" name="Password" placeholder="Password">
                        </span>
                    </div>
                    <?php
                    echo $errorLog;
                    ?>
                    <div class="input_Button_login">
                        <input type="submit" name="Login" value="Login">
                    </div>
                </div>
            </form>
        </div>
        <div class="col-sm-7">
            <div class="login_block_2_img">
                <img style="width: 100%;" src="<?= routeUrl() ?>src/images/photoSite/undraw_authentication_fsn5.svg"/>
            </div>
        </div>
    </div>

</div>