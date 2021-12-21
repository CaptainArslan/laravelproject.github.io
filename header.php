<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="shortcut icon" type="image" href="img/logos/logo-white.png">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title></title>
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <div class="chat-person">
        <a href="https://capchatt.000webhostapp.com/" target="_blank" style="color: #fff;">
            <i class="fas fa-comment-alt"></i>
        </a>
    </div>
    <?php
    include("cartprocess.php");
    ?>
    <div class="header">
        <div class="container">
            <!-- Navigation bar -->
            <div class="navbar">
                <div class="logo">
                    <a href="index.php"><img src="img/logos/logo.png" alt="logo" width="125px"></a>
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="allproducts.php">Products</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <?php

                        if (!isset($_SESSION['user'])) {
                        ?>
                            <li><a href="account.php">Account</a></li>
                        <?php
                        } else {
                        ?>
                            <li class="logout_btn"><a href="logout.php">Logout</a></li>
                        <?php
                        }

                        ?>
                    </ul>
                </nav>


                <a href="addtocart.php"><img src="img/icons/cart.png" alt="cart image" width="25px" height="25px">
                    <?php
                    if (!empty($_SESSION["shopping_cart"])) {
                        $cart_count = count(array_keys($_SESSION["shopping_cart"]));
                    ?>
                        <span class="cart_div">
                            <p><?php echo $cart_count; ?></p>
                        </span>

                    <?php
                    }
                    ?>
                </a>
                <img src="img/icons/menu.png" alt="menu-icon" class="menu-icon" onclick="menutoggle()">

            </div>
            <div class="userimage ">
            <img src="img/icons/usericon.png" onclick="document.getElementById('id01').style.display='block'" alt="cart image" width="25px" height="25px" margin="10px">
                <p>
                    <?php if (isset($_SESSION['user'])) {
                        echo $_SESSION['user'];
                    } else {
                        echo "";
                    } ?>
                </p>
            </div>
            <!-- Navigation bar below text and images -->
            <!-- <div class="row">
                <div class="col-2">
                    <h1>Lorem ipsum dolor <br> elit A, voluptatum?</h1>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Asperiores ad quibusdam earum ut
                        delectus
                        totam suscipit quis in dicta architecto autem assumenda ipsam aut illum tempora quia, laborum
                        fugiat. Porro sequi voluptate labore. Ducimus?</p>
                    <a href="" class="btn">Expolre now</a>
                </div>
                <div class="col-2">

                    <img src="img/image1.png" alt="sport image">
                </div>
            </div> -->
        </div>
    </div>


 <!-- Prolile modal -->
 <div id="id01" class="modal">
        <div class="card-container">
            <div class="upper-container">
                <div class="image-container">
                    <img src="img/user/userimage.png" alt="user image">
                </div>
            </div>
            <div class="lower-container">
                <div>
                    <h3>
                        <?php if (isset($_SESSION['user'])) {
                            echo $_SESSION['user'];
                        } else {
                            echo "User Name";
                        } ?></h3>
                    <!-- <h4>Front-end Developer</h4> -->
                </div>
                <div>
                    <a href="profile.php?id=<?php  ?>" class="btn">Main Profile</a>
                    <!-- <a href="logout.php" class="btn">Logout</a> -->
                </div>
            </div>
        </div>
    </div>

    <script>
        var modal = document.getElementById('id01');
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

</body>
<!-- js for toggle menu -->
<script>
    var MenuItems = document.getElementById("MenuItems");

    MenuItems.style.maxHeight = "0px";

    function menutoggle() {
        if (MenuItems.style.maxHeight == "0px") {
            MenuItems.style.maxHeight = "200px";
        } else {
            MenuItems.style.maxHeight = "0px";
        }
    }
</script>

</html>