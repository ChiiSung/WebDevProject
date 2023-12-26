<?php
  session_start();

  include '../db.php';

  $eventId = $_GET['eventId'];

  $productId = $_GET['productId'];
  $productName = $_POST['name'];
  $productUrl = $_POST['url'];
  $productDescription = $_POST['description'];

  $imgPath = ($_FILES['image']['name'] == '') 
    ? $_SESSION['imgPath'] 
    : "../images/" . $_FILES['image']['name'];

  if($imgPath != $_SESSION['imgPath']) {
    $uploadFolder = "../../images/";
    $tempName = $_FILES["image"]["tmp_name"];

    if (!file_exists($uploadFolder)) {
      mkdir($uploadFolder, 0777, true);
    }

    move_uploaded_file($tempName, "../" . $imgPath);
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $query = "UPDATE newproduct SET productName = '$productName', productDescription = '$productDescription', productImg = '$imgPath', productUrl = '$productUrl' WHERE newProductId = '$productId'";

    mysqli_query($conn, $query);
    mysqli_close($conn);

    unset($_SESSION['imgPath']);

    echo '
    <script>
      alert("Product edited successfully");
      window.location.href = "edit.php?id=' . $eventId . '";
    </script>
    ';
  } else {
      echo "Error uploading file.";
  }
?>
