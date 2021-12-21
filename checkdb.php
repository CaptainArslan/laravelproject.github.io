<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Database</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/allproduct.css">
</head>

<body>
    <?php
    include("dbcon.php");
    ?>
    <div class="small_container">
        <div class="row row-2">
            <h2>All Products</h2>
            <form action="" method="POST">
                <select name="sorting" id="sorting" onchange="this.form.submit();">
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
//Paggination Code Start
            $limit = 8;
          
            if(isset($_GET['page'])){
                $page = $_GET['page'];
            }else{
                $page = 1;
            }
            $offset = ($page -1)*$limit ;
//Paggination Code End
            if (isset($_POST['sorting'])) {
                $filter = $_POST['sorting'];

                // echo $filter;

                if ($filter == 1) {
                    $queryrating = "SELECT * FROM `products` order by product_rating DESC LIMIT {$offset}, {$limit}";
                    $result = mysqli_query($con, $queryrating);
                } else if ($filter == 2) {

                    $queryprice = "SELECT * FROM `products` order by product_price ASC LIMIT {$offset}, {$limit}";
                    $result = mysqli_query($con, $queryprice);
                }
            } else {
                $filter = 0;
                $query = "SELECT * FROM `products` order by product_id ASC LIMIT {$offset}, {$limit} ";
                $result = mysqli_query($con, $query);
            }

            $num  = mysqli_num_rows($result);
            if ($num > 0) {
                while ($row = mysqli_fetch_array($result)) {
            ?>
                    <form action="" method="POST" class="col-4">
                        <div class="col-4">
                            <img src="<?php echo  $row['product_image']; ?>" alt="Product Image">
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


        <!-- Page Number -->
        
        <?php
        //Paggination Code Start
        $record = mysqli_query($con, "SELECT * FROM `products`") or die("Query Failed");
        if (mysqli_num_rows($record) > 0) {
            $total_record = mysqli_num_rows($record);

            $total_page = ceil($total_record / $limit);
        ?>
            <div class="page-btn"><?php
                                    for ($i = 1; $i <= $total_page; $i++) {
                                    ?> <a href="checkdb.php?page=<?php echo $i; ?>"><span><?php echo $i; ?></span></a> <?php
                                                                                                                    } ?>
            </div>
        <?php
        }
//Paggination Code End
        ?>
        <!-- <div class="page-btn">
            <a href=""><span>1</span></a>
            <a href=""><span>2</span></a>
            <a href=""><span>3</span></a>
            <a href=""><span>4</span></a>
            <a href=""><span>&#8594</span></a>
        </div> -->
    </div>
</body>

</html>