<?php 
  session_start();

  if(!isset($_SESSION['admin'])) {
    echo 'Please login first <br>';
    echo 'Click <a href="../index.php">here<a/> to login';
  }else {

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Product</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="styles/style.css">
  <link rel="stylesheet" href="../styles/view_product.css">
</head>
<body>
  <?php
    include '../db.php';

    if(isset($_GET["id"])) {
      $productId = $_GET["id"];

      $sql = "SELECT * FROM product WHERE productId = $productId";

      $result = mysqli_query($conn, $sql);

      if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
  ?>
  
  <div class="container my-4 border border-dark rounded position-relative product-container w-75">
    <form>
      <a href="../product.php" class="btn btn-danger position-absolute end-0 me-2 mt-2">Back</a>
      <h1 class="mt-1">Product Details</h1>
      <hr>
      <img src="../<?php echo $row["imgPath"]?>" alt="Product Image" class="img-fluid w-75 d-block mx-auto rounded">
      <div class="clearfix"></div>
      <label class="form-label mt-3 mb-1 fw-bold">Product Name:</label>
      <br>
      <input type="text" readonly value="<?php echo $row["productName"]?>" disabled class="w-100 ps-2">
      <label class="form-label mt-3 mb-1 fw-bold">Price:</label>
      <br>
      <input type="text" readonly value="RM <?php echo $row["productPrice"]?>" disabled class="w-100 ps-2">
      <label class="form-label mt-3 mb-1 fw-bold">Url:</label>
      <br>
      <input type="text" readonly value="<?php echo $row["productUrl"]?>" disabled class="w-100 ps-2">
      <label class="form-label mt-3 mb-1 fw-bold">Description:</label>
      <br>
      <textarea name="description" id="description" cols="30" rows="3" class="w-100 mb-1 ps-2" readonly disabled><?php echo $row["productDescription"]?></textarea>

    </form>
  </div>

  <?php 
      }
    }
  ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

<?php 
  }
?>