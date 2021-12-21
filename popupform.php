<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="img/logo.png">
    <title>Cart Page | red store cart </title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/popupform.css">
</head>

<body>
    <div class="form">
        <div class="tab-header">
            <div class="active">Sign Up</div>
            <div>Sign In</div>
        </div>
        <div class="tab-content">

            <div class="tab-body active">
                <form action="account.php" method="POST">
                    <div class="form-element">
                        <input type="text" placeholder="Full Name" name="txt_name" required>
                    </div>
                    <div class="form-element">
                        <input type="email" placeholder="Email" name="txt_email" required>
                    </div>
                    <div class="form-element">
                        <input type="number" placeholder="Phone" name="txt_phone" required>
                    </div>
                    <div class="form-element">
                        <input type="password" placeholder="Password" id="password" name="txt_password" required>
                    </div>
                    <div class="form-element">
                        <input type="password" placeholder="Confirm Password" id="confirm_password" name="txt_confirm_password" required>
                    </div>
                    <div class="form-element">
                        <button type="submit" name="register_btn">Sign Up</button>
                    </div>
                </form>
            </div>


            <div class="tab-body">
                <form action="account.php" method="POST">
                    <div class="form-element">
                        <input type="text" placeholder="Email / Username">
                    </div>
                    <div class="form-element">
                        <input type="password" placeholder="Password">
                    </div>
                    <div class="form-element">
                        <input type="checkbox" id="remember_me">
                        <label for="remember_me">Remember me</label>
                    </div>
                    <div class="form-element">
                        <button type="submit" name="login_btn">Sign In</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        let tabPanes = document.getElementsByClassName("tab-header")[0].getElementsByTagName("div");

        for (let i = 0; i < tabPanes.length; i++) {
            tabPanes[i].addEventListener("click", function() {
                document.getElementsByClassName("tab-header")[0].getElementsByClassName("active")[0].classList.remove("active");
                tabPanes[i].classList.add("active");

                document.getElementsByClassName("tab-content")[0].getElementsByClassName("active")[0].classList.remove("active");
                document.getElementsByClassName("tab-content")[0].getElementsByClassName("tab-body")[i].classList.add("active");
            });
        }
    </script>
</body>

</html>