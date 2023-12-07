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
      <div class="col-lg-2 col-sm-3 col-xs-3 p-0 bg-dark text-white position-relative sidebar">
        <a href="index.php" class="btn text-white d-block text-start">Dashboard</a>
        <a href="product.php" class="btn text-white d-block text-start selected">Product</a>
        <a href="event.php" class="btn text-white d-block text-start">Event</a>
        <!-- change later -->
        <a href="contact.php" class="btn text-white d-block text-start">Contact</a>
        <a href="login.php" class="btn text-white d-block text-start position-absolute w-100 bottom-0">Logout</a>
      </div>
      <div class="col-lg-10 col-sm-9 p-0">
        <h1 class="ms-5">Product</h1>
        <!-- table -->
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Qty</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td class="operation-cell d-flex justify-content-around">
                  <a href="product.php">
                    <i class="bi bi-eye icon"></i>
                  </a>
                  <a href=".php">
                    <i class="bi bi-pencil icon"></i>
                  </a>
                  <a href="view.php">
                    <i class="bi bi-trash-fill icon"></i>
                  </a>
                  
                </td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>