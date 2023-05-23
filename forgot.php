<html>
    <head>
        <link rel="stylesheet" href="forgot.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <!-- sign in page -->
        <div class="forgot-div">

                <div class="forgot-child">
                <form action="forgot.php" method="post" id="get-otp" >
                    <h1 class="forgot-heading">Recieve OTP here to change password</h4>

                    <label class="forgot-label" >Email<span class="required"></span></label>
                    <input type="text" placeholder="Email" id="email-input" name="email-id" required class="forgot-text"  ><br>
                    <!-- <h1 class="forgot-mail"></h1> -->

                    <input type="submit" id="forgot-button" name="otp-btn" class="forgot-button" value="Send OTP"> <br>

                    
                   
                </form>

                <form action="forgot.php" method="post">

                <label class="forgot-label" >Enter OTP<span class="required">*</span></label>
                <input type="text" placeholder="Enter OTP" id="otp-input" name="otp-input" required class="forgot-text"> <br>

                <input type="submit" id="verify-button" name="otp-ver" class="forgot-button" value="Verify OTP"> <br>
                </form>

                </div>
        </div>
       
    </body>
</html>

<?php include("forgotserver.php") ?>
