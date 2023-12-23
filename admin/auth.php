<?php 

  session_start();

  include 'db.php';

  $adminId = mysqli_real_escape_string($conn, $_POST['admin-id']);
  $adminPassword = mysqli_real_escape_string($conn, $_POST['admin-password']);

  $query = "SELECT * FROM admin WHERE admin_id = '$adminId'";

  $result = mysqli_query($conn, $query);

  if($result) {
    $row = mysqli_fetch_assoc($result);

    if($row && password_verify($adminPassword, $row['admin_password'])) {
      $_SESSION['admin'] = $adminId;
      header('location: dashboard.php');
      exit();
    }else {
      $_SESSION['errorMessage'] = "Incorrect password!";
      header('location: index.php');
      exit();
    }
  }else {
    echo 'Error: ' . mysqli_erro($conn);
  }
?>