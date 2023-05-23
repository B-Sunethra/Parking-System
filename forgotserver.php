<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
$db=mysqli_connect('localhost:4306','root','','parking_users') or die("could not connect to database");

if(isset($_POST["email-id"])){
    $email=$_POST["email-id"];
    $_SESSION["email"]=$email;
    $fgt=json_encode($email);
}

if(isset($_SESSION["mobile_number"])){
    $mbn=$_SESSION["mobile_number"];
}



if(isset($_POST["otp-btn"])){
    ?>
    <script>
        document.getElementById("email-input").value=<?=$fgt?>;
    </script>
    <?php
    $user_check_query="SELECT * FROM users WHERE mail_id='$email' LIMIT 1";

    $results=mysqli_query($db,$user_check_query);
    $user=mysqli_fetch_assoc($results);

    if($user) {
        require 'phpmailer/PHPMailerAutoload.php';
        require 'credentials.php';

        $mail = new PHPMailer();

        $mail->SMTPDebug = 4;                               // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'parkingsystemsds@gmail.com';                 // SMTP username
        $mail->Password = 'qwsxlxlmduuuktuc';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        $mail->setFrom('Email', 'Parking System');
        $mail->addAddress($email);     // Add a recipient
        // $mail->addAddress('parkingsystemssd@gmail.com');               // Name is optional
        $mail->addReplyTo(EMAIL);
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML
        $otp=rand(10000,99999);
        $_SESSION["otp"]=$otp;
        $mail->Subject = 'OTP to reset password';
        $mail->Body    = 'Dear Valid Customer<br><br>'.$otp.' is OTP to reset password';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }
        ?>
        <script>
            alert("otp has been successfully sent");
        </script>
        <?php
    }

    else{

        //$_SESSION["exp"]="You have not yet registered";
        //echo "You have not yet registered";
        ?>
        <script>
            alert("you have not yet registered");
        </script>
        <?php
    }
}

if(isset($_SESSION["otp"])){
    $otp=$_SESSION["otp"];
}



if (isset($_POST["otp-ver"])){
    $otpget=$_POST["otp-input"];
    echo $otp;
    echo $otpget;
    if($otp==$otpget){
       ?>
        <script>
            alert("otp verified");
            window.location.href='reset.php';
        </script>
        <?php
    }
    else{
        ?>
        <script>
            alert("otp that you have entered is incorrect");
        </script>
        <?php
    }
}

?>


