<?php
include "controller/login.php";
?>
<div class="container login_block">
    <form method="post">
        <div class="login_block_form">
            <span><strong>Menber Login</strong></span>
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