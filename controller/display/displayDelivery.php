<?php
$exloderl = explode('/', $_GET['p']);

if(isset($exloderl[1])){

    if(($exloderl[1] === 'Id')){
        include "views/page/Delivery/DeliveryId.php";
    }

    if(($exloderl[1] === 'Reference')){
        include "views/page/Delivery/DeliveryStatus.php";
    }

}else{
    include "views/page/Delivery/Delivery.php";
}
?>