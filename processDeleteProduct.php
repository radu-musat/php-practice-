<?php
include "./app/functions.php";

$product = Product::find($_GET['id']);
$productImage = ProductImage::findBy('product_id',$product->id)[0];

$product->delete();
$productImage->delete();

$_SESSION['message'] = "Product deleted successfully!";
header("Location: manage.php");


