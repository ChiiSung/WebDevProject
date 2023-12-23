<?php
  session_start();

  if(isset($_SESSION['errorMessage'])) {
    $errorMessage = $_SESSION['errorMessage'];
    unset($_SESSION['errorMessage']);
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="styles/style.css">
  <link rel="stylesheet" href="styles/index.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>
<body>
  <?php
    if(!empty($errorMessage)) {
      echo 
        '<div class="alert alert-danger" role="alert">' . $errorMessage . '</div>';
    }
  ?>
  <form action="auth.php" class="form-container mx-auto border border-dark p-3 rounded" method="post">
    <h1 class="text-center mb-5">Login</h1>
    <label for="admin-id" class="d-flex justify-content-between align-items-center">User Id: 
      <input type="text" id="admin-id" required class="w-75 ps-1" maxlength="30" name="admin-id">
    </label>
    <label for="" class="d-flex justify-content-between mt-4 mb-5 position-relative align-items-center">Password: 
      <input type="password" id="admin-password" required class="w-75 ps-1" maxlength="30" name="admin-password"> 
      <i class="bi bi-eye position-absolute end-0 me-1 fs-5 view-icon" onclick="viewPassword()"></i> 
    </label>
    <input type="submit" value="LOGIN" class="d-block mx-auto btn btn-primary fs-6 w-50 mt-5">
  </form>

  <script>
    const viewPassword = () => {
      const passwordInput = document.getElementById("admin-password");
      
      passwordInput.type = (passwordInput.type === "text") ? "password" : "text";
    }
  </script>
</body>
</html>