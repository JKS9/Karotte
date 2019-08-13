<?php
require "Controller/Messagerie.php";

$exlpodeMessage = explode('/',$_GET['i']);
?>
<div class="container message">
    <div class="row">
        <div class="col-sm-3">
            <div class="Conversation">
                <h4>List of conversation :</h4>
                <ul id="Convs">

                </ul>
            </div>
        </div>
        <div class="col-sm-9">
            <?php
            if(isset($exlpodeMessage[1])){
                ?>
                <div id="MessageUser">
                    <?php
                    $messages = $objOffice->Messagerie($exlpodeMessage[1]);
                    $nb = sizeof($messages);
                    if($nb > 0){
                        foreach($messages as $message){
                            if($message['idEnvoi'] == 'Admin'){
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
                                    <h2 style="text-align: left;margin: 0; font-size: 12px; float: left; padding-left: 15px; width: 100%;">Utilisateur</h2>
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
                        <div class="erreur_message_Office">
                            <p>You do not have a mess with your administrators</p>
                            <p>Do not hesitate to ask us a question if you need help</p>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div style="margin-top: 10px;" class="row">
                    <form method="post">
                        <div class="col-sm-10 inputMessageri">
                            <input type="text" name="messsage" placeholder="My message"/>
                        </div>
                        <div class="col-sm-2 buttonMessagerie">
                            <input type="submit" name="envoyer" value="Send"/>
                        </div>
                    </form>
                </div>
                <?php
            }else{
                ?>
                <div class="alert alert-danger" role="alert">
                    Select one conversation :
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>
