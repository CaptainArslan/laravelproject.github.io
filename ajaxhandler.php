<?php
include_once("dbcon.php");
$pro_image = $_POST['image'];
$get_product_data = "SELECT * FROM `products` WHERE `product_code` = '$pro_image' ";
$result = mysqli_query($con, $get_product_data);
$row = mysqli_fetch_array($result);
if ($row) {
?>
    <div class="container" style="background: #fff;">
        <input type='hidden' id="Product_modal_hidden" name='code' value="<?php echo  $row['product_code']; ?>" />
        <span class="close" onclick="document.getElementById('product_modal').style.display='none'">&times;</span>
        <div class="row">
            <div class="col-2">
                <img src="img/product_img/<?php echo  $row['product_image']; ?>" alt="" style="max-width: 50%;" id="product_modal_img">
            </div>
            <div class="col-2">
                <h2 id="Product_modal_title"><?php echo  $row['product_name']; ?></h2>
                <p id="Product_modal_description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, omnis illo iste ratione. Numquam eveniet quo, ullam itaque expedita impedit. Eveniet, asperiores amet iste repellendus similique reiciendis, maxime laborum praesentium.</p>
                <ul class="cd-item-action" style="list-style: none;">
                    <div class="rating">
                        <i class="fa fa-star" id="product_modal_rating"><?php echo  $row['product_rating']; ?></i>
                    </div>
                    <li><button class="add-to-cart btn" type="submit">Add to cart</button></li>
                    <!-- <li><a href="#0">Learn more</a></li> -->
                </ul> <!-- cd-item-action -->
            </div>
        </div>
    </div>
<?php
} else {
    echo "false";
}
?>