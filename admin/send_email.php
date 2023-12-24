<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

  require 'phpmailer/src/Exception.php';
  require 'phpmailer/src/PHPMailer.php';
  require 'phpmailer/src/SMTP.php';

  $mail = new PHPMailer(true);

  include 'db.php';
  $replyId = $_GET['id'];

  $query = "UPDATE contact_us SET respond = 1 WHERE contact_us_id = '$replyId'";

  mysqli_query($conn, $query);

  $email;
  $receiveMsg;
  $reply = $_POST['reply'];
  $recipient;
  
  $query = "SELECT * FROM contact_us WHERE contact_us_id = '$replyId'";

  $result = mysqli_query($conn, $query);

  if(mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $email = $row['email'];
      $receiveMsg = $row['note'];
      $recipient = $row['first_name'] . " " . $row['last_name'];
    }
  }

  $replyMsg = 
  "
    Your message: $receiveMsg<br>
    Our reply: $reply
  ";

  try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; 
    $mail->SMTPAuth = true;
    $mail->Username = 'hongchensee8@gmail.com';
    $mail->Password = 'jpkqruzgribolrxp'; 
    $mail->SMTPSecure = 'tls'; 
    $mail->Port = 587;

    $mail->setFrom('hongchensee8@gmail.com', 'Apple');
    $mail->addAddress($email, $recipient);

    $mail->isHTML(true);
    $mail->Subject = 'Thanks You for Contacting Us';
    $mail->Body = $replyMsg;

    $mail->send();
    echo 
      '
        <script>
          alert("Email sent!");
          window.location.href = "contact.php";
        </script>
      ';
  } catch (Exception $e) {
    echo "Mailer Error: {$mail->ErrorInfo}";
  }
?>
