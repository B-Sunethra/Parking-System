<?php
    session_start();
    print_r($_SESSION);
    echo "hi";
    foreach($_SESSION as $sess)
    {
        unset($_SESSION[$sess]);
    }
    // if (isset($_COOKIE["mobnum"]) and isset($_COOKIE["pass"])){
    //     $mobile_number=$_COOKIE["mobnum"];
    //     $password=$_COOKIE["pass"];
    //     setcookie('mobnum',$mobile_number,time()-1);
    //     setcookie('pass',$password,time()-1);
    // }
    session_unset();
    session_destroy();
?>
<script>
    consle.log("hello");
</script>