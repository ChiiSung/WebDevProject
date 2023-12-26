<?php 
  session_start();

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
    <title>Add New Event</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/add_event.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  </head>
  <body>
    <div class="container mt-3 border border-secondary rounded-3 w-75 main-container">
      <h1 class="text-center mb-2">New product</h1>
      <hr>
      <div class="d-flex align-items-center product-container">
        <i class="bi bi-file-plus plus-icon me-3" onclick="window.location.href='add_product.php'"></i>
        <?php 
          include '../db.php';
          $eventId = $_SESSION['eventId'];

          $query = "SELECT productName, productImg, newProductId FROM newproduct WHERE eventId = $eventId";

          $result = mysqli_query($conn, $query);

          if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              $productId = $row['newProductId'];
        ?>
        <div class="card me-3 product-card mb-2" style="width: 12rem; height: 18rem;">
          <img src="../<?php echo $row['productImg']?>" class="" alt="product image" height="60%">
          <div class="card-body">
            <h5 class="card-title mb-4 text-center"><?php echo $row['productName']?></h5>
            <button class="btn btn-danger d-block mx-auto w-75" onclick="removeProduct(<?php echo $productId?>, '<?php echo htmlspecialchars($row['productName'], ENT_QUOTES, 'UTF-8')?>')">Remove</button>
          </div>
        </div>
        <?php 
            }
          }
        ?>
      </div>
      <hr>
      <a class="btn btn-primary d-block mx-auto mb-3 w-25" href="../event.php">SAVE</a>
    </div>
    <script>
      const removeProduct = (id, name) => {
        const result = confirm(`Remove ${name}?`);
        if(result) {
          window.location.href = `remove_product.php?id=${id}`;
        }
      }
    </script>
  </body>
</html>

<?php 
  }
?>