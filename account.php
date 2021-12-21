<?php 
include("header.php");
include("dbcon.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account | Red store Login and signup</title>
    <link rel="stylesheet" href="img/logo.png">
    <title>Cart Page | red store cart </title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/account.css">

    <script src="js/sweetalert_plugin.js"></script>
</head>

<body>
    <?php
    include("totop.php");
    ?>

    <!-- Account Page -->

    <div class="account-page">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <img src="img/image1.png" alt="image" width="100%">
                </div>
                <div class="col-2">
                    <div class="form-container">
                        <div class="form-btn">
                            <span onclick="login()">Login</span>
                            <span onclick="register()">Register</span>
                            <hr id="indicator">
                        </div>

                        <?php
                        if (isset($_POST['login_btn'])) {

                            $useremail = mysqli_real_escape_string($con, $_POST['useremail']);
                            $password = mysqli_real_escape_string($con, $_POST['password']);

                            $checkemail = "SELECT * FROM `user` WHERE `user_email` = '$useremail' ";
                            $emailcheck = mysqli_query($con, $checkemail);

                            $mailcount = mysqli_num_rows($emailcheck);

                            if ($mailcount > 0) 
                            {
                                $db_data = mysqli_fetch_assoc($emailcheck);

                                $db_pass = $db_data['user_password'];

                                $_SESSION['user'] = $db_data['user_name'];

                                $_SESSION['email'] = $db_data['user_email'];

                                //First $password is that password which comes from input type
                                //and the second is which we get from the databse 
                                //Password verify is to check the necrypted password and the password in database in hashing format

                                $pass_decode = password_verify($password, $db_pass);
                                if ($pass_decode) 
                                {

                                    if(isset($_POST['rememberme']))
                                    {
                                        setcookie('EmailCookie',$useremail,time()+(86400*30));
                                        setcookie('PasswordCookie',$password,time()+(86400*30));

                                        
                                    }else
                                    {
                                        
                                    }
                                    // alert("Congratulation! you are logged in successfully");
                                    echo
                                    '<script>
                                    window.location.href = "account.php";
                                </script>';
                                }
                                else 
                                {
                                    echo '<script>
                                        swal({
                                            title: "Error Occured",
                                            text: "Password! Does Not Matched",
                                            icon: "warning",
                                        });
                                        </script>';
                                }
                            } else {
                                echo '<script>
                                        swal({
                                            title: "Error Occured",
                                            text: "Invalid Email or password ",
                                            icon: "warning",
                                        });
                                        </script>';
                            }
                        }
                        ?>

                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="LoginForm"
                            method="POST">
                            <input type="email" placeholder="email" name="useremail"
                                value="<?php if(isset($_COOKIE['EmailCookie'])) { echo $_COOKIE['EmailCookie']; } ?>"
                                required>
                            <input type="password" placeholder="Password" id="loginpassword" name="password"
                                value="<?php if(isset($_COOKIE['PasswordCookie'])) { echo $_COOKIE['PasswordCookie']; } ?>"
                                required>
                            <input type="checkbox" onclick="passwordToogle()" id="showpassword"><text
                                class="showpassword">Show Password</text><br>
                            <input type="checkbox" id="showpassword" name="rememberme">
                            <text class="showpassword">Remember Me</text>
                            <button type="submit" class="btn" name="login_btn">Login</button>
                            <a href="">Forget Password</a>
                        </form>

                        <!-- Register User code -->
                        <?php
                        if (isset($_POST['register_btn'])) {
                            $user_name = mysqli_real_escape_string($con, $_POST['txt_name']);
                            $user_email = mysqli_real_escape_string($con, $_POST['txt_email']);
                            $user_phone = mysqli_real_escape_string($con, $_POST['txt_phone']);
                            $user_password = mysqli_real_escape_string($con, $_POST['txt_password']);
                            $user_compassword = mysqli_real_escape_string($con, $_POST['txt_confirm_password']);
                            $date = date("Y-m-d h:i:sa");


                            $pass = password_hash($user_password, PASSWORD_BCRYPT);
                            $cpass = password_hash($user_compassword, PASSWORD_BCRYPT);

                            $emailquery = "SELECT * FROM `user` WHERE `user_email` = '$user_email'";
                            $emailresult = mysqli_query($con, $emailquery);
                            $emailcount = mysqli_num_rows($emailresult);


                            $phonequery = "SELECT * FROM `user` WHERE `user_phone` = '$user_phone'";
                            $phoneresult = mysqli_query($con, $phonequery);
                            $phonecount = mysqli_num_rows($phoneresult);




                            if ($emailcount > 0) {
                                echo
                                '<script>
                                    alert("Email! Already Exist* Please Login to Your Account");
                                </script>';
                            } else if ($phonecount > 0) {
                                echo
                                '<script>
                                    alert("Phone Number! Already Exist");
                                </script>';
                            } else {

                                if ($user_password === $user_compassword) {
                                    $insertquery = "INSERT INTO `user`(`date`, `user_name`, `user_email`, `user_phone`, `user_password`, `user_confirm_password`) 
                                        VALUES ('$date','$user_name','$user_email','$user_phone','$pass','$cpass')";

                                    $queryfire = mysqli_query($con, $insertquery);
                                    echo '<script>
                                        swal({
                                            title: "Great News!",
                                            text: "Your Are Registered Successfully",
                                            icon: "success",
                                        });
                                        </script>';
                                } else {
                                        echo '<script>
                                        swal({
                                            title: "Error",
                                            text: "Password! Does Not Matched Correctly!",
                                            icon: "warning",
                                        });
                                        </script>';
                                }
                            }
                        }

                        ?>

                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="RegForm" method="POST">
                            <input type="text" placeholder="Full Name" name="txt_name" required>
                            <input type="email" placeholder="Email" name="txt_email" required>
                            <input type="number" placeholder="Phone" name="txt_phone" required>
                            <input type="password" placeholder="Password" id="password" name="txt_password" required>
                            <input type="password" placeholder="Confirm Password" id="confirm_password" name="txt_confirm_password" required>
                            <input type="checkbox" onclick="passwordToogle()" id="showpassword"><text
                                class="showpassword">Show Password</text>
                            <button type="submit" class="btn" name="register_btn">Register</button>
                            <p onclick="login()" class="alreadyhaveanaccount">Already have an Account </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include("footer.php");
    ?>
</body>
<!-- Js for toogle form -->
<script>
    function passwordToogle() {
        var x = document.getElementById("password");
        var y = document.getElementById("confirm_password");

        var z = document.getElementById("loginpassword");

        if (x.type === "password" && y.type === "password" && z.type === "password") {
            x.type = "text";
            y.type = "text";
            z.type = "text";
        } else {
            x.type = "password";
            y.type = "password";
            z.type = "password";
        }
    }


    var LoginForm = document.getElementById("LoginForm");
    var RegForm = document.getElementById("RegForm");
    var indicator = document.getElementById("indicator");

    function register() {
        RegForm.style.transform = "translateX(0px)";
        LoginForm.style.transform = "translateX(0px)";
        indicator.style.transform = "translateX(100px)";
    }

    function login() {
        RegForm.style.transform = "translateX(300px)";
        LoginForm.style.transform = "translateX(300px)";
        indicator.style.transform = "translateX(0px)";
    }
</script>

</html>