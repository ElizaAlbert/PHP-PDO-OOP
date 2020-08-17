<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once "index.php";

class Product extends allProducts
{
    public function singleProduct()
    {
        $product_id = $_GET["ID"];
        $stmt = $this->connect()->prepare("SELECT * FROM products WHERE id = :n"); // query
        $stmt->bindParam('n', $product_id);
        $stmt->execute();

        while ($row = $stmt->fetch()) {
            $name = $row['name'];
            $id = $row['id'];

            echo " <p style='text-align: center'>Product name: "
                . $row['name']
                . "<br>"
                . "Price: "
                . $row["price"] . " kr </p>";
        }
    }
}

$product = new Product;
$product->singleProduct();;
