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
    <title>Reply</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="./styles/style.css">
  <link rel="stylesheet" href="./styles/reply.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  </head>
  <body>
    <?php 
      include 'db.php';

      $replyId = $_GET['id'];

      $query = "SELECT * FROM contact_us WHERE contact_us_id = '$replyId'";

      $result = mysqli_query($conn, $query);

      if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
    ?>

    <div class="container my-5 border border-dark rounded position-relative main-container w-75">
      <form action="send_email.php?id=<?php echo $replyId?>" method="post">
        <a class="btn btn-danger position-absolute end-0 me-2 mt-2" onclick="discardChanges()">Back</a>
        <h1 class="mt-1">Reply</h1>
        <hr>
        <div class="">
          <h5 class="card-title"><?php echo $row['first_name'] . " " . $row['last_name']?></h5>
          <i class="bi bi-geo-alt-fill"></i>
          <p class="country"><?php echo $row['country']?></p>
          <br>
          <i class="bi bi-envelope"></i>
          <p class="email"><?php echo $row['email']?></p>
          <p class="card-text mt-3 note"><?php echo $row['note']?></p>
          <textarea name="reply" id="reply" rows="6" class="ps-1 mb-2 border border-dark rounded-3" required placeholder="Reply message" maxlength="200"></textarea>
          <input class="btn btn-primary d-block w-50 mx-auto reply-btn my-4" value="REPLY" type="submit"/>
        </div>
      </form>
    </div>
    <script>
      const discardChanges = () => {
        const reply = document.getElementById("reply");
        if(reply.value) {
          const result = confirm("Discard changes?");
          if(result) {
            window.location.href = 'contact.php';
          }
        }else {
          window.location.href = 'contact.php';
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