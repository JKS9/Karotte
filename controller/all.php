<?php
/** appel du modules All **/
$objAll = new all($connect);

/** Page Home **/
/** State Farmers this day**/
$statistiqueFarmerSignUpDay = $objAll->homeStateFarmerSignUpDay();
$statistiqueFarmerProductDay = $objAll->homeStateFarmersProductsDay();

/** State users this day**/
$statistiqueUsersSignUpDay = $objAll->homeStateUserSignUpDay();
$statistiqueUsersCommandeDay = $objAll->homeStateUserCommande();
?>