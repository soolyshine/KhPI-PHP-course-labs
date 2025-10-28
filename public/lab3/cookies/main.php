<?php 
$cookie_name = "user";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nameUser"])) {
    $cookie_value = $_POST["nameUser"];
    setcookie($cookie_name, $cookie_value, time() + (604800), "/");

    $_COOKIE[$cookie_name] = $cookie_value;
}

if (isset($_POST["delete_cookie"])) {
        setcookie($cookie_name, "", time() - 3600, '/');
        unset($_COOKIE[$cookie_name]);
}

if (isset($_COOKIE[$cookie_name])) {
    echo "Hello " . htmlspecialchars($_COOKIE[$cookie_name]) . "!<br>";
    echo "<form method='post'>
            <button type='submit' name='delete_cookie'>Delete Cookie</button>
          </form>";
} else {
    echo "<form method='post'>
            <h2>Enter your name</h2><br>
            <input type='text' name='nameUser' id='nameUser'>
            <input type='submit' value='Submit'>
          </form>";
}

?>