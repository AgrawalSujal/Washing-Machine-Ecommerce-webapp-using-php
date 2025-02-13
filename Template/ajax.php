<?php


// require MySQL Connection
require('../Database/DBConnector.php');

// require Product Class
require('../database/Product.php');

// DBController object
$db = new \Database\DBConnector();

// Product object
$product = new Product($db);

if (isset($_POST['itemid'])) {
    $result = $product->getProduct($_POST['itemid']);
    echo json_encode($result);
}