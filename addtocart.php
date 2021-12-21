<?php
include("header.php");
$status = "";
if (isset($_POST['action']) && $_POST['action'] == "remove") {
    if (!empty($_SESSION["shopping_cart"])) {
        foreach ($_SESSION["shopping_cart"] as $key => $value) {
            if ($_POST["product_code"] == $key) {
                unset($_SESSION["shopping_cart"][$key]); ?>
                <script>
                    swal({
                        title: "Product Removed!",
                        text: "Product is removed from Cart!",
                        icon: "warning",
                    }).then(function() {
                        window.location.href = "addtocart.php";
                    });
                </script>
<?php
            }
            if (empty($_SESSION["shopping_cart"]))
                unset($_SESSION["shopping_cart"]);
        }
    }
}

if (isset($_POST['action']) && $_POST['action'] == "changequantity") {
    foreach ($_SESSION["shopping_cart"] as &$value) {
        if ($value['product_code'] === $_POST["product_code"]) {
            $value['product_quantity'] = $_POST["product_quantity"];
            break; // Stop the loop after we've found the product
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image" href="img/logos/logo-white.png">
    <title>Cart Page | red store cart </title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/addtocart.css">

    <script src="js/sweetalert_plugin.js"></script>
</head>

<body>
    <?php

    include("dbcon.php");
    include("totop.php");
    ?>
    <div class="small_container cart-page">
        <?php
        if (isset($_SESSION["shopping_cart"])) {
            $total_price = 0;
            $total_tax = 0;
            $grand_total = 0;
            $unit_price = 0;
            $total_quantity = 0;
        ?>
            <table>
                <tr>
                    <th>Products</th>
                    <th>Quantity</th>
                    <!-- <th>Size</th>k -->
                    <th>Subtotal</th>
                </tr>
                <?php
                foreach ($_SESSION["shopping_cart"] as $product) {
                ?>
                    <tr>
                        <td>
                            <div class="cart-info">
                                <img src="img\product_img\<?php echo $product["product_image"]; ?>" alt="<?php echo $product["product_name"]; ?>">
                                <div>
                                    <p><?php echo $product["product_name"]; ?></p>
                                    <small>Price: <?php echo $product["product_price"]; ?></small>
                                    <br>
                                    <form method='post' action=''>
                                        <input type='hidden' name='product_code' value="<?php echo $product["product_code"]; ?>" />
                                        <input type='hidden' name='action' value="remove" />
                                        <button type='submit' class='remove'>Remove Item</button>
                                    </form>
                                    <!-- <a href="">Remove</a> -->
                                </div>
                            </div>
                        </td>
                        <td>
                            <form method='post' action=''>
                                <input type='hidden' name='product_code' value="<?php echo $product["product_code"]; ?>" />
                                <input type='hidden' name='action' value="changequantity" />
                                <select name='product_quantity' class='quantity' onchange="this.form.submit()">
                                    <?php
                                    $ProductID = $product["product_id"];
                                    $ProductQuery = mysqli_query($con, "SELECT * FROM `products` WHERE `product_id`= '$ProductID'");

                                    while ($SQeury = mysqli_fetch_array($ProductQuery)) {
                                        for ($i = 1; $i <= $SQeury["product_quantity"]; $i++) { ?>
                                            <option <?php if ($product["product_quantity"] == $i) echo "selected"; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </form>
                        </td>
                        <!-- <td> <input type="number" value="0"> </td> -->
                        <td>$<?php echo $unit_price = ($product["product_price"] * $product["product_quantity"]) ?></td>
                    </tr>
                <?php
                    $total_quantity += ($product["product_quantity"]);
                    $total_price += ($product["product_price"] * $product["product_quantity"]);
                    $total_tax += ($product["product_tax"] * $product["product_quantity"]);
                    $grand_total = $total_price + $total_tax;
                }
                ?>
            <?php
        } else {
            echo "<h3>Your cart is empty!</h3>";
        }
            ?>
            </table>

            <div class="total-price">
                <table>
                    <tr>
                        <td>Subtotal</td>
                        <td>$<?php
                                if (isset($_SESSION["shopping_cart"])) {

                                    echo $total_price;
                                } else {
                                    $total_price = 0;
                                    echo "0.00";
                                }
                                ?></td>
                    </tr>
                    <tr>
                        <td>Tax</td>
                        <td>$<?php
                                if (isset($_SESSION["shopping_cart"])) {
                                    echo $total_tax;
                                } else {
                                    $total_tax = 0;
                                    echo "0.00";
                                }
                                ?></td>
                    </tr>
                    <tr>
                        <td>Grand Total</td>
                        <td>$<?php
                                if (isset($_SESSION["shopping_cart"])) {
                                    echo $grand_total;
                                } else {
                                    $grand_total = 0;
                                    echo "0.00";
                                } ?></td>
                    </tr>
                </table>

            </div>
    </div>



    <div class="small_container">
        <div class="checkout">
            <?php
            if (isset($_SESSION["shopping_cart"])) {
            ?>
                <a href="index.php" class="checkout_btn">Continue Shopping</a>

                <form action="checkout.php?code = <?php echo $product["product_code"]; ?>" method="POST">
                    <button class="checkout_btn" type="submit" name="checkoutbutton"> Continue To Proceed </button>
                </form>

            <?php
            }
            ?>


        </div>
    </div>




    <?php
    include("footer.php");
    ?>


</body>

</html>