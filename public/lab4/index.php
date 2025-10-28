<?php 
class Product {
    public $name;
    protected $price;
    public $description;


    function __construct($name, $price, $description) {
        if ($price < 0) {
            throw new Exception("The product can't have a negative price");
        }
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
    }

    function getInfo() {
        return "Name: {$this->name}<br>
        Price: {$this->price}<br>
        Description: {$this->description}<br>";
    }

}

class DiscountedProduct extends Product {
    public $discount;

    function __construct($name, $price, $description, $discount) {
        parent::__construct($name, $price, $description);
        $this->discount = $discount;
    }

    function calculatePrice() {
        return $this->price * (1 - $this->discount);
    }

    function getInfo() {
        $finalPrice = $this->calculatePrice();
        return "Name: {$this->name}<br>
        Price: {$this->price}<br>
        Description: {$this->description}<br>
        Discount: " . ($this->discount * 100) . "%<br>
        Price with discount: {$finalPrice}<br>";
    }
}


class Category {
    public $name;
    public $products = [];

    function __construct($name) {
        $this->name = $name;
    }

    function addProduct($product) {
        $this->products[] = $product;
    }

    function showProducts() {
        echo "Category: {$this->name}<br>";
        foreach ($this->products as $product) {
            echo $product->getInfo() . "<br>";
        }
    }
}


$apple = new Product("Apple", 10, "It is a fruit");
echo $apple->getInfo();
$banana = new Product("Banana", 20, "It is another fruit");
echo $banana->getInfo();
$lemon = new Product("Lemon", 15, "It is a friut, that I dislike");
echo $lemon->getInfo();
echo "<br>";

$apple = new DiscountedProduct("Apple", 10, "It is a fruit", 0.2);
echo $apple->getInfo();
$banana = new DiscountedProduct("Banana", 20, "It is another fruit", 0.2);
echo $banana->getInfo();
$lemon = new DiscountedProduct("Lemon", 15, "It is a friut, that I dislike", 0.2);
echo $lemon->getInfo();
echo "<br>";

$fruits = new Category("Fruits");
$fruits->addProduct($apple);
$fruits->addProduct($banana);
$fruits->addProduct($lemon);
$fruits->showProducts();
echo "<br>";

$kiwi = new Product("Kiwi", -10, "It is a test product");
echo $kiwi->getInfo();
?>
