<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

    if ($check !== false) {
        $uploadOk = 1;
    } else { 
        echo "File is not an image.<br>";
        $uploadOk = 0;
    }
}

if (is_uploaded_file($_FILES["fileToUpload"]["tmp_name"])) {
    if (file_exists($target_file)) {
        $i = 1;
        $fileName = pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_FILENAME);
        $fileExtension = pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION);

        while (file_exists($target_dir . $fileName . $i . "." . $fileExtension)) {
            $i++;
        }
        $target_file = $target_dir . $fileName. $i . "." . $fileExtension;
    }

    if ($_FILES["fileToUpload"]["size"] > 2000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    if($imageFileType != "png" && $imageFileType != "jpg" && $imageFileType != "jpeg") {
        echo "Sorry, only PNG, JPG and JPEG files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The File " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])). " has been uploaded. <br>";
            echo "The File type is " . htmlspecialchars($_FILES["fileToUpload"]["type"]). "<br>";
            echo '<img src="' . $target_file . '" alt="Uploaded Image"><br>';
            echo "<a href=" . $target_file . " download> Download the image</a>";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

?>