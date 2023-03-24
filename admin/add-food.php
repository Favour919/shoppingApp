<?php include('partial/menu.php'); ?>


<div class="main-content">
                <div class="wrapper">
                    <h1>Add Food</h1>

                    <br><br>

                    <form action="" method="POST" enctype="multipart/form-data">
    <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Food Title">
                    </td>
                </tr>
                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description" id="" cols="30" rows="5" placeholder="Description of the food"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Price: </td>
                    <td>
                        <input type="num" name="price" placeholder="">
                    </td>
                </tr>
                <tr>
                    <td>Select image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>Category: </td>
                    <td>
                        <select name="category">
                        <?php 
                             $sql = "SELECT * FROM tbl_category WHERE active='Yes'";

                             $res = mysqli_query($conn, $sql);

                                $count = mysqli_num_rows($res);
    
                                    if ($count > 0){
                                        while ($rows = mysqli_fetch_assoc($res) ) {
                                            # code...
    
                                            $id = $rows['id'];
                                            $title = $rows['title'];

                                        ?>
                                            <option value="<?php echo $id ?>"><?php echo $title ?></option> 
                                         <?php
                                        }
                                    }else {
                                        ?>
                                            <option value="0">No food found</option> 
                                         <?php
                                    }
                                
                        
                        ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Featured: </td>
                    <td>
                    <input type="radio" name="featured" value="Yes"> Yes
                    <input type="radio" name="featured" value="No"> No
                    </td>
                </tr>
                <tr>
                    <td>Active: </td>
                    <td>
                    <input type="radio" name="active" value="Yes"> Yes
                    <input type="radio" name="active" value="No"> No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Food" class="btn-secondary">
                    </td>
                </tr>
            </table>
    </form>

    <?php 

        if(isset($_POST['submit'])){

            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $category = $_POST['category'];

            if(isset($_POST['featured'])){

                $featured = $_POST['featured'];
            }else{
                $featured = "No";
            }
        
            if(isset($_POST['active'])){
        
                $active = $_POST['active'];
            }else{
                $active = "No";
            }

            if(isset($_FILES['image']['name'])){

                $image_name = $_FILES['image']['name'];

                if($image_name != ""){

                $ext = end(explode('.', $image_name));

                $image_name = "Food_Name_".rand(000, 999).'.'.$ext;

                $source_path = $_FILES['image']['tmp_name'];

                $destination_path = "../images/food/".$image_name;
        
                $upload = move_uploaded_file($source_path,$destination_path);
        
                if($upload == false){
                    $_SESSION['upload'] = "<div class='error'>Failed to upload image</div>";
                    header("location:".SITEURL.'admin/manage-food.php');
                    die();
                }
            }
            }else{
                $image_name = "";
            }

            $sql = "INSERT INTO tbl_food SET 
                title = '$title',
                price = $price,
                description = '$description',
                image_name = '$image_name',
                category_id = $category,
                featured = '$featured',
                active = '$active'
            ";

            $res = mysqli_query($conn, $sql);

            if($res == TRUE){
                $_SESSION['add'] = "<div class='success'>Food added successfully</div>";
                header("location:".SITEURL.'admin/manage-food.php');
            }else{
                $_SESSION['add'] = "<div class='error'>Failed to add Food</div>";
                header("location:".SITEURL.'admin/add-food.php');
            }
        

        }
    
    ?>

     </div>
</div>

<?php include('partial/footer.php'); ?>
