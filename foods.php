<?php include('partial-front/menu.php'); ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL;?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php 

$sql = "SELECT * FROM tbl_food WHERE active='Yes' AND featured='Yes'";

$res = mysqli_query($conn, $sql);

   $count = mysqli_num_rows($res);

       if ($count > 0){
           while ($rows = mysqli_fetch_assoc($res) ) {
               # code...

               $food_id = $rows['id'];
               $food_title = $rows['title'];
               $food_price = $rows['price'];
               $food_description = $rows['description'];
               $food_image = $rows['image_name'];

           ?>
               <div class="food-menu-box">
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
                    <h4><?php echo $food_title; ?></h4>
                    <p class="food-price">$<?php echo $food_price; ?></p>
                    <p class="food-detail">
                    <?php echo $food_description; ?>
                    </p>
                    <br>

                    <a href="<?php echo SITEURL;?>order.php" class="btn btn-primary">Order Now</a>
                </div>
            </div>
            <?php
           }
       }else {
           echo "Food not Available";
       }
            
            ?>

            <div class="clearfix"></div>
        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

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