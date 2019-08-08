<?php
require "config.php";
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
    <link href="<?= routeUrlBO() ?>src/asset/css/2486-bootstrap-modification.css" rel="stylesheet">
    <!-- CSS Karotte -->
    <link href="<?= routeUrlBO() ?>src/asset/css/2486.css" rel="stylesheet">
    <!-- CSS Karotte "Media query" -->
    <link href="<?= routeUrlBO() ?>src/asset/css/2486-media-query.css" rel="stylesheet">
    <!-- Link Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Link Bootstrap "Js" -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<?php
$url = "";

if(isset($_SESSION['Admin'])){
    require "views/LitleMenu.php";

    $Pages = array('Menu', 'ListeUtilisateurs','ListeAgriulteurs','ListeAnnonces','ListeProduits','ListeVenteProduit','VerificationAnnonces', 'CommandesUtilisateurs', 'ActiveUtilisateurs','ActiveAgriculteur', 'Messagerie','StatistiquesUtilisateurs','StatistiquesAgriculteurs','StatistiquesStockage');
    if (isset($_GET['i'])) {
        $url = explode('/', $_GET['i']);
        if ($url == "") {
            require "views/Menu.php";
        } elseif (in_array($url[0], $Pages)) {
            require "views/" . $url[0] . ".php";
        }else{
            require "views/Menu.php";
        }
    }else{
        require "views/Menu.php";
    }
}else{
    require "views/connexion.php";
}
?>
</body>
</html>
