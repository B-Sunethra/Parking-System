<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    if($_SERVER["REQUEST_METHOD"]==="POST")
    {
        
        //Initializing Variables
        $errors=array();
        $mobile_number="";
        $password="";
        $results="";

        //connect to db
        $db=mysqli_connect('localhost:4306','root','','parking_users') or die("could not connect to database");

        $mobile_number=mysqli_real_escape_string($db,$_POST["mobile_number"]);
        echo gettype($mobile_number);
        $password=mysqli_real_escape_string($db,$_POST["password"]);
        
        //form validation

        if(empty($mobile_number)){array_push($errors,"Mobile number is required");}
        if(empty($password)){array_push($errors,"Password is required");}


        //check db for existing mobilenumber with same mobilenumber

        $user_check_query="SELECT * FROM users WHERE mail_id='$mobile_number' LIMIT 1";

        $results=mysqli_query($db,$user_check_query);
        $user=mysqli_fetch_assoc($results);

        if($user) 
        {
            if($user['password_1'] !=md5($password))
            {
                array_push($errors,"Your Password is incorrect");
                $_SESSION["exp"]="Incorrect Password";
            }
        }
        else
        {
            array_push($errors,"You have not yet registered");
            $_SESSION["exp"]="You have not yet registered";
            echo "You have not yet registered";
        }

        if(count($errors) == 0)
        {
            $_SESSION['mobile_number'] = $mobile_number;
            $_SESSION["mob"]=$mobile_number;
            // header('location: slots.php');
            $_SESSION['exp'] = "Successfully loggedin";
            echo "successfully loggedin";
        }

    }
?>

<?php include("signinserver2.php") ?>
<?php include("forgotserver.php") ?>