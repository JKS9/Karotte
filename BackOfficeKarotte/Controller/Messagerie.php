<?php
$objOffice = new office($connectOffice);

$listesr = $objOffice->listingConversation();

if(isset($_POST['envoyer'])){
    $messsage = addslashes($_POST['messsage']);

    if(!empty($messsage)){
        $explode = explode('/',$_GET['i']);

        $envoi = $objOffice->InsertMmessage($messsage,$explode[1]);
    }else{
        echo "remplit ton message";
    }
}
?>