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
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="./styles/sidebar.css">
    <link rel="stylesheet" href="./styles/dashboard.css">
  </head>
  <body>
    <?php 
      include 'db.php';

      $numOfProduct;
      $numOfEvent;
      $numOfContact;

      $query = "SELECT COUNT(*) AS total_count FROM product";

      $result = mysqli_query($conn, $query);

      if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
          $numOfProduct = $row['total_count'];
        }
      }
    ?>
    
    <div class="container-fluid">
      <!-- sidebar -->
      <div class="bg-dark text-white sidebar">
        <a href="dashboard.php" class="btn nav-btn text-white d-block text-start selected">Dashboard</a>
        <a href="product.php" class="btn nav-btn text-white d-block text-start">Product</a>
        <a href="event.php" class="btn nav-btn text-white d-block text-start">Event</a>
        <!-- change later -->
        <a href="contact.php" class="btn nav-btn text-white d-block text-start">Contact</a>
        <a href="clearId.php" class="btn nav-btn text-white d-block text-start position-absolute w-100 bottom-0">Logout</a>
      </div>
      
      <div class="main-content">
        <h1 class="title">Dashboard</h1>
        <!-- card -->
        <div class="my-5 card-container">
          <div class="row">
            <div class="col-lg-4 col-sm-12">
              <div class="card mx-auto my-3 card-1" onclick="window.location.href = 'product.php'">
                <div class="card-body">
                  <h5 class="card-title">Total Product</h5>
                  <p class="card-text"><?php echo $numOfProduct;?></p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-sm-12">
              <div class="card mx-auto my-3 card-2" onclick="window.location.href = 'event.php'">
                <div class="card-body">
                  <h5 class="card-title">Total Event</h5>
                  <p class="card-text">5</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-sm1-12">
              <div class="card mx-auto my-3 card-3" onclick="window.location.href = 'contact.php'">
                <div class="card-body">
                  <h5 class="card-title">Total Contact</h5>
                  <p class="card-text">8</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
      const redirectPage = (e) => {
        console.log(e);
        
      }
    </script>
  </body>
</html>
<?php 
  }
?>
