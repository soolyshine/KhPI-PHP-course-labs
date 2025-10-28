<html>
    <body>
        <form method="post">
            First Name: <input type="text" name="f_name"><br>
            Last Name: <input type="text" name="l_name">
            <br>
            <input type="submit">
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $first_name = $_POST["f_name"];
            $last_name = $_POST["l_name"];

            if (empty($first_name) || empty($last_name)) {
                echo "You entered somewhere nothing";
            } elseif (!ctype_alpha($first_name) || !ctype_alpha($last_name)) {
                echo "You entered somewhere numbers or else types";
            } else {
                echo "Hello " . htmlspecialchars($first_name) . " " . htmlspecialchars($last_name) . "!";
            }
        }
        ?>
    </body>
</html>