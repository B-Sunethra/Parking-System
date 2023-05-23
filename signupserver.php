<?php
    if(isset($_SESSION["mobile_number"]) && $_SESSION["mobile_number"]!="")
    { 
        ?> 
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
        swal
        ({
            title: "<?php echo $_SESSION["exp"];?>",
            icon:"success",
        }).then( function() {
            window.location = "signin.php";
        });
        </script> 
        <?php
            $_SESSION["mobile_number"]="";
            $_SESSION["exp"]=""; 
    }
    elseif(isset($_SESSION["exp"]) && $_SESSION["exp"]!="")
    {
        ?> 
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            console.log("error conmdition");
        </script>
            <?php
                echo "exp".$_SESSION["exp"];
            ?>
        <script>
        swal
        ({
            title: "<?php echo $_SESSION["exp"];?>",
            icon: "error",
        });  
        </script> 
        <?php
        $_SESSION["exp"]="";
    }
?>



