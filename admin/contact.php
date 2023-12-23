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
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="./styles/style.css">
  <link rel="stylesheet" href="./styles/sidebar.css">
  <link rel="stylesheet" href="./styles/contact.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>
<body>
  <!-- sidebar -->
  <div class="bg-dark text-white sidebar">
    <a href="dashboard.php" class="btn nav-btn text-white d-block text-start">Dashboard</a>
    <a href="product.php" class="btn nav-btn text-white d-block text-start">Product</a>
    <a href="event.php" class="btn nav-btn text-white d-block text-start">Event</a>
    <!-- change later -->
    <a href="contact.php" class="btn nav-btn text-white d-block text-start selected">Contact</a>
    <a href="clearId.php" class="btn nav-btn text-white d-block text-start position-absolute w-100 bottom-0">Logout</a>
  </div>

  <?php 
    include 'db.php';

    $query = 'SELECT * FROM contact_us';

    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 0) {
      echo '<div class="no-record">No record here</div>';
    }else {
  ?>

  <div class="container main-content">
    <h1 class="title">Contact</h1>
    <div class="row">

    <?php 
      while($row = mysqli_fetch_assoc($result)) {
    ?>
    <div class="col-lg-4 col-md-6 col-sm-6 my-3">
      <div class="card border-primary">
        <div class="card-body">
          <h5 class="card-title"><?php echo $row['first_name'] . " " . $row['last_name']?></h5>
          <i class="bi bi-geo-alt-fill"></i>
          <p class="country"><?php echo $row['country']?></p>
          <p class="card-text mt-3 note"><?php echo $row['note']?></p>
          <a href="reply.php" class="btn btn-primary mx-auto position-absolute reply-btn">Reply</a>
        </div>
      </div>
    </div>

    <?php 
      }
    ?>
    </div>
  </div>
  <script>
    const note = document.getElementsByClassName("note");
    for(let i = 0; i < note.length; i++) {
      if((note[i].innerText).length > 80) {
        note[i].innerText = (note[i].innerText).substring(0,80) + "...";
      }
      
    }
  </script>
  <?php 
    }
  ?>
</body>
</html>

<?php 
  }
?>