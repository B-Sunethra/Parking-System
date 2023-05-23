<?php

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    //connect to db
    $db=mysqli_connect('localhost:4306','root','','parking_users') or die("could not connect to database");

    //Initializing Variables
    $errors=array();
    $first_name="";
    $last_name="";
    $mobile_number="";
    $password="";
    $confirm_password="";
    $result="";

    //To get user information

    if(isset($_POST["first_name"])){
        $first_name=mysqli_real_escape_string($db,$_POST["first_name"]);}
    if(isset($_POST["last_name"])){
        $last_name=mysqli_real_escape_string($db,$_POST["last_name"]);}
    if(isset($_POST["mobile_number"])){
        $mobile_number=mysqli_real_escape_string($db,$_POST["mobile_number"]);}
    if(isset($_POST["password"])){
        $password=mysqli_real_escape_string($db,$_POST["password"]);}
    if(isset($_POST["confirm_password"])){
        $confirm_password=mysqli_real_escape_string($db,$_POST["confirm_password"]);}


    //form validation

    if(empty($first_name)){array_push($errors,"First Name is required");}
    if(empty($last_name)){array_push($errors,"Last Name is required");}
    if(empty($mobile_number)){array_push($errors,"Mobile number is required");}
    if(empty($password)){array_push($errors,"Password is required");}
    if($password != $confirm_password)
    {
        array_push($errors,"Passwords do not match Check Again");
        echo "passwords".$_SESSION["exp"]."\n";
        $_SESSION["exp"]="Passwords do not match Check Again";
        echo "passwords end".$_SESSION["exp"]."\n";
    }

    //check db for existing mobilenumber with same mobilenumber

    $user_check_query="SELECT * FROM users WHERE mail_id='$mobile_number' LIMIT 1";
    $results=mysqli_query($db,$user_check_query);
    $user=mysqli_fetch_assoc($results);

    if($user) 
    {
        if($user['mail_id'] === $mobile_number)
        {
            array_push($errors,"Already Registered with this mail id");
            $_SESSION["exp"]="Already Registered with this mail id";
        }
    }

    if(count($errors) == 0)
    {
        $password=md5($confirm_password);
        $confirm_password=md5($confirm_password);
        $query="INSERT INTO users(first_name,last_name,mail_id,password_1,confirm_password) VALUES ('$first_name','$last_name','$mobile_number','$password','$confirm_password')";
        mysqli_query($db,$query);
        $_SESSION['mobile_number'] = $mobile_number;
        $_SESSION['exp'] = "Successfully Registered";

    }

?>

<?php include('signupserver.php')?>
