<!-- Signup Page Front End -->
<html>
    <head>
        <link rel="stylesheet" href="styles.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div class="signup-div">
            <div class="signup-child">
                <form action="signup.php" method="post">
                    <h1 class="signup-heading">Create a new account</h4>
                    
                    <label class="signup-label">First Name<span class="required">*</span></label>
                    <input type="text" label="First Name" placeholder="First Name" name="first_name" required  class="signup-text"> <br>
                    
                    <label class="signup-label">Last Name<span class="required">*</span></label>
                    <input type="text" placeholder="Last Name"  name="last_name" required class="signup-text"> <br>
                    
                    <label class="signup-label">Email<span class="required">*</span></label>
                    <input type="text" placeholder="Email"  name="mobile_number" required class="signup-text" ><br>
                    
                    <label class="signup-label">Password<span class="required">*</span></label>
                    <input type="password" placeholder="password"   name="password" required class="signup-text" minlength="8" maxlength="14"> <br>
                    
                    <label class="signup-label">Confirm Password<span class="required">*</span></label>
                    <input type="password" placeholder="confirm password"  name="confirm_password" required class="signup-text" minlength="8" maxlength="14"> <br>
                        
                    <input type="submit" class="signup-button"  value="Register"><br>
                    <a href="signin.php">Already have an account?click here to signin</a>
                </form>
            </div>
        </div>
    </body>
</html>
<?php include('signupserver2.php')?>