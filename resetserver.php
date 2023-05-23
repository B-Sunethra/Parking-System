<?php
    session_start();
    $email=$_SESSION["email"];
    
    if($_SERVER["REQUEST_METHOD"]==="POST"){
    // session_start();
    //Initializing Variables
    $password="";
    $confirm_password="";

    //connect to db

    $db=mysqli_connect('localhost:4306','root','','parking_users') or die("could not connect to database");

    $password=mysqli_real_escape_string($db,$_POST["new-password"]);
    $confirm_password=mysqli_real_escape_string($db,$_POST["confirm-password"]);

    if($password != $confirm_password){
    ?>
    <script>
        alert("password and confirm password are different");
    </script>
    <?php
    }
    else{
        echo "adhi".$email;
        $password=md5($confirm_password);
        $confirm_password=md5($confirm_password);
        $query="UPDATE users SET password_1 = '$password' WHERE mail_id = '$email'";
        mysqli_query($db,$query);
        $query1="UPDATE users SET confirm_password = '$password' WHERE mail_id = '$email'";
        mysqli_query($db,$query1);
        ?>
        <script>
            alert("updated successfully");
            window.location.href="signin.php";
        </script>
        <?php
    }
    }
?>
