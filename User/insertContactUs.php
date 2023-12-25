<?php

    include("db.php");

    $firstname= mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname= mysqli_real_escape_string($conn, $_POST['lastname']);
    $email= mysqli_real_escape_string($conn, $_POST['email']);
    $notes= mysqli_real_escape_string($conn, $_POST['notes']);
    $country= mysqli_real_escape_string($conn, $_POST['country']);

    $query = "INSERT INTO contact_us (contact_us_id, first_name, last_name, email, note, country, respond) VALUES
    (0, '$firstname', '$lastname', '$email', '$notes', '$country', false)";
    $result = mysqli_query($conn, $query);

    if($result){
        echo "<script>alert('Your submission is successful')
            ;setTimeout(function() {
            window.location.href = 'contactUs.php';
        }, 500); // Redirect after 1 second (1000 milliseconds)
      </script>";

    }else {
        echo "Error: " . mysqli_error($conn);
    }
    mysqli_close($conn);
?>
    