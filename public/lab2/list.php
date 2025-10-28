<?php 
$dir = "uploads";

if (is_dir($dir)) {
    $files = scandir($dir);

    echo "<h3>List of files '$dir':</h3>";
    echo "<ul>";

    foreach ($files as $file) {
        $filePath = $dir . "/" . $file;

        if (is_file($filePath)) {
            echo "<li><a href='$filePath' download>$file</a></li>";
        }
    }

    echo "</ul>";
} else {
    echo "Directoria '$dir' not found.";
}
?>