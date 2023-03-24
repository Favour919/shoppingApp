<?php include('partial/menu.php'); ?>

<!-- main contents section start -->
<div class="main-content">
                <div class="wrapper">
                    <h1>Manage food</h1>

                    <br><br>

                    <?php

                        if(isset($_SESSION['add'])){
                            echo $_SESSION['add'];
                            unset($_SESSION['add']);
                        }
                        if(isset($_SESSION['remove'])){
                            echo $_SESSION['remove'];
                            unset($_SESSION['remove']);
                        }
                        if(isset($_SESSION['delete'])){
                            echo $_SESSION['delete'];
                            unset($_SESSION['delete']);
                        }
                        if(isset($_SESSION['category-not-found'])){
                            echo $_SESSION['category-not-found'];
                            unset($_SESSION['category-not-found']);
                        }
                        if(isset($_SESSION['update'])){
                            echo $_SESSION['update'];
                            unset($_SESSION['update']);
                        }
                        if(isset($_SESSION['upload'])){
                            echo $_SESSION['upload'];
                            unset($_SESSION['upload']);
                        }
                        if(isset($_SESSION['failed-to-remove'])){
                            echo $_SESSION['failed-to-remove'];
                            unset($_SESSION['failed-to-remove']);
                        }

                    ?>

                    <br><br>

                    <a href="<?php echo SITEURL; ?>admin/add-food.php" class="btn-primary">Add Food</a>

                    <br><br><br>

                    <table class="tbl-full">
                        <tr>
                            <th>S.N.</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Featured</th>
                            <th>Active</th>
                            <th>Actions</th>
                        </tr>

                        <?php
                            $sql = "SELECT * FROM tbl_food";

                            $res = mysqli_query($conn, $sql);

                            $sn = 1;

                            if ($res == TRUE) {
                                # code...
                                $count = mysqli_num_rows($res);

                                if ($count > 0) {
                                    # code...
                                    while ($rows = mysqli_fetch_assoc($res) ) {
                                        # code...

                                        $id = $rows['id'];
                                        $title = $rows['title'];
                                        $description = $rows['description'];
                                        $price = $rows['price'];
                                        $image_name = $rows['image_name'];
                                        $featured = $rows['featured'];
                                        $active = $rows['active'];

                                        ?>
                        <tr>
                            <td><?php echo $sn++ ?></td>
                            <td><?php echo $title ?></td>
                            <td><?php echo $description ?></td>
                            <td><?php echo $price ?></td>
                            <td><?php
                                if($image_name != ""){
                                    ?>
                                    <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" width="100px">
                                    <?php
                                }else{
                                    echo "<div class='error'>Image not found</div>";
                                }
                             ?>
                             </td>
                            <td><?php echo $featured ?></td>
                            <td><?php echo $active ?></td>
                            <td>
                                <a href="<?php echo SITEURL;?>admin/update-food.php?id=<?php echo $id;?>&image_name=<?php echo $image_name;?>" class="btn-secondary">Update Food</a>
                                <a href="<?php echo SITEURL;?>admin/delete-food.php?id=<?php echo $id;?>&image_name=<?php echo $image_name;?>" class="btn-danger">Delete Food</a>
                            </td>
                        </tr>

                        <?php

                            }
                            }else {
                            # code...
                            ?>
                                <tr>
                                    <td colspan="6" class="error">Food not added</td>
                                </tr>
                                <?php
                            }

                            }
                        ?>
                        
                    </table>
                </div>
            </div>
        <!-- main contents section ends -->


<?php include('partial/footer.php'); ?>