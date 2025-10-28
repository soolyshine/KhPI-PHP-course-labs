<?php
$file = "style.css";

$mime = mime_content_type($file);

header("Content-Type: $mime");
header("Cache-Control: public, max-age=86400");
header("Expires: " . gmdate("D, d M Y H:i:s", time() + 86400) . " GMT");

readfile($file);
?>
