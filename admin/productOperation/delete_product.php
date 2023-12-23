<?php
  session_start();

  include '../db.php';

  $productId = $_GET['id'];

  $query = "DELETE FROM product WHERE productId = '$productId'";

  mysqli_query($conn, $query);

  echo 
  "
    <script>
      alert('Product deleted successfully');
      window.location.href = '../product.php';
    </script>
  ";
  

  mysqli_close($conn);

?>