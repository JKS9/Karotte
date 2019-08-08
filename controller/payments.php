<?php

use \Firebase\JWT\JWT;

$objOrders = new orders($connect);
$objCarts = new carts($connect);

if(!isset($_SESSION['farmer'])){
    $client_id = $_SESSION['user'];
}else{
    $client_id = $_SESSION['farmer'];
}

$jwt = explode('/', $_GET['p'])[1];

$fail = false;

try {
    $decoded = JWT::decode($jwt, $jwt_secret, array('HS256'));
} catch (Exception $e) {
    $fail = true;
    return;
}

if ($objOrders->isJwtUsed($jwt)){
    $fail = true;
    return;
}

$client_id = $decoded->client_id;
$delivery_id = $decoded->delivery_id;
$farmer_id = $decoded->products[0]->farmer_id;

$total_amount = 0;

foreach ($decoded->products as $item) {
    $total_amount += $item->price * $item->quantity;
}

$total_amount += $delivery_price;

$order_id = $objOrders->insertOrder($client_id, $farmer_id, $total_amount, $delivery_id, $jwt . 'a'); //... gerer id delivery et virer le . a

foreach ($decoded->products as $item) {
    $objOrders->insertProductOrder($order_id, $item->product_id, $item->quantity, $item->farmer_id);
}

$objCarts->emptyCarts($client_id);
?>