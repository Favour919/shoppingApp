<?php include('partial-front/menu.php'); ?>



    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <?php 

$sql = "SELECT * FROM tbl_category WHERE active='Yes'";

$res = mysqli_query($conn, $sql);

   $count = mysqli_num_rows($res);

       if ($count > 0){
           while ($rows = mysqli_fetch_assoc($res) ) {
               # code...

               $category_id = $rows['id'];
               $category_title = $rows['title'];
               $category_image = $rows['image_name'];

           ?>
               <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $category_id; ?> ">
            <div class="box-3 float-container">
            <?php
                if($category_image == ""){
                    echo "<div class='error'>Failed to upload image</div>";
                }else{
                    ?>
                    <img src="<?php echo SITEURL; ?>images/category/<?php echo $category_image; ?>" alt="Pizza" class="img-responsive img-curve">
                <?php
                }
            ?>
                <h3 class="float-text text-white"><?php echo $category_title; ?></h3>
            </div>
            </a>
            <?php
           }
       }else {
           echo "Category not Available";
       }
            
            ?>

            

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->


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