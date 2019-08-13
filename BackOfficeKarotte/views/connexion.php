<?php
require "Controller/login.php"
?>
<div class="login_block">
    <form method="post">
        <div class="login_block_form">
            <h4><strong>Admin Login</strong></h4>
            <div class="input_Login">
                <span class="glyphicon glyphicon-user">
                    <input type="text" name="Login" placeholder="Login"/>
                </span>
            </div>
            <div class="input_Login">
                <span class="glyphicon glyphicon-lock">
                    <input type="password" name="Password" placeholder="Password">
                </span>
            </div>
            <?php
            echo $log;
            ?>
            <div class="input_Button_login">
                <input type="submit" name="Log" value="Login">
            </div>
        </div>
    </form>
</div>
