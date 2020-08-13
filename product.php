<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once "index.php";

class Product extends allProducts
{
    public function singleProduct()
    {
        $product_id = $_GET['ID']; // hämtar URL id
        $sth = $this->connect()->prepare("SELECT * FROM products WHERE id = $product_id"); // query
        $sth->execute();
        $singleProduct = $sth->fetch(PDO::FETCH_ASSOC);


        echo " <p style='text-align: center'>Product name: "
            . $singleProduct['name']
            . "<br>"
            . "Price: "
            . $singleProduct["price"] . " kr </p>";
    }
}

$product = new Product;
$product->singleProduct();;
