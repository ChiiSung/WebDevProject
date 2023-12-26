<?php 
  session_start();

  $eventId = $_GET['eventId'];
  $productId = $_GET['productId'];

  if(!isset($_SESSION['admin'])) {
    echo 'Please login first <br>';
    echo 'Click <a href="index.php">here<a/> to login';
  }else {
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  </head>
  <body>
    <div class="container my-4 border border-dark rounded position-relative main-container w-75">
      <form enctype="multipart/form-data" action="edit_product_operation.php?eventId=<?php echo $eventId?>&productId=<?php echo $productId?>" method="post">
        <div class="btn btn-danger position-absolute end-0 me-2 mt-2" onclick="discardChanges()">Back</div>
        <h1 class="mt-1 title">Edit product</h1>
        <hr>
        <?php
          include '../db.php';

          $query = "SELECT * FROM newproduct WHERE newProductId = $productId";

          $result = mysqli_query($conn, $query);

          $row = mysqli_fetch_assoc($result);

          $_SESSION['imgPath'] = $row['productImg'];
        ?>
        <img src="../<?php echo $row['productImg']?>" alt="Product Image" class="img-fluid d-block mx-auto">
        <br>
        <label class="form-label mb-1 fw-bold" for="name">Product Name:</label>
        <br>
        <input type="text" class="w-100 ps-2" id="name" required maxlength="70" name="name" value="<?php echo $row['productName']?>">
        <label class="form-label mt-3 mb-1 fw-bold" for="url">Url:</label>
        <br>
        <input type="text" class="w-100 ps-2" id="url" name="url" required value="<?php echo $row['productUrl']?>">
        <label class="form-label mt-3 mb-1 fw-bold" for="description">Description:</label>
        <br>
        <textarea name="description" id="description" cols="30" rows="3" class="w-100 mb-1 ps-2 rounded" required style="resize: none;"><?php echo $row['productDescription']?></textarea>
        <label class="form-label mt-2 mb-1 fw-bold" for="description">Image:</label>
        <br>
        <input type="file" class="mb-3" id="image" name="image" accept="image/*">
        <br>
        <input type="submit" value="SAVE" class="btn btn-primary d-block mx-auto w-25 my-3" name="add">
      </form>
    </div>
    <script>
      const discardChanges = () => {
        const result = confirm("Discard changes?");
        if(result) {
          window.location.href="edit.php?id=<?php echo $eventId?>";
        }
      }
    </script>
  </body>
</html>

<?php 
  }
?>