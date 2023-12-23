<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" type="text/css" />
    <link href="https://unpkg.com/ionicons@4.2.0/dist/css/ionicons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    <link rel="icon" type="image/icon" href="../images/small_logo.png" >
    <title>Apple</title>
  </head>
    
  <body>
    <?php 
      include 'header.php';
    ?>
    <section>
      <div class="room" style="border:3px solid lightgray;margin:-10px 100px 10px 100px;padding:30px;width: auto;" >
        <div style="margin-bottom:20px;">
          <h3 style="margin:0px auto 5px 30px;">Product</h3>
        </div>
        <div class="row">  
          <?php
            $command = "SELECT * From product";
            $result = mysqli_query($conn, $command);
            while($row = mysqli_fetch_assoc($result)){
              ?>
                <div class="item" style="border:1px solid grey; background-color:lightgray;padding: 10px;margin:10px;">
                  <img src="<?php echo $row["picture"] ?>" alt="pic" height="300px">
                  <h4><?php echo $row['productName'] ?></h4>
                </div>
              <?php
            }
          ?>
        </div>
      </div>
    </section>
    

  </body>
</html>