<?php
if(isset($_POST['envoyer'])){
    $messsage = addslashes($_POST['messsage']);

    $envoi = $objProfile->InsertMmessage($messsage,$session);
}

if(isset($_POST['addBancaire'])){
    $bic = addslashes($_POST['Bic']);
    $iban = addslashes($_POST['IBAN']);

    $add = $objProfile->InsertIbanBic($iban,$bic, $idfarmer);
}

if(isset($_POST['ModifBancaire'])){
    $bic = addslashes($_POST['Bic']);
    $iban = addslashes($_POST['IBAN']);

    $edit = $objProfile->UpdateBank($iban,$bic, $idfarmer);
}
?>