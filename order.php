<?php include('partial-front/menu.php'); ?>

<?php

if(isset($_GET['food_id'])){
    $food_id = $_GET['food_id'];

    $sql = "SELECT * FROM tbl_food WHERE id='$food_id'";

    $res = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($res);

    if ($count == 1){

        while ($rows = mysqli_fetch_assoc($res)){
               $food_title = $rows['title'];
               $food_price = $rows['price'];
               $food_image = $rows['image_name'];
        }


    }else{
        header("location:".SITEURL);
    }

}else{
    
    header("location:".SITEURL);
}
?>
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" method="post" class="order">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                    <?php
                        if($food_image == ""){
                            echo "<div class='error'>Failed to upload image</div>";
                     }else{
                    ?>
                        <img src="<?php echo SITEURL; ?>images/food/<?php echo $food_image; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                    </div>
                <?php
                }
            ?>
                
    
                    <div class="food-menu-desc">
                        <h3><?php echo $food_title; ?></h3>
                        <input type="hidden" name="food" value="<?php echo $food_title; ?>">
                        <p class="food-price">$<?php echo $food_price; ?></p>
                        <input type="hidden" name="price" value="<?php echo $food_price; ?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Vijay Thapa" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. hi@vijaythapa.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

            <?php 

                if(isset($_POST['submit'])){

                    $food = $_POST['food'];
                    $price = $_POST['price'];
                    $qty = $_POST['qty'];
                    $total = $price * $qty;

                    $order_date = date("Y-m-d h:i:sa");

                    $status = "Ordered";

                    $customer_name = $_POST['full-name'];
                    $customer_contact = $_POST['contact'];
                    $customer_email = $_POST['email'];
                    $customer_address = $_POST['address'];

                    $sql2 = "INSERT INTO tbl_order SET 
                        food = '$food',
                        price = $price,
                        qty = $qty,
                        total = $total,
                        order_date = '$order_date',
                        status = '$status',
                        customer_name = '$customer_name',
                        customer_contact = '$customer_contact',
                        customer_email = '$customer_email',
                        customer_address = '$customer_address'
                    ";

                    $res2 = mysqli_query($conn, $sql2);

                    if($res2==TRUE){
                        $_SESSION['order'] = "<div class='success text-center'>Food Ordered successfully</div>";
                        header("location:".SITEURL);
                    }else{
                        $_SESSION['order'] = "<div class='error text-center'>Failed to Order Food</div>";
                        header("location:".SITEURL);
                    }
                }


                ?>
        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- social Section Starts Here -->
    <section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/twitter.png"/></a>
                </li>
            </ul>
        </div>
    </section>
    <!-- social Section Ends Here -->

    <?php include('partial-front/footer.php'); ?>