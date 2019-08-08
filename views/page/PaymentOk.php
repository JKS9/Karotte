<?php
require "controller/payments.php";

if ($fail) {
    ?>
    <p>Le token de paiement est invalide</p>
    <?php
    return;
}


?>

<p>Le paiement a été pris en compte, les articles seront livrés prochainement</p>
