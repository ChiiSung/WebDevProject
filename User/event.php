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
        $now = date("Y-m-d h:i:sa");
        $command = "SELECT * From event WHERE eventTime > '$now'";
        $result = mysqli_query($conn, $command);
        $row = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result) == 0){
          echo "<section><h1>Currently no event</h1></div></section>";
        }else{
      ?>
    <section>
      <div class="row">
          <img src="<?php echo $row["eventImg"] ?>" alt="pic" width="100%">
          <div style="width:100%;background-color:black;margin-bottom:80px;padding-bottom:40px;">
            <h2 style="text-align:center;color:white;"><?php echo $row['eventTitle']?></h2><br>
            <h4 style="text-align:center;color:white;width:50%;margin:auto;"><?php echo $row['eventDescription'] ?></h4>
          </div>
          <a data-type="countdown"
              data-name="Event start in:"
              data-bg_color="#ffffff"
              data-name_color="#000000"
              data-border_color="#ffffff"
              data-dt= "<?php echo $row['eventTime'];?>"
              data-timezone="	Asia/Kuala_Lumpur"
              style="display: block; width: 100%; position: relative; padding-bottom: 10%"
              class="tickcounter"
              href="//www.tickcounter.com" target="">Countdown</a>
          <div style="width:100%;">
            <h2 style="text-align:center;margin:100px auto;width:50%;border-bottom:1px solid gray;padding-bottom:10px;">Here's What we have</h2>
            <?php 
              
            ?>
          </div>
      </div>
    </section>
      
      <script>
        (function(d, s, id) { 
          var js, pjs = d.getElementsByTagName(s)[0]; 
          if (d.getElementById(id)) 
            return; 
          js = d.createElement(s); js.id = id;
          js.src = "//www.tickcounter.com/static/js/loader.js";
          pjs.parentNode.insertBefore(js, pjs); 
        }(document, "script", "tickcounter-sdk"));
      </script>
      <?php 
        }
        include 'footer.php';
      ?> 
  </body>
</html>