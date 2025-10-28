<?php 
$dir = '/cookies/index.html';

if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
    header('Location: ' . $dir);
    exit;

} else {
    echo $_SERVER['REMOTE_ADDR'];
    echo $_SERVER['HTTP_USER_AGENT'];
    echo $_SERVER['PHP_SELF'];
    echo $_SERVER['REQUEST_METHOD'];
    echo $_SERVER['SCRIPT_NAME'];
}

?>