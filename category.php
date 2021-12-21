<?php
include("header.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All products | Red store Products</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/allproduct.css">

</head>

<body>
    <?php
    include("dbcon.php");
    include("totop.php");
    ?>

    <div class="small_container">
        <div class="row row-2">
            <?php
            $product_category_id  = $_GET['cid'];
            $namequery = mysqli_query($con, "SELECT `category_name` FROM `product_categories` WHERE `category_id` = '$product_category_id'");
            $categoryname = mysqli_num_rows($namequery);
            if ($categoryname > 0) {
                while ($ctg_name = mysqli_fetch_array($namequery)) {
                    $ctg_name_result  = $ctg_name['category_name'];
                } ?>
                <h2><?php echo $ctg_name_result; ?> Category </h2>
            <?php
            } else {
            ?>
                <h2><?php  $ctg_name_result = 0; ?> All Category </h2>
            <?php
            }

            ?>
            
            <form action="" method="POST">
                <select name="sorting" id="sorting" value="<?php echo "selected" ?>" onchange="this.form.submit();">
                    <option value="0">Default sorting</option>
                    <option value="1">Sort by Rating</option>
                    <!-- <option value="product_rating">Sort by popularity</option> -->
                    <option value="2">Sort by price </option>
                    <!-- <option value="">sort by sale</option> -->
                </select>
            </form>
        </div>
        <!-- Latest Products -->

        <div class="row ">
            <?php

            if (isset($_POST['sorting'])) {
                $filter = $_POST['sorting'];

                // echo $filter;

                if ($filter == 1) {
                    $queryrating = "SELECT * FROM `products` where `product_category_id` = '$product_category_id' order by product_rating DESC ";
                    $result = mysqli_query($con, $queryrating);
                } else if ($filter == 2) {

                    $queryprice = "SELECT * FROM `products` where  `product_category_id` = '$product_category_id' order by product_price ASC ";
                    $result = mysqli_query($con, $queryprice);
                }
            } else {
                $filter = 0;
                $query = "SELECT * FROM `products` where   `product_category_id` = '$product_category_id' order by product_id ASC  ";
                $result = mysqli_query($con, $query);
            }

            $num  = mysqli_num_rows($result);
            if ($num > 0) {
                while ($row = mysqli_fetch_array($result)) {
            ?>
                    <form action="" method="POST" class="col-4">
                        <div class="col-4">
                            <input type='hidden' name='code' value="<?php echo  $row['product_code']; ?>" />
                            <img src="img/product_img/<?php echo  $row['product_image']; ?>" alt="Product Image">
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
            }
            ?>
        </div>


    </div>

</body>
<?php
include("footer.php");
?>

</html>