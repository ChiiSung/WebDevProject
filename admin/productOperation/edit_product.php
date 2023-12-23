<?php
  session_start();

  include '../db.php';

  $productId = $_GET['id'];
  echo $productId;
  $productName = $_POST['name'];
  $productPrice = $_POST['price'];
  $productUrl = $_POST['url'];
  $productDescription = $_POST['description'];

  $imgPath = ($_FILES['image']['name'] == '') 
    ? $_SESSION['imgPath'] 
    : "../images/" . $_FILES['image']['name'];

  if($imgPath != $_SESSION['imgPath']) {
    $uploadFolder = "../../images/";

    if (!file_exists($uploadFolder)) {
      mkdir($uploadFolder, 0777, true);
    }


    // move_uploaded_file($tempName, $imgPath);
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $query = "UPDATE product SET productName = '$productName', productPrice = '$productPrice', productDescription = '$productDescription', imgPath = '$imgPath', productUrl = '$productUrl' WHERE productId = '$productId'";

    mysqli_query($conn, $query);
    mysqli_close($conn);

    echo '
    <script>
      alert("Product edited successfully");
      window.location.href = "../product.php";
    </script>
    ';
  } else {
      echo "Error uploading file.";
  }
?>
