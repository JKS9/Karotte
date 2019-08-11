<?php
require "../../config.php";
require "../../configbdd.php";
require "../../models/connect.class.php";
require "../../models/profile.class.php";

$objProfile = new profile($connect);

if(isset($_SESSION['farmer'])){
    $session = $_SESSION['farmer'];
}else{
    $session = $_SESSION['user'];
}
$messages = $objProfile->Messagerie($session);
$nb = sizeof($messages);
if($nb > 0){

    foreach($messages as $message){
        if($message['idEnvoi'] == $session){
            ?>
            <div class="block_message">
                <h2 style="text-align: right;margin: 0; font-size: 12px; float: right; padding-right: 15px; width: 100%;">You</h2>
                <div class="message_User" style="text-align: right;font-weight: bold;background-color: #2f6f9f; color: #fff; width: 60%; border-radius: 5px 5px; float: right; padding-right: 15px;">
                    <h5><?= $message['message'] ?></h5>
                </div>
                <p style="background: #fff; width: 60%; padding: 0; float: right;font-size: 10px;margin: 0px 15px 0px 0px;text-align: right;"><?= $message['date'] ?></p>
            </div>
            <?php
        }else{
            ?>
            <div class="block_message">
                <h2 style="text-align: left;margin: 0; font-size: 12px; float: left; padding-left: 15px; width: 100%;">Admin</h2>
                <div class="message_Admin" style="background-color: #818a91 ; color: #fff;font-weight: bold; width: 60%; border-radius: 5px 5px; float: left; padding-left: 15px;">
                    <h5><?= $message['message'] ?></h5>
                </div>
                <p style="background: #fff; width: 60%; padding: 0; float: left;font-size: 10px;margin: 0px 0px 0px 15px;"><?= $message['date'] ?></p>
            </div>
            <?php
        }
    }
}else{
    ?>
        <div class="erreur_message">
            <p>vous n'avez pas de messages avec nos administrateur.</p>
            <p>N'hésite pas à nous posez une question si ta besoin d'aide.</p>
        </div>
    <?php
}
?>