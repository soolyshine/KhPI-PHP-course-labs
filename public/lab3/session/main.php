<?php 
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["delete_session"])) {
        session_unset();
        session_destroy();
        setcookie(session_name(), '', time() - 3600, '/');
        echo "Session deleted!";
    } 
    elseif (!empty($_POST["nameUser"]) && !empty($_POST["passwordUser"])) {
        $_SESSION["name"] = $_POST["nameUser"];
        $_SESSION["password"] = $_POST["passwordUser"];
        echo "You are entered successfully!";
    }
}

if (isset($_SESSION["name"])) {
    echo "Your session is already started. Hello " . $_SESSION["name"] . "!<br>";
    echo "<form method='post'>
            <button type='submit' name='delete_session'>Delete Session</button>
          </form>";
}
?>
