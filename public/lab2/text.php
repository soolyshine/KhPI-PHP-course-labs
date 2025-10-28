<?php
$filename = "uploads/log.txt";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = $_POST["fileToWrite"] ?? "";

    if (!empty(trim($data))) {
        $file = fopen($filename, "a");
        if ($file) {
            $changes = date("Y-m-d H:i:s") . $data . "\n";
            fwrite($file, $changes);
            fclose($file);
        }
    }
}

if (file_exists($filename)) {
    $file = fopen($filename, "r");
    if ($file) {
        $content = fread($file, filesize($filename));
        fclose($file);

        echo "<h3>Text log.txt:</h3>";
        echo nl2br(htmlspecialchars($content));
    }
} else {
    echo "File is not created";
}
?>
