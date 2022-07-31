<?php
include "./app/functions.php";
$mode = null;

if(isset($_GET['mode'])) {
    $mode = $_GET['mode'];
}

$productData = $_POST;
$product = new Product();

$product->fromArray($productData);
if ($mode === 'edit') {
    unset($product->prod_id);
    $product->id = $productData['prod_id'];
}

$productImage = new ProductImage();
$productImage->image_path = $product->image;
if ($mode === 'edit') {
    $productImage = ProductImage::findBy('product_id', $productData['prod_id'])[0];
    $productImage->image_path = $product->image;
}
/*
 * Urmatorul unset($newProduct->image) este folosit deoarece $_POST are image pe el pt alt tabel, adica tabelul images
 *
 * Daca te uiti mai sus stochez path la image intr-un new image object ca sa am datele imaginii salvate.
 *
 * Unset il fac pentru ca inecerca sa imi faca query de insert pe tabela products ce nu are acest camp, imaginile
 * sunt setate dupa product id tabelul images.
*/

unset($product->image);
$productID = $product->save();

if( $mode !='edit') {
    $productImage->product_id = $productID;
}
$productImage->save();

$message = $mode === 'edit' ? "Product updated successfully!" : "New product added successfully!";

$_SESSION['message'] = $message;
header("Location: save.php?mode=edit&id=$productID" );
