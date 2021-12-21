<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account | Red store Login and signup</title>
    <link rel="shortcut icon" type="image" href="img/logos/logo-white.png">
    <title>Cart Page | red store cart </title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/contact.css">
</head>

<body>
    <?php
    include("header.php");
    include("totop.php");
    ?>

    <!-- Account Page -->

    <div class="contact-page">
        <div class="container">
            <div class="row">
                <div class="col-2 icon_and_text">
                    <!-- <img src="img/image1.png" alt="image" width="100%"> -->
                    <div class="box">
                        <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                        <div class="text">
                            <h3>Address</h3>
                            <p>Kaccha Fattomand Road Fazal Town Gujranwala.</p>
                        </div>
                    </div>
                    <div class="box">
                        <div class="icon"><i class="fas fa-phone-alt"></i></div>
                        <div class="text">
                            <h3>Phone</h3>
                            <p>0317-7638978</p>
                        </div>
                    </div>
                    <div class="box">
                        <div class="icon"><i class="fas fa-envelope"></i></div>
                        <div class="text">
                            <h3>Email</h3>
                            <p>mughalarslan996@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-container">
                        <div class="form-btn">
                            <span >Conact Us</span>
                        </div>
                        <form action="#" id="RegForm">
                            <input type="text" placeholder="User Name">
                            <input type="email" placeholder="Email">
                            <!-- <input type="password" placeholder="Confirm Password"> -->
                            <textarea name="message" id="" cols="35" rows="5" placeholder="Your Message"></textarea>
                            <button type="submit" class="btn">Submit</button>
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

</html>