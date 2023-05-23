<?php
   session_start(); 
    print_r($_POST);
    print_r($_SESSION);
   $slot_id=$_POST['current_id'];
   $mobile=$_SESSION['mobile_number'];
   $_SESSION["slot"]=$slot_id;
   $db=mysqli_connect('localhost:4306','root','','parking_users') or die("could not connect to database");
         
   $query="UPDATE users SET slot = '$slot_id' WHERE mail_id='$mobile'";

   
    require 'phpmailer/PHPMailerAutoload.php';
    require 'credentials.php';

    $mail = new PHPMailer;

    $mail->SMTPDebug = 4;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'parkingsystemsds@gmail.com';                 // SMTP username
    $mail->Password = 'qwsxlxlmduuuktuc';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    $mail->setFrom('Email', 'Parking System');
    $mail->addAddress($_SESSION["mobile_number"]);     // Add a recipient
    // $mail->addAddress('parkingsystemssd@gmail.com');               // Name is optional
    $mail->addReplyTo(EMAIL);
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML
    
    $mail->Subject = 'Slot confirmed';
    $mail->Body    = 'Dear Valid Customer<br><br>'.$_SESSION["mobile_number"].'<br>Your slot is '.$slot_id;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }


   mysqli_query($db,$query);
?>