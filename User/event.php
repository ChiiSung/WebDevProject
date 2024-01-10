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
    <style>
      #productIF img{
        border-radius: 50px;
        object-fit: cover;
      }
      .productBt{
        background-color: gray;
        color: white;
        border-radius: 3px;
        height: 50px;
        width: 150px;
        border-color: lightgray;
        Cursor: pointer;
      }
      .image-list img{
        max-height: 40%;
        border-radius: 30px;
        object-fit: cover;
      }
      .slider-wrapper {
        position: relative;
      }
      .slider-wrapper .slide-button {
        position: absolute;
        top: 50%;
        outline: none;
        border: none;
        height: 50px;
        width: 50px;
        z-index: 5;
        color: #fff;
        display: flex;
        cursor: pointer;
        font-size: 2.2rem;
        background: #000;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        transform: translateY(-50%);
      }
      .slider-wrapper .slide-button:hover {
        background: #404040;
      }
      .slider-wrapper .slide-button#prev-slide {
        left: -25px;
        display: none;
      }
      .slider-wrapper .slide-button#next-slide {
        right: -25px;
      }
      .slider-wrapper .image-list {
        display: grid;
        grid-template-columns: repeat(10, 1fr);
        gap: 18px;
        font-size: 0;
        list-style: none;
        margin-bottom: 30px;
        overflow-x: auto;
        scrollbar-width: none;
      }
      .slider-wrapper .image-list::-webkit-scrollbar {
        display: none;
      }
      .slider-wrapper .image-list .image-item {
        width: 325px;
        height: 400px;
        object-fit: cover;
      }
      .container .slider-scrollbar {
        height: 24px;
        width: 100%;
        display: flex;
        align-items: center;
      }
      .slider-scrollbar .scrollbar-track {
        background: #ccc;
        width: 100%;
        height: 2px;
        display: flex;
        align-items: center;
        border-radius: 4px;
        position: relative;
      }
      .slider-scrollbar:hover .scrollbar-track {
        height: 4px;
      }
      .slider-scrollbar .scrollbar-thumb {
        position: absolute;
        background: #000;
        top: 0;
        bottom: 0;
        width: 50%;
        height: 100%;
        cursor: grab;
        border-radius: inherit;
      }
      .slider-scrollbar .scrollbar-thumb:active {
        cursor: grabbing;
        height: 8px;
        top: -2px;
      }
      .slider-scrollbar .scrollbar-thumb::after {
        content: "";
        position: absolute;
        left: 0;
        right: 0;
        top: -10px;
        bottom: -10px;
      }
      /* Styles for mobile and tablets */
      @media only screen and (max-width: 1023px) {
        .slider-wrapper .slide-button {
          display: none !important;
        }
        .slider-wrapper .image-list {
          gap: 10px;
          margin-bottom: 15px;
          scroll-snap-type: x mandatory;
        }
        .slider-wrapper .image-list .image-item {
          width: 280px;
          height: 380px;
        }
        .slider-scrollbar .scrollbar-thumb {
          width: 20%;
        }
      }
    </style>
  </head>
    
  <body>
    
      <?php 
        include 'header.php';
        $now = date("Y-m-d h:i:sa");
        $command = "SELECT * From event WHERE eventTime > '$now' ORDER BY eventTime";
        $result = mysqli_query($conn, $command);
        $row = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result) == 0){
          echo "<section><h1 style='text-align:center;'>Currently no event</h1></div></section>";
        }else{
      ?>
    <section>
      <div class="row" style="background-color:#f2f2f2;">
          <img src="<?php echo $row["eventImg"] ?>" alt="pic" width="100%">
          <div style="width:100%;background-color:black;margin-bottom:80px;padding-bottom:40px;">
            <h2 style="text-align:center;color:white;"><?php echo $row['eventTitle']?></h2><br>
            <h4 style="text-align:center;color:white;width:50%;margin:auto;"><?php echo $row['eventDescription'] ?></h4>
          </div>
          <div style="width:50%;margin:auto;border-radius:50px;">
            <a data-type="countdown"
                data-name="Event start in:"
                data-bg_color="#ffffff"
                data-name_color="#000000"
                data-border_color="#ffffff  "
                data-dt= "<?php echo $row['eventTime'];?>"
                data-timezone="	Asia/Kuala_Lumpur"
                style="display: block; width: 100%; position: relative; padding-bottom: 20%; border-radius:50px;"
                class="tickcounter"
                href="//www.tickcounter.com" target="">Countdown</a>
          </div>
          <div style="width:100%;background-color:#f2f2f2">
            <h2 style="text-align:center;margin:100px auto 80px auto;width:50%;border-bottom:1px solid gray;padding-bottom:10px;">Here's What we have</h2>
            <?php 
              $command = "SELECT * From newProduct WHERE eventId = '$row[eventId]'";
              $result = mysqli_query($conn, $command);
              while($row2 = mysqli_fetch_assoc($result)){
                echo "<div id='productIF' style='margin:20px auto;width:50%;display:flex;background-color:white;border-radius:50px;'>
                        <img src='$row2[productImg]' alt='pic' width='50%'>
                        <div style='display:inline block;padding:5%;margin:auto;'>
                            <h2>$row2[productName]</h2>
                            <p style='max-height:200px;overflow:auto;'>$row2[productDescription]</p>
                            <button onClick='window.location.href=`$row2[productUrl]`' class='productBt'>Buy Now</button>
                        </div>
                      </div>";
              }
              
            ?>
          </div>
          <div style="width:100%;background-color:white;">
              <h2 style="text-align:center;margin:20px auto 40px auto;width:50%;border-bottom:1px solid gray;padding-bottom:10px;">View recent event</h2>
              <div class="container">
                  <div class="slider-wrapper">
                    <button id="prev-slide" class="slide-button material-symbols-rounded">&#10094</button>
                    <ul class="image-list">
                      <?php 
        }
                        $command = "SELECT * From event WHERE eventTime < '$now' ORDER BY eventTime DESC";
                        $result = mysqli_query($conn, $command);
                        while($row = mysqli_fetch_assoc($result)){
                          echo "<div class='image-item' style='background-color:#f2f2f2;border-radius:30px'> 
                                  <img src='$row[eventImg]' alt='pic' width='100%'>
                                  <div style='display:inline block;padding:5%;margin:auto;'>
                                      <h2>$row[eventTitle]</h2>
                                      <p>$row[eventTime]</p><br>
                                      <p style='max-height:100px;overflow:auto;'>$row[eventDescription]</p>
                                  </div>
                                </div>";
                        }
                      ?>
                    </ul>
                    <button id="next-slide" class="slide-button material-symbols-rounded">&#10095</button>
                  </div>
                  <div class="slider-scrollbar">
                    <div class="scrollbar-track">
                      <div class="scrollbar-thumb"></div>
                    </div>
                  </div>
              </div>
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
        
        const initSlider = () => {
        const imageList = document.querySelector(".slider-wrapper .image-list");
        const slideButtons = document.querySelectorAll(".slider-wrapper .slide-button");
        const sliderScrollbar = document.querySelector(".container .slider-scrollbar");
        const scrollbarThumb = sliderScrollbar.querySelector(".scrollbar-thumb");
        const maxScrollLeft = imageList.scrollWidth - imageList.clientWidth;
        
        // Handle scrollbar thumb drag
        scrollbarThumb.addEventListener("mousedown", (e) => {
            const startX = e.clientX;
            const thumbPosition = scrollbarThumb.offsetLeft;
            const maxThumbPosition = sliderScrollbar.getBoundingClientRect().width - scrollbarThumb.offsetWidth;
            
            // Update thumb position on mouse move
            const handleMouseMove = (e) => {
                const deltaX = e.clientX - startX;
                const newThumbPosition = thumbPosition + deltaX;
                // Ensure the scrollbar thumb stays within bounds
                const boundedPosition = Math.max(0, Math.min(maxThumbPosition, newThumbPosition));
                const scrollPosition = (boundedPosition / maxThumbPosition) * maxScrollLeft;
                
                scrollbarThumb.style.left = `${boundedPosition}px`;
                imageList.scrollLeft = scrollPosition;
            }
            // Remove event listeners on mouse up
            const handleMouseUp = () => {
                document.removeEventListener("mousemove", handleMouseMove);
                document.removeEventListener("mouseup", handleMouseUp);
            }
            // Add event listeners for drag interaction
            document.addEventListener("mousemove", handleMouseMove);
            document.addEventListener("mouseup", handleMouseUp);
        });
        // Slide images according to the slide button clicks
        slideButtons.forEach(button => {
            button.addEventListener("click", () => {
                const direction = button.id === "prev-slide" ? -1 : 1;
                const scrollAmount = imageList.clientWidth * direction;
                imageList.scrollBy({ left: scrollAmount, behavior: "smooth" });
            });
        });
        // Show or hide slide buttons based on scroll position
        const handleSlideButtons = () => {
            slideButtons[0].style.display = imageList.scrollLeft <= 0 ? "none" : "flex";
            slideButtons[1].style.display = imageList.scrollLeft >= maxScrollLeft ? "none" : "flex";
        }
        // Update scrollbar thumb position based on image scroll
        const updateScrollThumbPosition = () => {
            const scrollPosition = imageList.scrollLeft;
            const thumbPosition = (scrollPosition / maxScrollLeft) * (sliderScrollbar.clientWidth - scrollbarThumb.offsetWidth);
            scrollbarThumb.style.left = `${thumbPosition}px`;
        }
        // Call these two functions when image list scrolls
        imageList.addEventListener("scroll", () => {
            updateScrollThumbPosition();
            handleSlideButtons();
        });
        }
        window.addEventListener("resize", initSlider);
        window.addEventListener("load", initSlider);
      </script>
      <?php 
        include 'footer.php';
      ?> 
  </body>
</html>
