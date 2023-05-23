<html>
    <head>
        <link rel="stylesheet" href="reset.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <!-- sign in page -->
        <div class="reset-div">

                <div class="reset-child">
                <form action="reset.php" method="post">
                    <h1 class="reset-heading">Create new password</h4>

                    <label class="reset-label">New Password<span class="required">*</span></label>
                    <input type="password" placeholder="New password"   name="new-password" required class="reset-text" minlength="8" maxlength="14"> <br>

                    <label class="reset-label">Confirm Password<span class="required">*</span></label>
                    <input type="password" placeholder="confirm password"  name="confirm-password" required class="reset-text" minlength="8" maxlength="14"> <br>
                    
                    <input type="submit" class="reset-button"  value="Submit"><br>
                </form>
                </div>
        </div>
       
    </body>

</html>

<?php include("resetserver.php") ?>





