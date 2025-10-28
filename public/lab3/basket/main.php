<?php
session_start();

// Task 5 with 5 minutes
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 300)) {
    session_unset();
    session_destroy();
    session_start();
}
$_SESSION['last_activity'] = time();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
    $name = $_POST['nameProduct'];
    $price = $_POST['numberPrice'];

    if (!empty($name) && $price > 0) {
        $_SESSION['cart'][] = [
            'name' => $name, 
            'price' => $price
        ];

        $previous = [];

        if (isset($_COOKIE['previous'])) {
            $previous = json_decode($_COOKIE['previous'], true);
        } else {
            $previous = [];
        }

        $previous[] = [
            'name' => $name, 
            'price' => $price
        ];

        setcookie('previous', json_encode($previous), time() + (86400 * 30), "/");
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['delete'])) {
    $index = $_POST['delete'];
    if (isset($_SESSION['cart'][$index])) {
        array_splice($_SESSION['cart'], $index, 1);
    }
}

?>


<!DOCTYPE html>
<html>
<body>
    <h2>Your basket</h2>
    <?php if (!empty($_SESSION['cart'])): ?>
        <ul>
            <?php foreach ($_SESSION['cart'] as $index => $item): ?>
                <li>
                    <?php echo $item['name']; ?> - <?php echo $item['price']; ?> $
                    <form method="post" style="display:inline;">
                        <button type="submit" name="delete" value="<?php echo $index; ?>">Delete</button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Basket is empty.</p>
    <?php endif; ?>

    <h2>Products before</h2>
    <?php
    $prevItems = [];
    if (isset($_COOKIE['previous'])) {
        $prevItems = json_decode($_COOKIE['previous'], true);
    }
    ?>
    <?php if (!empty($prevItems)): ?>
        <ul>
            <?php foreach ($prevItems as $p): ?>
                <li><?php echo $p['name']; ?> - <?php echo $p['price']; ?> $</li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No products yet</p>
    <?php endif; ?>

    <br><a href="index.html">Add one more product</a>
</body>
</html>
