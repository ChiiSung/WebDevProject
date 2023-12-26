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
    <title>Edit product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/edit_product.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
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
        $_SESSION['imgPath'] = $row["imgPath"];
    ?>

    <div class="container my-4 border border-dark rounded position-relative main-container w-75">
      <form enctype="multipart/form-data" action="edit_product.php?id=<?php echo $_GET['id']?>" method="post">
        <div href="../product.php" class="btn btn-danger position-absolute end-0 me-2 mt-2" onclick="discardChanges()">Back</div>
        <h1 class="mt-1">Edit product</h1>
        <hr>
        <img src="../<?php echo $row["imgPath"]?>" alt="Product Image" class="img-fluid w-75 d-block mx-auto rounded">
        <label class="form-label mb-1 fw-bold" for="name">Product Name:</label>
        <br>
        <input type="text" class="w-100 ps-2" id="name" required maxlength="70" name="name" value="<?php echo $row["productName"]?>">
        <label class="form-label mt-3 mb-1 fw-bold" for="price">Price:</label>
        <br>
        <input type="number" class="w-100 ps-2" id="price" required placeholder="RM" name="price" step="0.01" value="<?php echo (float)$row["productPrice"]?>">
        <label class="form-label mt-3 mb-1 fw-bold" for="url">Url:</label>
        <br>
        <input type="text" class="w-100 ps-2" id="url" name="url" value="<?php echo $row["productUrl"]?>" required>
        <label class="form-label mt-3 mb-1 fw-bold" for="description">Description:</label>
        <br>
        <textarea name="description" id="description" cols="30" rows="3" class="w-100 mb-1 ps-2" required><?php echo $row["productDescription"]?></textarea>
        <label class="form-label mt-2 mb-1 fw-bold" for="description">Image:</label>
        <br>
        <input type="file" class="mb-3" id="image" name="image" accept="image/*">
        <br>
        <input type="submit" value="SAVE" class="btn btn-primary d-block mx-auto w-25 my-3">
      </form>
    </div>
    <script>
      const discardChanges = () => {
        const result = confirm("Discard changes?");
        if(result) {
          window.location.href="../product.php";
        }
      }
    </script>
    <?php 
        }
      }
    ?>
  </body>
</html>

<?php 
  }
?>