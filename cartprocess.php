<?php
session_start();
ob_start();
include('dbcon.php');
$status = "";

// THE FOLLOWING CODE IS GETTING FROM THE INPUT TYPE NAME AS name='code'


if (isset($_POST['code']) && $_POST['code'] != "") {
    $code = $_POST['code'];
    // THE FOLLOWING CODE IS GETTING FROM THE INPUT TYPE NAME AS name='code'


        // THE FOLLOWING CODE IS GETTING FROM THE database
        $result = mysqli_query($con, "SELECT * FROM `products` WHERE `product_code`='$code'");
        $row = mysqli_fetch_assoc($result);
        $id = $row['product_id'];
        $name = $row['product_name'];
        $code = $row['product_code'];
        $price = $row['product_price'];
        $image = $row['product_image'];
        $tax = $row['product_tax'];

        $cartArray = array(
            $code => array(
                'product_id' => $id,
                'product_name' => $name,
                'product_code' => $code,
                'product_price' => $price,
                'product_quantity' => 1,
                'product_image' => $image,
                'product_tax' => $tax
            )
        );

        if (empty($_SESSION["shopping_cart"])) {
            $_SESSION["shopping_cart"] = $cartArray;
            // $status = "<div class='box'>Product is added to your cart!</div>";
        ?>
            <!-- <script>
            alert("Product is added to your cart!");
        </script> -->
        <?php
        } else {
            $array_keys = array_keys($_SESSION["shopping_cart"]);
            if (in_array($code, $array_keys)) {
                // $status = "<div class='box' style='color:red;'>
                // Product is already added to your cart!</div>";	
                // echo '<script>
                //         alert("Product is already added to your cart!");
                //         </script>';
                        echo '<script>
                        swal({
                            title: "Error Occur",
                            text: "Product is already added to your cart!",
                            icon: "warning",
                        });
                        </script>';
            } else {
                $_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"], $cartArray);
                // $status = "<div class='box'>Product is added to your cart!</div>";
                // echo '<script>
                //        alert("Product is added to your cart!");
                //    </script>';
            }
        }
    
}
?>