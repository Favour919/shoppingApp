<?php 

include('./config/constant.php'); 
include('login-check.php'); 

?>

<html>
    <head>
        <title>Food order website - Home page</title>

        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
        <!-- menu section start -->
            <div class="menu text-center">
                <div class="wrapper">
                    <ul>
                        <li><a href="<?php echo SITEURL;?>admin/index.php">Home</a></li>
                        <li><a href="<?php echo SITEURL;?>admin/manage-admin.php">Admin</a></li>
                        <li><a href="<?php echo SITEURL;?>admin/manage-category.php">Category</a></li>
                        <li><a href="<?php echo SITEURL;?>admin/manage-food.php">Food</a></li>
                        <li><a href="<?php echo SITEURL;?>admin/manage-order.php">Order</a></li>
                        <li><a href="<?php echo SITEURL;?>admin/logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        <!-- menu section ends -->