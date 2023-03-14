<?php include('partial/menu.php'); ?>

<!-- main contents section start -->
<div class="main-content">
                <div class="wrapper">
                    <h1>Manage category</h1>
<br>
                    <?php

                        if(isset($_SESSION['add'])){
                            echo $_SESSION['add'];
                            unset($_SESSION['add']);
                        }

                    ?>
<br><br>
                    <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn-primary">Add Category</a>

                    <br><br><br>
                   

                    <table class="tbl-full">
                        <tr>
                            <th>S.N.</th>
                            <th>Title</th>
                            <th>Image name</th>
                            <th>Featured</th>
                            <th>Active</th>
                            <th>Actions</th>
                        </tr>

                        <?php
                            $sql = "SELECT * FROM tbl_category";

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
                                        $image_name = $rows['image_name'];
                                        $featured = $rows['featured'];
                                        $active = $rows['active'];

                                        ?>
                        <tr>
                            <td><?php echo $sn++ ?></td>
                            <td><?php echo $title ?></td>
                            <td><?php
                                if($image_name != ""){
                                    ?>
                                    <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" width="100px">
                                    <?php
                                }else{
                                    echo "<div class='error'>Image not found</div>";
                                }
                             ?>
                             </td>
                            <td><?php echo $featured ?></td>
                            <td><?php echo $active ?></td>
                            <td>
                                <a href="#" class="btn-secondary">Update Category</a>
                                <a href="<?php echo SITEURL;?>admin/delete-category.php?id=<?php echo $id;?>&image_name = <?php echo $image_name;?>" class="btn-danger">Delete Category</a>
                            </td>
                        </tr>

                        <?php

                            }
                            }else {
                            # code...
                            ?>
                                <tr>
                                    <td colspan="6" class="error">No Category Found</td>
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