<?php
require "controller/payments.php";

if ($fail) {
    ?>
    <p>the payment token is invalid</p>
    <?php
    return;
}


?>

<p>the payment has been taken into account, the items will be delivered soon</p>
