<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'includes/dbh.inc.php';

class allProducts extends Dbh
{

    public function getAll()
    {
        $stmt = $this->connect()->query("SELECT * FROM products");
        $stmt->execute();
        $products = $stmt->fetchAll();
        echo "<h1 style='text-align: center'> Products </h1>";
        foreach ($products as $product) {
            echo "<p style='text-align: center'><a href='product.php?ID={$product['id']}'>"
                . $product['name'] . "</p>"
                . '</a>';
        }
    }
}

$allProducts = new allProducts;
$allProducts->getAll();
