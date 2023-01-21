<?php
session_start();
if(isset($_SESSION['unique_id']))//if the user is logged using the same broswer
{
    header("location: users.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <!--link css-->
    <link rel="stylesheet" href="style.css">
     <!--font awesome link-->
     <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
    <script src="https://kit.fontawesome.com/5bea88a2f9.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <div class="wrapper">
        <div class="form signup">
            <header>Sign in</header>
            <form action="#" enctype="multipart/form-data">
                <div class="error-text">
                    Error message
                </div>
                <div class="field-input">
                    <label>First Name</label>
                    <input type="text" name="fname" placeholder="first name...">
                </div>
                <div class="field-input">
                    <label>Second Name</label>
                    <input type="text" name="sname" placeholder="second name...">
                </div>
                <div class="field-input">
                    <label>Email address</label>
                    <input type="text" name="email" placeholder="Email...">
                </div>
                <div class="field-input">
                    <label>Password</label>
                    <input type="password" name="password" id="password" placeholder="password...">
                    <!--<span class="eyes" onclick="myPassword()">
                        <i class="fa-solid fa-eye-slash" id="eye-close"></i>
                        <i class="fa-solid fa-eye" id="eye-open"></i>
                    </span>-->
                </div>
                <div class="field image">
                    <label>Select your profile</label>
                    <input type="file" name="image">
                </div>
                <div class="field button">
                    <input type="submit" class="sign-in-btn" value="Let's talk">
                </div>
            </form>
            <div class="link">Already signed in?Then <a href="loginchat.php">Login here</a></div>
        </div>
        <small>*Remember your Email & password*</small>
    </div>
<script src="js/pass-show-hide.js"></script>
<script src="js/signup.js"></script>
</body>

</html>