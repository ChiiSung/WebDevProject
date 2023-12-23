<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="style.css" type="text/css" />
    <link href="https://unpkg.com/ionicons@4.2.0/dist/css/ionicons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    <link rel="icon" type="image/icon" href="../images/small_logo.png" >
    <title>Apple</title>
    <style>
      .item:hover{
        transform: scale(1.05);
        transition: 0.3s;
      }
      .item img{
        object-fit: cover;
      }
      .row{
        height: 500px;
      }
      section img{
        object-fit: cover;
      }
      .fade {
        animation-name: fade;
        animation-duration: 3s;
      }
      @keyframes fade {
        from {opacity: 0.5} 
        to {opacity: 1}
      }
      .dot {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
      }
      .active {
        background-color: #717171;
      }
    </style>
  </head>
    
  <body>
    <?php 
      include 'header.php';
    ?>
    <section>
      <img class="mySlides fade" src="https://down-ws-my.img.susercontent.com/my-11134210-7r98s-lpkk1xzqkymp36.webp" style="width:100%;height:400px;margin-top: -50px;">
      <img class="mySlides fade" src="https://down-ws-my.img.susercontent.com/my-11134210-7r98t-lnuwepg4xynw65.webp" style="width:100%;height:400px;margin-top: -50px;">
      <img class="mySlides fade" src="https://down-ws-my.img.susercontent.com/my-11134210-7r98q-lnuwepg4zd8c6c.webp" style="width:100%;height:400px;margin-top: -50px;">
      <div style="text-align:center">
        <span class="dot"></span> 
        <span class="dot"></span> 
        <span class="dot"></span> 
      </div>
      <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
      <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
    </section>
    <div>
      <div class="room" style="border:3px solid lightgray;margin:-10px 8% 10px 8%;padding:30px;">
        <div style="margin-bottom:20px;">
          <h3 style="margin:0px auto 5px 30px;">Product</h3>
        </div>
        <div class="row" style="overflow:auto;">  
          <?php
            $command = "SELECT * From product";
            $result = mysqli_query($conn, $command);
            while($row = mysqli_fetch_assoc($result)){
              ?>
                <a href="productInfo.php?productID=<?php echo $row['productId']?>" style="color:black;text-decoration:none;">
                  <div class="item" style="border:1px solid grey; background-color:lightgray;padding: 10px;margin:1.25%;min-height: 100px;max-height:90%; min-width: 200px;max-width:22.5%;">
                    <img src="<?php echo $row["imgPath"] ?>" alt="pic" width="100%" height="80%" style="min-height:80%;" >
                    <h4><?php echo $row['productName'] ?></h4>
                    <h5 style="color:orangered">RM<?php echo $row['productPrice'] ?></h5>
                </a>
                  </div>
                
              <?php
            }
          ?>
        </div>
      </div>
    </div>

    <script>
      var slideIndex = 1;
      showDivs(slideIndex);
      auto();
      function plusDivs(n) {
        showDivs(slideIndex += n);
      }

      function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("mySlides");
        var y = document.getElementsByClassName("dot");
        if (n > x.length) {
          slideIndex = 1
        }
        if (n < 1) {
          slideIndex = x.length
        }
        for (i = 0; i < x.length; i++) {
          x[i].style.display = "none";  
          y[i].className = y[i].className.replace(" active", "");
        }
        x[slideIndex-1].style.display = "block";  
        y[slideIndex-1].className += " active";
      }

      function auto(){
        plusDivs(1);
        setTimeout(auto, 3000);
      }
    </script>

  </body>
</html>