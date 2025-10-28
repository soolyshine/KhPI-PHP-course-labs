<?php
session_start();

$servername = "localhost";
$db_user = "root";
$db_pass = "";
$dbname = "users_db";

$conn = mysqli_connect($servername, $db_user, $db_pass, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $username_esc = mysqli_real_escape_string($conn, $username);

    $sql = "SELECT id, username, email, password FROM users WHERE username = '$username_esc' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if ($result === false) {
        echo "Query error: " . mysqli_error($conn);
    } else {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $stored_hash = $row["password"];

            if (password_verify($password, $stored_hash)) {
                $_SESSION['username'] = $row['username'];
                $_SESSION['id'] = $row['id'];

                header("Location: welcome.php");
                exit();
            } else {
                echo "Wrong password";
            }
            mysqli_free_result($result);
        } else {
            echo "User not found";
        }
    }
}

mysqli_close($conn);
?>
