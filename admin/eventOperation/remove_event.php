<?php 
  session_start();

  include '../db.php';

  $eventId = $_GET['id'];

  $query = "DELETE FROM newproduct WHERE eventId = $eventId";

  mysqli_query($conn, $query);

  $query = "DELETE FROM event WHERE eventId = $eventId";

  mysqli_query($conn, $query);

  echo
    '
      <script>
        alert("Event removed");
        window.location.href = "../event.php";
      </script>
    '
?>