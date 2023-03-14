<?php 


if(!isset($_SESSION['user'])){
    $_SESSION['no-login-found'] = "<div class='error text-center'>Please login to access Admin panel.</div>";
    header("location:".SITEURL.'admin/login.php');
}


?>