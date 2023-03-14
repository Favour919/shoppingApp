<?php include('partial/menu.php'); ?>

<div class="main-content">
                <div class="wrapper">
                    <h1>Change Password</h1>

                    <br><br>

                    <?php 
                    
                    if (isset($_Get['id'])) {
                        $id = $_Get['id'];
                    }
                    
                    
                    ?>


                    <form action="" method="post">
                    <table class="tbl-30">
                    <tr>
                        <td>Current Password: </td>
                        <td>
                            <input type="password" name="current_password" placeholder="current password">
                        </td>
                    </tr>
                    
                    <tr>
                        <td>New Password: </td>
                        <td>
                            <input type="password" name="new_password" placeholder="New password">
                        </td>
                    </tr>
                    <tr>
                        <td>Confirm Password: </td>
                        <td>
                            <input type="password" name="confirm_password" placeholder="Confirm password">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                        <input type="hidden" name="" value="<?php echo $id; ?>">
                            <input type="submit" name="submit" value="Change Password" class="btn-secondary">
                        </td>
                </tr>
            </table>
        </form>

                    
                </div>
            </div>
        <!-- main contents section ends -->


        <?php

            if(isset($_POST['submit'])){  
                $id = $_GET['id'];
                $current_password = md5($_POST['current_password']);
                $new_password = md5($_POST['new_password']);
                $confirm_password = md5($_POST['confirm_password']);

                $sql = "SELECT * FROM tbl_admin WHERE id = $id and password = '$current_password'";

                $res = mysqli_query($conn, $sql);

                if ($res == TRUE){
                    $count = mysqli_num_rows($res);

                                if ($count == 1){


                                    if ($new_password == $confirm_password) {
                                        # code...

                                        $sql2 = "UPDATE tbl_admin SET 
                                        password = '$new_password'
                                        WHERE id = '$id'
                                    ";
                                
                                    $res2 = mysqli_query($conn, $sql2);

                                    if($res2 == true){
                                        $_SESSION['pwd-change'] = "<div class='success'>Password Changed successfully.</div>";
                                         header("location:".SITEURL.'admin/manage-admin.php');
                                     }else{
                                        $_SESSION['pwd-change'] = "<div class='error'>Failed to Change Password.</div>";
                                        header("location:".SITEURL.'admin/manage-admin.php');
                                    }

                                    }else{
                                        $_SESSION['pwd-not-match'] = "<div class='error'>Password did not match.</div>";
                                        header("location:".SITEURL.'admin/manage-admin.php');
                                    }
                                }else{
                                    $_SESSION['user-not-found'] = "<div class='error'>User not found.</div>";
                                    header("location:".SITEURL.'admin/manage-admin.php');
                                }
                }
            }

        ?>

<?php include('partial/footer.php'); ?>