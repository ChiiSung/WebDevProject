<?php 
  session_start();

  if(isset($_POST['add'])) {
    include '../db.php';

    $uploadFolder = "../../images/";
    $dbPath = "../images/";
    if (!file_exists($uploadFolder)) {
        mkdir($uploadFolder, 0777, true);
    }

    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
        $tempName = $_FILES["image"]["tmp_name"];
        $originalName = $_FILES["image"]["name"];
        $uploadPath = $uploadFolder . $originalName;
        $dbPath = $dbPath . $originalName;

        move_uploaded_file($tempName, $uploadPath);

        $eventId = $_SESSION['eventId'];
        $productName = $_POST['name'];
        $productUrl = $_POST['url'];
        $productDescription = $_POST['description'];

        $query = "INSERT INTO newproduct VALUES ($eventId, '$productName', '$productDescription', '$dbPath', '$productUrl', 0)";

        mysqli_query($conn, $query);

        echo 
        "
          <script>
            alert('New product added');
            window.location.href='add_new_product.php';
          </script>
        ";
    }else {
      echo 'Error';
    }
  }
?>