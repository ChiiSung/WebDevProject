<?php  
  include '../admin/db.php';
  echo '
  <nav class="navbar navbar-default navbar-expand-lg fixed-top custom-navbar">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="icon ion-md-menu"></span>
    </button>
    <img src="../images/small_logo.png" class="img-fluid nav-logo-mobile" alt="Company Logo">
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <div class="container">
          <img src="../images/logo.png" class="img-fluid nav-logo-desktop" alt="Company Logo">
        <ul class="navbar-nav ml-auto nav-right" data-easing="easeInOutExpo" data-speed="1250" data-offset="65">
          <li class="nav-item nav-custom-link">
            <a class="nav-link" href="index.php">Home <i class="icon ion-ios-arrow-forward icon-mobile"></i></a>
          </li>
          <li class="nav-item nav-custom-link">
            <a class="nav-link" href="product.php">Product <i class="icon ion-ios-arrow-forward icon-mobile"></i></a>
          </li>
          <li class="nav-item nav-custom-link">
            <a class="nav-link" href="event.php">Event <i class="icon ion-ios-arrow-forward icon-mobile"></i></a>
          </li>
          <li class="nav-item nav-custom-link">
            <a class="nav-link" href="aboutUs.php">About Us <i class="icon ion-ios-arrow-forward icon-mobile"></i></a>
          </li>
          <li class="nav-item nav-custom-link">
            <a class="nav-link" href="contactUs.php">Contact Us <i class="icon ion-ios-arrow-forward icon-mobile"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- External JavaScripts -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  
    '
?>