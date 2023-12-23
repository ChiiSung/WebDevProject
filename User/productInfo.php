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
      <section style="background-color:lightgray;">
        <div style="margin:0.5% 5%;padding:30px;border:1px solid gray;background-color:white;">
            <?php
                $command = "SELECT * From product WHERE productId=$_GET[productID]";
                $result = mysqli_query($conn, $command);
                $row = mysqli_fetch_assoc($result)
            ?>
                <div style="display:flex">
                    <img src="<?php echo $row["imgPath"] ?>" alt="pic" height="500px">
                    <div style="display:inline block;padding:5%;s">
                        <h2><?php echo $row['productName'] ?></h2>
                        <h3 style="color:orangered">RM<?php echo $row['productPrice'] ?></h3>
                        <p style="max-height:200px;overflow:auto;"><?php echo str_replace("\n","<br>",$row['productDescription']) ?></p>
                        <button onClick="window.location.href='<?php echo $row['productUrl'] ?>'" style="background-color:gray;color:white;border-radius:3px;height:50px;width:150px;border-color:lightgray;">Buy Now</button>
                    </div>
                </div>
            <?php
                
            ?>
        </div>
      </section>
    
</body>
</html>