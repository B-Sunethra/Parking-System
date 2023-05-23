<!-- To store Cookies -->
<?php
    if(isset($_POST["login-inp"]))
    {
        if(isset($_POST["remember"]))
        {
                setcookie('mobnum',$_POST["mobile_number"],time()+60*60*7);
                setcookie('pass',$_POST["password"],time()+60*60*7);
        }
        else
        {
                setcookie('mobnum',$_POST["mobile_number"],time()-60*60*7);
                setcookie('pass',$_POST["password"],time()-60*60*7);
        }
    }
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body class="signin-body">
        <!-- sign in page -->
        <div class="signin-div">
            <div class="signin-child">
                <form action="signin.php" method="post">
                    <h1 class="signin-heading">Welcome back!</h4>
                    <label class="signin-label" >Email<span class="required">*</span></label>
                    <input type="text" placeholder="Email" id="mobile-input" name="mobile_number" required class="signin-text"  ><br>

                    <label class="signin-label" >Password<span class="required">*</span></label>
                    <input type="password" placeholder="password" id="password-input" name="password" required class="signin-text"> <br>

                    <input type="checkbox" name="remember">
                    <label class="signin-label">Remember me</label>
                    <a href="forgot.php" class="signin-link">Forgot Password?</a>
                    <input type="submit" id="sub" name="login-inp" class="signin-button" value="Sign in"> <br>
                    <a href="signup.php" class="newacclink">Create a New Account</a>
                </form>
            </div>
        </div>

    </body>
</html>

<?php
    if (isset($_COOKIE["mobnum"]) && isset($_COOKIE["pass"])){
            $mobile_number=json_encode($_COOKIE["mobnum"]);
            $password=json_encode($_COOKIE["pass"]);
            ?>
            <script>
            document.getElementById('mobile-input').value= <?=$mobile_number?>;
            document.getElementById('password-input').value=<?=$password?>;
            </script>
            <?php
        }
?>
 <?php include("signinserver.php") ?>