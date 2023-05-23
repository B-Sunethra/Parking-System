<?php
    session_start();
    $mob=$_SESSION["mobile_number"];
    $db=mysqli_connect('localhost:4306','root','','parking_users') or die("could not connect to database");
    $query="UPDATE users SET slot = '' WHERE mail_id = '$mob'";
    mysqli_query($db,$query);
?>