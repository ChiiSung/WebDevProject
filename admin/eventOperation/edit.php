<?php 
  session_start();

  $eventId = $_GET['id'];

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
    <title>Edit Event</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/edit_event.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  </head>
  <body>
    <form class="container border border-secondary my-3 rounded-3 main-container" action="save_edit_event.php?id=<?php echo $eventId?>" method="post" enctype="multipart/form-data">
      <div class="row mt-2 position-relative">
        <h1>Edit event</h1> 
        <a class="btn btn-danger position-absolute back-btn me-2" onclick="discardChanges()">Back</a>
      </div>
      <hr class="mb-3 mt-1">
      <?php 
        include '../db.php';

        $eventId = $_GET['id'];

        $query = "SELECT * FROM event WHERE eventId = $eventId";

        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_assoc($result);
          $date = explode(" ", $row['eventTime'])[0];
          $time = explode(" ", $row['eventTime'])[1];
          $_SESSION['imgPath'] = $row['eventImg'];
      ?>

      <img src="../<?php echo $row['eventImg']?>" alt="Event image" class="img-fluid d-block mx-auto">
      <label for="title" class="form-label mt-3" >Title</label>
      <input type="text" id="title" name="title" class="form-control border-secondary" value="<?php echo $row['eventTitle']?>">
      <div class="row mt-3">
        <div class="col-6">
          <label for="date" class="form-label">Date</label>
        </div>
        <div class="col-6">
          <label for="time" class="form-label">Time</label>
        </div>
      </div>
      <div class="row">
        <div class="col-6">
          <input type="date" id="date" name="date" value="<?php echo $date?>" class="form-control border-secondary">
        </div>
        <div class="col-6">
          <input type="time" id="time" name="time" value="<?php echo $time?>", class="form-control border-secondary">
        </div>
      </div>
      <label for="description" class="form-label mt-3">Description</label>
      <textarea name="description" id="description" rows="4" class="w-100 ps-1 rounded" style="resize: none;"><?php echo $row['eventDescription']?></textarea>
      <label for="image" class="form-label mt-3">Image</label>
      <input type="file" class="mb-3 ms-0" id="image" name="image" accept="image/*">
      <hr style="height: 3px; border: 1px solid black; background-color: black;">
      <?php
        }
      ?>
      <label for="product" class="form-label mt-3">Products</label>

      <div class="product-container d-flex align-items-center">
        <?php 
          $query2 = "SELECT * FROM newproduct WHERE eventId = $eventId";
          
          $result2 = mysqli_query($conn, $query2);

          if(mysqli_num_rows($result2) > 0) {
            while($row2 = mysqli_fetch_assoc($result2)){
              $productId = $row2['newProductId'];
        ?>

        <div class="card me-3 product-card mb-2 px-2 pt-2 border-secondary" style="width: 14rem; height: 18rem;">
          <img src="../<?php echo $row2['productImg']?>" class="" alt="product image" height="60%">
          <div class="mt-2">
            <h5 class="card-title text-center"><?php echo $row2['productName']?></h5>
            <div class="row mt-4">
              <div class="col-6">
                <a class="btn btn-success w-100" onclick="editProduct(<?php echo $productId?>, <?php echo $eventId?>)">Edit</a>
              </div>
              <div class="col-6">
                <a class="btn btn-danger w-100" onclick="removeProduct(<?php echo $productId?>, <?php echo $eventId?>)">Remove</a>
              </div>
            </div>
          </div>
        </div>

        <?php
            }
          }
        ?>
        <i class="bi bi-file-plus plus-icon me-3" onclick="window.location.href='edit_add_product.php?eventId=<?php echo $eventId?>'"></i>
      </div>
      <input type="submit" value="SAVE" class="btn btn-primary d-block mx-auto w-25 mt-4 mb-3" name="save">
    </form>
    <script>
      const discardChanges = () => {
        const result = confirm("Discard changes?");
        if(result) {
          window.location.href = "../event.php";
        }
      }

      const removeProduct = (productId, eventId) => {
        const result = confirm("Remove product?");
        if(result) {                    
          window.location.href = `remove_existing_product.php?productId=${productId}&eventId=${eventId}`;
        }
      }

      const editProduct = (productId, eventId) => {
        window.location.href=`edit_product.php?productId=${productId}&eventId=${eventId}`;
      }
    </script>
  </body>
</html>

<?php 
  }
?>