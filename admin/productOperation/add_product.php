<?php

  include '../db.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ensure the "Image" folder exists
    $uploadFolder = "../../images/";
    $dbPath = "../images/";
    if (!file_exists($uploadFolder)) {
        mkdir($uploadFolder, 0777, true);
    }

    // Check if a file was selected
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
        $tempName = $_FILES["image"]["tmp_name"];
        $originalName = $_FILES["image"]["name"];
        $uploadPath = $uploadFolder . $originalName;
        $dbPath = $dbPath . $originalName;

        move_uploaded_file($tempName, $uploadPath);

        $productName = $_POST['name'];
        $productPrice = $_POST['price'];
        $productUrl = $_POST['url'];
        $productDescription = $_POST['description'];
        $productImagePath = $dbPath;

        $query = "INSERT INTO product VALUES (0, '$productName', '$productPrice', '$productDescription', '$productImagePath', '$productUrl')";

        mysqli_query($conn, $query);
        mysqli_close($conn);

        echo '
        <script>
            alert("New product added successfully");
            window.location.href = "../product.php";
        </script>
        ';

    } else {
        echo "Error uploading file.";
    }
}
?>
