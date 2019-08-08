<?php
if(isset($_SESSION['farmer'])){
    if(sizeof($url) <= 1) {
        include "views/page/Me/Me.php";
    }else{
        if($url[1] === "Profil"){
            if(isset($url[2])){
                if($url[2] === "Edit"){
                    include "views/page/Me/edit/Me_Edit.php";
                }else{
                    include "views/page/Me/Me.php";
                }
            }else{
                include "views/page/Me/Me.php";
            }
        }else if($url[1] === 'Livraison'){
            if(isset($url[2])){
                if($url[2] === "Edit"){
                    include "views/page/Me/edit/Me_Delivery_Edit.php";
                }else{
                    include "views/page/Me/Me_Delivery.php";
                }
            }else{
                include "views/page/Me/Me_Delivery.php";
            }
        }else if ($url[1] === 'Messageries'){
            include "views/page/Me/Me_Messagerie.php";
        }else if ($url[1] === 'Virement'){
            include "views/page/Me/Me_Virement.php";
        }else{
            include "views/page/Me/Me.php";
        }
    }
}else{
    if(sizeof($url) <= 1) {
        include "views/page/Me/Me.php";
    }else{
        if($url[1] === "Profil"){
            if(isset($url[2])){
                if($url[2] === "Edit"){
                    include "views/page/Me/edit/Me_Edit.php";
                }else{
                    include "views/page/Me/Me.php";
                }
            }else{
                include "views/page/Me/Me.php";
            }
        }else if($url[1] === 'Livraison'){
            if(isset($url[2])){
                if($url[2] === "Edit"){
                    include "views/page/Me/edit/Me_Delivery_Edit.php";
                }else{
                    include "views/page/Me/Me_Delivery.php";
                }
            }else{
                include "views/page/Me/Me_Delivery.php";
            }
        }else if ($url[1] === 'Messageries'){
            include "views/page/Me/Me_Messagerie.php";
        }else{
            include "views/page/Me/Me.php";
        }
    }
}
?>