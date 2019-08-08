<?php
require_once('vendor/autoload.php');
require "config.php";
include "controller/all.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Karotte</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- CSS Karotte "bootstrap modification" -->
    <link href="<?= routeUrl() ?>src/asset/css/bootstrap-modification.css" rel="stylesheet">
    <!-- CSS Karotte -->
    <link href="<?= routeUrl() ?>src/asset/css/karotte.css" rel="stylesheet">
    <!-- CSS Karotte "Media query" -->
    <link href="<?= routeUrl() ?>src/asset/css/karotte-media-query.css" rel="stylesheet">
    <!-- Link Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Link Bootstrap "Js" -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <!-- Link Jquery "animation" -->
    <script type="text/javascript" src="<?= routeUrl() ?>src/asset/jquery/animation.js"></script>
    <!-- Link Javascript "script" -->
    <script type="text/javascript" src="<?= routeUrl() ?>src/asset/javascript/refresh.js"></script>
</head>
<body>
    <?php
    $url = "";

    if(isset($_SESSION['user'])){

        $Pages = array('Home', 'Farmers', 'Products', 'Account', 'OrderHistory','Cart','SiteMap', 'PaymentOk', 'PaymentFail');

        include "views/header/Menu_connect_user.php";

        if (isset($_GET['p'])) {
            $url = explode('/', $_GET['p']);
            if ($url == "") {
                require "views/page/Home.php";
            } elseif (in_array($url[0], $Pages)) {
                require "views/page/" . $url[0] . ".php";
            }else{
                require "views/error/404.php";
            }
        }else{
            require "views/page/Home.php";
        }

        include "views/footer/Footer_connect_user.php";

    }else if (isset($_SESSION['farmer'])){

        $Pages = array('Home', 'Farmers', 'Products', 'Account', 'OrderHistory', 'AdHistory','AddAnAd','Cart','SiteMap','Delivery', 'PaymentOk', 'PaymentFail');

        include "views/header/Menu_connect_farmers.php";

        if (isset($_GET['p'])) {
            $url = explode('/', $_GET['p']);
            if ($url == "") {
                require "views/page/Home.php";
            } elseif (in_array($url[0], $Pages)) {
                require "views/page/" . $url[0] . ".php";
            }else{
                require "views/error/404.php";
            }
        }else{
            require "views/page/Home.php";
        }

        include "views/footer/Footer_connect_farmer.php";

    }else{
        $Pages = array('Home', 'Farmers', 'Products', 'SignUp', 'Login','SiteMap');

        include "views/header/Menu_no_connect.php";

        if (isset($_GET['p'])) {
            $url = explode('/', $_GET['p']);
            if ($url == "") {
                require "views/page/Home.php";
            } elseif (in_array($url[0], $Pages)) {
                require "views/page/" . $url[0] . ".php";
            }else{
                require "views/error/404.php";
            }
        }else{
            require "views/page/Home.php";
        }

        include "views/footer/Footer_no_connect.php";

    }
    ?>
</body>
</html>
