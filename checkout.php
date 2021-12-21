<?php
include("header.php");
include("totop.php");
include("dbcon.php");
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
    <link rel="stylesheet" href="css/checkout.css">
    <title>Chekout | Red Store</title>

    <script src="js/sweetalert_plugin.js"></script>
</head>

<body>
    <?php
    if (isset($_SESSION['shopping_cart'])) {
        if (isset($_SESSION['user'])) {
            $user_email = $_SESSION['email'];

            $check_user  = mysqli_query($con, "SELECT * FROM `user` where `user_email` = '$user_email'");

            $user_count = mysqli_num_rows($check_user);
            if ($user_count > 0) {
                while ($user_db_data = mysqli_fetch_array($check_user)) {

            ?>
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-2">
                                <div class="row-2">
                                    <div class="input-container">
                                        <h3>Billing</h3>

                                        <input type="text" name="user_id" value="<?php echo $user_db_data['user_id']; ?>">

                                        <!-- <label for="">User ID</label>
                                        <input type="text" name="" id="" placeholder="M Arslan" title="username" value="<?php echo $user_db_data['user_id']; ?>" > -->

                                        <label for="">User Name</label>
                                        <input type="text" name="user_name" id="" placeholder="M Arslan" title="username" value="<?php echo $user_db_data['user_name']; ?>">

                                        <label for="">Email</label>
                                        <input type="email" name="user_email" id="" placeholder="123456@gmail.com" value="<?php echo $user_db_data['user_email']; ?>">

                                        <?php
                                        $id = $user_db_data['user_id'];
                                        // echo $id;
                                        $check_user_result  = mysqli_query($con, "SELECT * FROM `user` WHERE `user_id` = '$id' ");

                                        $counter  = mysqli_num_rows($check_user_result);
                                        if ($counter > 0) {
                                            foreach ($check_user_result as $value) {
                                        ?>
                                                <label for="">Address</label>
                                                <input type="text" name="user_address" id="" placeholder="524 gujranwala ..." value="<?php echo $value['user_address']; ?>" required>
                                                <label for="">City</label>
                                                <input type="text" name="user_city" id="" placeholder="Gujranwala" value="<?php echo $value['user_city']; ?>" required>
                                                <div class="row-2">
                                                    <div class="input-container">
                                                        <label for="">Zip</label>
                                                        <input type="text" name="user_zip" id="" placeholder="52250" value="<?php echo $value['user_zip']; ?>" required>
                                                    </div>
                                                    <div class="input-container">
                                                        <label for="">State</label>
                                                        <input type="text" name="user_state" id="" placeholder="gujranwala" value="<?php echo $value['user_state']; ?>" required>
                                                    </div>
                                                </div>
                                        <?php
                                            }
                                        } else {
                                            include_once("loginpopup.php");
                                        }
                                        ?>

                                    </div>
                                    <div class="input-container">
                                        <h3>Payment</h3>
                                        <label for="">Accepted Cards</label>

                                        <div class="icon-container">
                                            <a href="visa"><i class="fab fa-cc-visa" style="color:navy; font-size: 40px;"></i></a>
                                            <a href="amex"><i class="fab fa-cc-amex" style="color:blue; font-size: 40px;"></i></a>
                                            <a href="mastercard"><i class="fab fa-cc-mastercard" style="color:red; font-size: 40px;"></i></a>
                                            <a href="discover"><i class="fab fa-cc-discover" style="color:orange; font-size: 40px;"></i></a>
                                            <a href="paypal"><i class="fab fa-cc-paypal" style="color:#3b7bbf; font-size: 40px;"></i></a>
                                            <a href="amazon-pay"><i class="fab fa-cc-amazon-pay" style="color:#FF9900; font-size: 40px;"></i></a>
                                        </div>


                                        <label for="">Name on Card</label>
                                        <input type="text" name="" id="" placeholder="Muhammad Arslan">

                                        <label for="">Credit Card Number</label>
                                        <input type="number" name="" id="" placeholder="1111-2222-3333-4444">

                                        <label for="">Exp Month</label>
                                        <input type="text" name="" id="" placeholder="September">


                                        <div class="row-2">
                                            <div class="input-container">
                                                <label for="">Exp Year</label>
                                                <input type="number" name="" id="" placeholder="2018">
                                            </div>
                                            <div class="input-container">
                                                <label for="">CVV</label>
                                                <input type="number" name="" id="" placeholder="344">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- </form> -->
                            </div>

                            <div class="col-3">

                                <h2 style="text-transform: capitalize;">Order details</h2>
                                <hr>
                                <br>
                                <div class="heading" style="display: flex; justify-content: space-between; padding-left: 10px; padding-right: 10px;">
                                    <div class="cart-name">
                                        <strong for="" style="flex-basis: 20%; text-transform: capitalize;">image</strong>
                                    </div>
                                    <div class="heading-subheading" style="display: flex; flex-basis: 70%; justify-content: space-between;">
                                        <strong style="text-transform: capitalize;">name</strong>
                                        <strong style="text-transform: capitalize;">Quantity</strong>
                                        <strong style="text-transform: capitalize;">price</strong>
                                    </div>
                                </div>

                                <div class="right_side">

                                    <?php
                                    $total_price = 0;
                                    $total_tax = 0;
                                    $grand_total = 0;
                                    $unit_price = 0;
                                    $total_quantity = 0;

                                    if (isset($_SESSION["shopping_cart"])) {
                                        foreach ($_SESSION["shopping_cart"] as $product) {

                                            $total_quantity += $product["product_quantity"];
                                            $total_price += ($product["product_price"] * $product["product_quantity"]);
                                            $total_tax += ($product["product_tax"] * $product["product_quantity"]);
                                            $grand_total = $total_price + $total_tax;
                                    ?>
                                            <div class="products" style="background: #fff; display: flex; justify-content: space-between; border-radius: 10px; margin-top: 10px; padding: 10px; align-items: center;">
                                                <div class="product_img">
                                                    <img src="img\product_img\<?php echo $product["product_image"]; ?>" alt="<?php echo $product["product_name"]; ?>" style="height: 60px; width: 60px; border-radius: 50%; flex-basis: 20%;">
                                                </div>
                                                <div class="product_name_price" style="display: flex; justify-content: space-between; flex-basis: 80%;">
                                                    <p><?php echo $product["product_name"]; ?></p>
                                                    <p><?php echo $product["product_quantity"]; ?></p>
                                                    <p>$<?php echo $total_price; ?></p>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    <?php
                                    }
                                    ?>
                                    <div class="price" style="display: flex; justify-content: space-between; margin-top: 10px; ">
                                        <strong>Quantity : <?php echo $total_quantity; ?></strong>

                                        <strong>Tax : $<?php echo $total_tax; ?></strong>

                                        <strong>Grand Total : $<?php echo $grand_total; ?></strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <button class="place_order" type="submit" name="placeorder" style="background: #ff523b;padding: 10px;text-align: center;color: #fff; border-radius: 10px;outline: none;border: none;font-size: 15px; justify-content: center;">Place
                                Order</button>
                        </div>
                    </form>
            <?php
                }
            }
        } else {
            include_once('loginpopup.php');
        }
    } else {
        header('Location: index.php');
    }
    ?>

    <?php
    if (isset($_POST['placeorder'])) {

        $total_price = 0;
        $total_tax = 0;
        $grand_total = 0;
        $unit_price = 0;
        $total_quantity = 0;
        $order = true;

        $date = date("Y/m/d H:i:s");
        $email = $_POST['user_email'];
        $user_id = $_POST['user_id'];
        $address = $_POST['user_address'];
        $city = $_POST['user_city'];
        $state = $_POST['user_state'];
        $zip = $_POST['user_zip'];

        foreach ($_SESSION["shopping_cart"] as $product) {
            $pro_name = $product["product_name"];
            $total_quantity = $product["product_quantity"];
            $total_price = ($product["product_price"] * $product["product_quantity"]);
            $total_tax = ($product["product_tax"] * $product["product_quantity"]);
            $grand_total = $total_price + $total_tax;
            $image  = $product["product_image"];
            $orderquery = mysqli_query($con, "INSERT INTO `orders`(`date_time`, `user_id`, `product_name`, `product_img`, `product_quantity`,
             `product_price`, `product_tax`, `grand_total`, `user_address`, `user_city`, `user_zip`, `user_state`) VALUES
             ('$date','$user_id','$pro_name','$image','$total_quantity','$total_price','$total_tax','$grand_total','$address'
             ,'$city','$zip','$state')");

            if (!$orderquery) {
                $order = false;
                break;
            }
        }
        if ($order == true) {
            unset($_SESSION['shopping_cart']);
            echo '<script>
           swal({
            title: "Great News!",
            text: "Your Order has been placed successfully",
            icon: "success",
           }).then(function() {
           window.location.href = "index.php";
           });
           </script>';
        } else {
            echo '<script>
           swal({
            title: "Error Occur while order placement",
            text: "You clicked the button!",
            icon: "warning",
           });
           </script>';
        }
    }
    ?>

</body>

</html>
<?php
include("footer.php");
?>