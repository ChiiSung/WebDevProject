<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="./styles/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>

<body>
  <div class="container-fluid">
    <div class="row" style="height: 100vh;">
      <!-- sidebar -->
      <div class="col-lg-2 col-sm-2 col-xs-2 p-0 bg-dark text-white position-relative sidebar">
        <a href="index.php" class="btn text-white d-block text-start">Dashboard</a>
        <a href="product.php" class="btn text-white d-block text-start selected">Product</a>
        <a href="event.php" class="btn text-white d-block text-start">Event</a>
        <!-- change later -->
        <a href="contact.php" class="btn text-white d-block text-start">Contact</a>
        <a href="login.php" class="btn text-white d-block text-start position-absolute w-100 bottom-0">Logout</a>
      </div>
      <div class="col-lg-10 col-sm-10 pt-4">
        <h1 class="ps-3">Product</h1>
        <!-- table -->
        <!-- change later -->
        <div class="table-responsive my-5 px-1">
          <table class="table table-bordered border-dark">
            <thead>
              <div class="row">
                <th scope="col" class="col-1 text-center">
                  #
                </th>
                <th scope="col" class="col-lg-5 col-sm-4">
                  Name
                </th>
                <th scope="col" class="col-lg-2 col-sm-3 text-center">
                  Price
                </th>
                <th scope="col" class="col-1 text-center">
                  Qty
                </th>
                <th scope="col" class="col-lg-2 text-center">
                  Operation
                </th>
              </div>
            </thead>
            <tbody>
              <?php 
                $count = 1;
                include 'db.php';

                $sql = "SELECT * FROM product";

                $result = mysqli_query($conn, $sql);

                if(mysqli_num_rows($result) > 0) {
                  while($row = mysqli_fetch_assoc($result)) {

              ?>
              <tr>
                <td scope="row" class="text-center"><?php echo $count++?></td>
                <td><?php echo $row["productName"]?></td>
                <td scope="row" class="text-center">RM <?php echo $row["productPrice"]?></td>
                <td class="text-center"><?php echo $row["productQuantity"]?></td>
                <div class="container">
                  <td>
                    <div class="row">
                      <div class="col-4 text-center">
                        <a href="./productOperation/view.php?id=<?php echo $row["productId"]?>">
                          <i class="bi bi-eye icon p-1 rounded"></i>
                        </a>
                      </div>
                      <div class="col-4 text-center">
                        <a href="./productOperation/edit.php">
                          <i class="bi bi-pencil icon p-1 rounded"></i>
                        </a>
                      </div>
                      <div class="col-4 text-center">
                        <!-- some php here -->
                        <i class="bi bi-trash-fill icon p-1 rounded bin-icon"></i>
                      </div>
                    </div>
                  </td>
                </div>
              </tr>
              <?php 
                  }
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>