<?php 
  session_start();
  unset($_SESSION['eventId']);

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
    <title>View Event</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
      <link rel="stylesheet" href="../styles/style.css">
      <link rel="stylesheet" href="../styles/view_event.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  </head>
  <body>
    <div class="container border border-secondary my-3 rounded-3 w-75 main-container">
      <div class="row mt-2 position-relative">
        <h1>View event</h1> 
        <a class="btn btn-danger position-absolute back-btn me-2" href="../event.php">Back</a>
      </div>
      <hr class="mb-3 mt-1">
      <?php 
        include '../db.php';

        $eventId = $_GET['id'];

        $query = "SELECT * FROM event WHERE eventId = $eventId";

        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_assoc($result);
      ?>

      <img src="../<?php echo $row['eventImg']?>" alt="Event image" class="img-fluid d-block mx-auto">
      <div class="row mt-3">
        <div class="col-6">
          <label for="title" class="form-label">Title</label>
        </div>
        <div class="col-6">
          <label for="time" class="form-label">Event time</label>
        </div>
      </div>
      <div class="row">
        <div class="col-6">
          <input type="text" class="form-control" disabled readonly value="<?php echo $row['eventTitle']?>">
        </div>
        <div class="col-6">
          <input type="text" class="form-control" disabled value="<?php echo $row['eventTime']?>">
        </div>
      </div>
      <label for="description" class="form-label mt-3">Description</label>
      <textarea name="description" id="description" rows="4" class="w-100 ps-1 rounded" disabled readonly style="resize: none;"><?php echo $row['eventDescription']?></textarea>
      <?php
        }
      ?>
      <label for="product" class="form-label mt-3">Products</label>

      <div class="product-container d-flex">
        <?php 
          $query2 = "SELECT * FROM newproduct WHERE eventId = $eventId";
          
          $result2 = mysqli_query($conn, $query2);

          if(mysqli_num_rows($result2) > 0) {
            while($row2 = mysqli_fetch_assoc($result2)){
        ?>

        <div class="card me-3 product-card mb-2 px-2 pt-2" style="width: 12rem; height: 14rem;">
          <img src="../<?php echo $row2['productImg']?>" class="" alt="product image" height="70%">
          <div class="mt-4">
            <h5 class="card-title text-center"><?php echo $row2['productName']?></h5>
          </div>
        </div>

        <?php
            }
          }
        ?>
      </div>
    </div>
  </body>
</html>

<?php 
  }
?>