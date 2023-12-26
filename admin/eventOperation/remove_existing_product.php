<?php 
  session_start();

  include '../db.php';

  $productId = $_GET['productId'];
  $eventId = $_GET['eventId'];

  $query = "DELETE FROM newproduct WHERE newProductId = $productId";

  mysqli_query($conn, $query);

  echo
    '
      <script>
        alert("Product removed");
        window.location.href="edit.php?id=' . $eventId . '";
      </script>
    '
?>