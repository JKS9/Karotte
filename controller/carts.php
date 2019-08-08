<?php

use \Firebase\JWT\JWT;
use \Stripe\Stripe;

$objProducts = new products($connect);
$objRegister = new register($connect);
$objCarts = new carts($connect);

if(isset($_POST['add1'])){
    $idProduits = $_POST['produit'];

    $objCarts->cartsAddNb($idProduits);
}

if(isset($_POST['no1'])){
    $idProduits = $_POST['produit'];

    $objCarts->cartsNoNb($idProduits);
}

if(!isset($_SESSION['farmer'])){
    $session = $_SESSION['user'];
}else{
    $session = $_SESSION['farmer'];
}

if(!isset($_SESSION['farmer'])){
    $client_id = $_SESSION['user'];
    $panier = $objCarts->selectCarts($_SESSION['user']);
}else{
    $client_id = $_SESSION['farmer'];
    $panier = $objCarts->selectCarts($_SESSION['farmer']);
}

$isPayment = false;
$errorDelivery = false;

if(isset($_POST['pay'])) {

    if(!isset($_POST['delivery'])) {
        $errorDelivery = true;
        return;
    }

    $isPayment = true;

    function map_line_items($item)
    {
        $res = [];
        $res['name'] = $item['lproduct_name'];
        $res['amount'] = $item['product_price'] * 100 * 1.055; // on calcule le prix en centimes avec la TVA 5.5
        $res['currency'] = 'eur';
        $res['quantity'] = $item['card_quantity'];
        return $res;
    }

    function map_jwt_products($item)
    {
        $res = [];
        $res['product_id'] = $item['product_id'];
        $res['farmer_id'] = $item['farmer_farmer_id'];
        $res['quantity'] = $item['card_quantity'];
        $res['price'] = $item['product_price'] * 1.055; // on calcule le prix en centimes avec la TVA 5.5
        return $res;
    }

    $line_items = array_map('map_line_items', $panier);
    $jwt_products = array_map('map_jwt_products', $panier);

    $delivery = [];
    $delivery['name'] = 'Livraison';
    $delivery['amount'] = $delivery_price * 100;
    $delivery['currency'] = 'eur';
    $delivery['quantity'] = 1;

    array_push($line_items, $delivery);

    $token = array(
        "products" => $jwt_products,
        "deliveryPrice" => $delivery_price,
        "client_id" => $client_id,
        "delivery_id" => $_POST['delivery'],
        "ext" => strtotime("+30 minutes")
    );

    $jwt = JWT::encode($token, $jwt_secret);

    Stripe::setApiKey($stripe_api_sk);

    $session = \Stripe\Checkout\Session::create([
        'payment_method_types' => ['card'],
        'line_items' => [$line_items],
        'success_url' => $base_url . 'PaymentOk/' . $jwt,
        'cancel_url' => $base_url . 'PaymentFail',
    ]);
}

?>