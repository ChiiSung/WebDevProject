<?php 
  session_start();

  if(isset($_POST['save'])) {
    include '../db.php';

    $eventId = $_GET['id'];
    $title = $_POST['title'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $datetime = $date . " " . $time;
    $description = $_POST['description'];

    $imgPath = ($_FILES['image']['name'] == '') 
    ? $_SESSION['imgPath'] 
    : "../images/" . $_FILES['image']['name'];

    if($imgPath != $_SESSION['imgPath']) {
      $uploadFolder = "../../images/";
      $tempName = $_FILES["image"]["tmp_name"];

      if (!file_exists($uploadFolder)) {
        mkdir($uploadFolder, 0777, true);
      }

      move_uploaded_file($tempName, "../" . $imgPath);
    }

    $query = "UPDATE event SET eventTitle = '$title', eventDescription = '$description', eventTime = '$datetime', eventImg = '$imgPath' WHERE eventId = $eventId";

    mysqli_query($conn, $query);

    unset($_SESSION['imgPath']);

    echo
      '
        <script>
          alert("Event edited successfully");
          window.location.href="../event.php";
        </script>
      ';
  }else {
    echo 
    '
      <div>Error. Login <a href="../index.php">here</a></div>
    ';
  }
?>