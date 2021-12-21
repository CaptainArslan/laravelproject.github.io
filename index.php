<?php
include("dbcon.php");
include("cartprocess.php");
// include("totop.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="shortcut icon" type="image" href="img/logos/logo-white.png">
    <title>Ecommerce Store</title>
    <link rel="stylesheet" href="css/index.css">
    <!-- Jquery  -->
    <script src="js/jquery-2.1.1.js"></script>

</head>

<body>

    <!-- <div class="chat-person">
        <a href="https://capchatt.000webhostapp.com/" target="_blank" style="color: #fff;">
            <i class="fas fa-comment-alt"></i>
        </a>
    </div> -->

    <div onclick="topFunction()" id="totop" title="Go to top"><i class="fas fa-angle-up"></i></div>
    <?php
    if (isset($_SESSION['order'])) {
    ?>
        <div class="alert">
            <button class="closebtn" onclick="this.parentElement.style.display='none';">&times;</button>
            <strong><?php echo $_SESSION['order']; ?></strong>
        </div>
    <?php
    }
    ?>
    <!-- Header -->
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
            <div class="userimage">
                <img src="img/icons/usericon.png" onclick="document.getElementById('id01').style.display='block'" alt="cart image" width="25px" height="25px" margin="5px">

                <p>
                    <?php if (isset($_SESSION['user'])) {
                        echo $_SESSION['user'];
                    } else {
                        echo "";
                    } ?>
                </p>
            </div>
            <!-- Navigation bar below text and images -->
            <div class="row">
                <div class="col-2">
                    <h1>Give Your Work <br> A New Limits</h1>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Asperiores ad quibusdam earum ut
                        delectus
                        totam suscipit quis in dicta architecto autem assumenda ipsam aut illum tempora quia, laborum
                        fugiat. Porro sequi voluptate labore. Ducimus?</p>
                    <a href="allproducts.php" class="btn">Get Started</a>
                </div>
                <div class="col-2">
                    <img src="img/image1.png" alt="sport image">
                </div>
            </div>
        </div>
    </div>

    <!-- Feature Categories -->
    <div class="categories">
        <div class="small_container">
            <div class="row category">

                <?php
                $category_query = "SELECT * FROM `product_categories`";
                $fetch_category = mysqli_query($con, $category_query);

                $category_num = mysqli_num_rows($fetch_category);
                if ($category_num > 0) {
                    $i = 0;
                    while ($cat_result = mysqli_fetch_array($fetch_category)) {
                        $i++;
                ?>
                        <div class="col-3">
                            <a href="category.php?cid=<?php echo $cat_result['category_id']  ?>">
                                <img src="img/categories/<?php echo $cat_result['category_image']  ?>" alt="<?php echo $cat_result['category_name']  ?>">
                                <div class="row">
                                    <h3><?php echo $cat_result['category_name']  ?></h3>
                                </div>
                            </a>
                        </div>
                    <?php
                    }
                    ?>
                <?php
                } else {
                ?>
                    <div class="col-3">
                        <a href="#">
                            <div class="row">
                                <h3>No category Found</h3>
                            </div>
                        </a>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Feature Products -->
    <div class="small_container">
        <h2 class="title">Featured Products</h2>
        <div class="row">
            <?php
            $query = "SELECT * FROM `products` where `product_quantity` >= 1 order by product_id ASC LIMIT 4";
            $result = mysqli_query($con, $query);

            $num  = mysqli_num_rows($result);
            if ($num > 0) {
                while ($row = mysqli_fetch_array($result)) {
            ?>
                    <form action="" method="POST" class="col-4">
                        <div class="col-4">
                            <input type='hidden' name='code' value="<?php echo  $row['product_code']; ?>" />
                            <img src="img\product_img\<?php echo  $row['product_image']; ?>" alt="Product Image" class="product_image" id="<?php echo  $row['product_code']; ?>">
                            <h4><?php echo $row['product_name']; ?></h4>
                            <div class="rating">
                                <i class="fa fa-star"><?php echo $row['product_rating']; ?></i>
                            </div>
                            <p> $<?php echo number_format($row['product_price'], 2); ?></p>
                            <button type="submit" class="btn">Add To Cart</button>
                        </div>
                    </form>
                <?php
                }
            } else {
                ?>
                <div class="col-4">
                    <h3>No Products Found</h3>
                </div>
            <?php
            }
            ?>

        </div>

        <!-- Latest Products -->
        <h2 class="title">Latest Products</h2>
        <div class="row">
            <?php
            $query = "SELECT * FROM `products` order by product_id DESC LIMIT 8";
            $result = mysqli_query($con, $query);

            $num  = mysqli_num_rows($result);
            if ($num > 0) {
                while ($row = mysqli_fetch_array($result)) {
            ?>
                    <form action="" method="POST" class="col-4">
                        <div class="col-4">
                            <input type='hidden' name='code' value="<?php echo  $row['product_code']; ?>" />
                            <img src="img\product_img\<?php echo  $row['product_image']; ?>" alt="Product Image" class="product_image" id="<?php echo  $row['product_code']; ?>">
                            <h4><?php echo $row['product_name']; ?></h4>
                            <div class="rating">
                                <i class="fa fa-star"><?php echo $row['product_rating']; ?></i>
                            </div>
                            <p> $<?php echo number_format($row['product_price'], 2); ?></p>
                            <button type="submit" class="btn">Add To Cart</button>
                        </div>
                    </form>
                <?php
                }
            } else {
                ?>
                <div class="col-4">
                    <h3>No Products Found</h3>
                </div>
            <?php
            }
            ?>
        </div>

    </div>


    <!-- Modal -->
    <form action="" method="post">
        <div class="product_modal" id="product_modal">
            
        </div>
    </form>



    <!-- Offer -->
    <div class="offer">
        <div class="small_container">
            <div class="row">
                <div class="col-2">
                    <img src="img/exclusive/exclusive.png" alt="offer" class="offer-img">
                </div>
                <div class="col-2">
                    <p>Exclusively Available in our store</p>
                    <h1>Smart Band 4</h1>
                    <small>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rerum tenetur quo autem cupiditate
                        maxime aperiam molestiae nemo distinctio amet laboriosam!</small><br>
                    <a href="" class="btn">Buy Now</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial -->
    <div class="testtimonial">
        <div class="small_container">
            <div class="row">
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Id autem voluptates hic ipsum aliquid
                        ullam pariatur corrupti obcaecati labore eaque.</p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-alt"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <img src="img/userreviews/user-1.png" alt="user image and review">
                    <h3>User Name</h3>
                </div>
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Id autem voluptates hic ipsum aliquid
                        ullam pariatur corrupti obcaecati labore eaque.</p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-alt"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <img src="img/userreviews/user-2.png" alt="user image and review">
                    <h3>User Name</h3>
                </div>
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Id autem voluptates hic ipsum aliquid
                        ullam pariatur corrupti obcaecati labore eaque.</p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-alt"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <img src="img/userreviews/user-3.png" alt="user image and review">
                    <h3>User Name</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Brands -->
    <div class="brands">
        <div class="small_container">
            <div class="row">

                <?php
                $sponser_logo = mysqli_query($con, "SELECT`sponser_image` FROM `sponsers_logo`");

                $logocount = mysqli_num_rows($sponser_logo);

                if ($logocount > 0) {
                    while ($logo = mysqli_fetch_array($sponser_logo)) {
                ?>
                        <div class="col-5">
                            <img src="img\supponserlogo\<?php echo $logo['sponser_image']; ?>" alt="Sponser Logo">
                        </div>
                    <?php
                    }
                } else {
                    ?>
                    <h3> No Logo Found</h3>
                <?php
                }

                ?>
            </div>
        </div>
    </div>
    <?php
    include("footer.php");
    ?>

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
</body>
<script>
    $(document).ready(function() {
        $('#product_modal').hide();
        $('.product_image').click(function() {
            var image = $(this).attr('id');
            $.ajax({
                type: "POST",
                url: "ajaxhandler.php",
                data: {
                    image: image
                },
                success: function(response) {
                    if (response == "false") {
                        alert("Error Occured While Opening Quick view");
                        $('#product_modal').hide();
                    } else {

                        // alert(response);
                        // db_response = JSON.parse(response);
                        $('#product_modal').show();
                        $('#product_modal').html(response);
                        // alert(response);
                    }
                }
            });
        });
    });
</script>
<script src="js/js.js"></script>

</html>