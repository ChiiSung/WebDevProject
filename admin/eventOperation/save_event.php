<?php

  session_start();
  
  if(isset($_POST['next'])) {
    include '../db.php';

    $uploadFolder = "../../images/";
    $dbPath = "../images/";
    if (!file_exists($uploadFolder)) {
        mkdir($uploadFolder, 0777, true);
    }

    // Check if a file was selected
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
        $tempName = $_FILES["image"]["tmp_name"];
        $originalName = $_FILES["image"]["name"];
        $uploadPath = $uploadFolder . $originalName;
        $dbPath = $dbPath . $originalName;

        move_uploaded_file($tempName, $uploadPath);

        $title = $_POST['title'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $formattedTime = date('H:i:s', strtotime($time));
        $datetime = $date . " " . $formattedTime;
        $description = $_POST['description'];

        $query = "INSERT INTO event VALUES ('$title', '$description', '$dbPath', '$datetime', 0)";

        mysqli_query($conn, $query);

        $query = "SELECT eventId FROM event ORDER BY eventId DESC LIMIT 1";

        $result = mysqli_query($conn, $query);
        $eventId = mysqli_fetch_assoc($result)['eventId'];

        $_SESSION['eventId'] = $eventId;

        header("location: add_new_product.php");
    }else {
      echo 'no photo';

    }
  }else {
    echo 'no';
  }
?>