<?php
require "../../config.php";
require "../../configbdd.php";
require "../../model/connectOffice.class.php";
require "../../model/office.class.php";

$objOffice = new office($connectOffice);

$Conversations = $objOffice->listingConversation();
$nb = sizeof($Conversations);
if($nb > 0){
    foreach($Conversations as $Conversation){
        ?>
        <li><a href="Messagerie/<?= $Conversation['Iduser'] ?>"><?= $objOffice->InfoNameUser($Conversation['Iduser']) ?></a></li>
        <?php
    }
}else{
    ?>
    <li>not conversation</li>
    <?php
}
?>