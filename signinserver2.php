<?php
    // session_start();
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    if(isset($_SESSION["mob"]) && $_SESSION["mob"]!="")
    { 
      
        ?> 
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>          
            swal({
                title: "<?php echo $_SESSION["exp"];?>",
                icon:"success",
            }).then( function() {
                window.location = "slots.php";
            });
        </script> 
        <?php
            echo $_SESSION["mobile_number"];
            unset($_SESSION["mob"]);
            unset($_SESSION["exp"]);
                
    }
    elseif(isset($_SESSION["exp"]) && $_SESSION["exp"]!="")
    {
        ?> 
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            swal({
                title: "<?php echo $_SESSION["exp"];?>",
                icon: "error",
                });  
        </script> 
        <?php
        unset($_SESSION["exp"]);
    }
?>




