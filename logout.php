<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script>
         
        // console.log("hello")
        // swal({
        //     title: "Are you sure You want to log out",
        //     icon:"info",
        // }).then( function() {
        //     window.location = "index.php";
        // });
     var r = confirm("Are you sure you want to log out!");
     if(r==true){
        $(document).ready(function()
        {
            $.ajax
            ({
                url: "logoutserver.php",
                type: "POST",

            })
        })    
     }

    </script> 
    