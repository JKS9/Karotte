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
    ?>
    <div class="Message">
    <?php
    foreach($messages as $message){
        if($message['idEnvoi'] == $session){
            ?>
            <div class="block_message">
                <div class="message_User" style="text-align: right; background-color: #2f6f9f; color: #000; width: 60%; border-radius: 0px 5px; float: right; padding-right: 15px;">
                    <p><?= $message['message'] ?></p>
                </div>
                <p><?= $message['date'] ?></p>
            </div>
            <?php
        }else{
            ?>
            <div class="block_message">
                <div class="message_Admin" style="background-color: #818a91 ; color: #000; width: 60%; border-radius: 5px 0px; float: left; padding-right: 15px;">
                    <p><?= $message['message'] ?></p>
                </div>
                <p><?= $message['date'] ?></p>
            </div>
            <?php
        }
    }
    ?>
    </div>
    <?php
}else{
    ?>
    <div class="Message">
        <div class="erreur_message">
            <p>vous n'avez pas de messages avec nos administrateur.</p>
            <p>N'hésite pas à nous posez une question si ta besoin d'aide.</p>
        </div>
    </div>
    <?php
}
?>