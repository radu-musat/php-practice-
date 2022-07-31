<?php
session_start();
$filepath = dirname(__FILE__,1);
include $filepath . "/classes/BaseClass.php";
include $filepath . "/classes/Product.php";
include $filepath . "/classes/ProductImage.php";
include $filepath . "/classes/Category.php";
include $filepath . "/classes/User.php";

$salt = 'Test@re@123';

//how to use example -- dump_formatted('var_dump', $connection);
function dump_formatted($callback, $var)
{
    echo "<pre>";
    $callback($var);
    echo "</pre>";
}

//connect to dataBase
function dbConnect()
{
    $connection = mysqli_connect('45.15.23.59', 'root', 'Sco@l@it123', 'national-03-radu');
    if ($connection) {
        return $connection;
    } else {
        die('Database connection failed!' . mysqli_error($connection));
    }
}

//run query
function runQuery($queryParam)
{
    $connection = dbConnect();
    $query = mysqli_query($connection, $queryParam);

    if (!$query) {
        die("MySQL error on query: $queryParam -" . mysqli_error($connection));
    }

    if (is_bool($query)) {
        return mysqli_insert_id($connection);
    } else {
        return $query->fetch_all(MYSQLI_ASSOC);
    }
}

// read a table
function readTable($className)
{
    $tableName = $className::TABLE_NAME;
    $query = "SELECT * FROM $tableName";
    return runQuery($query);
}

// searchbar
function searchData($tableName, $searchColumn, $searchValue)
{
    $sql = "SELECT * FROM $tableName  WHERE $searchColumn LIKE '%$searchValue%' ";
    return runQuery($sql);
}

function handleSearch($seachValue)
{
    $products = [];
    $data = searchData(Product::getTable(), 'name', $seachValue);
    foreach ($data as $dataItem) {
        $product = new Product();
        $product->fromArray($dataItem);
        $products[] = $product;
    }

    return $products;
}

function checkLogin() {
    if(!isset($_SESSION['user_id'])) {
        header('Location: login.php');
    }
}
