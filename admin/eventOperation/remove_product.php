<?php 
  session_start();

  include '../db.php';

  $id = $_GET['id'];

  $query = "DELETE FROM newproduct WHERE newProductId = $id";

  mysqli_query($conn, $query);

  echo
    '
      <script>
        alert("Product removed");
        window.location.href = "add_new_product.php";
      </script>  
    ';
?>