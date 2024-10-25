<?php

use Database\DBConnector;
use Database\product;

//require connection class
require ("Database/DBConnector.php");

//require product class
require("Database/product.php");

// require cart class
require ('database/Cart.php');

//dbconnector object
$db = new DBConnector();

//product object
$product = new Product($db);
$product_shuffle = $product->getData();

//cart object
$Cart = new Cart($db);



