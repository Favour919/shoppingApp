<?php include('./config/constant.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Food order system</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <div class="login">
            <h1 class="text-center">Login</h1>
                <br><br>

                <?php

                        if(isset($_SESSION['login'])){
                            echo $_SESSION['login'];
                            unset($_SESSION['login']);
                        }

                        if(isset($_SESSION['no-login-found'])){
                            echo $_SESSION['no-login-found'];
                            unset ($_SESSION['no-login-found']);
                        }
                    ?>
            <form action="" method="post" class="text-center">
                Username: <br>
                <input type="text" name="username" placeholder="Enter Username"><br><br>
                Password: <br>
                <input type="password" name="password" placeholder="Enter Password"><br><br>

                <input type="submit" value="login" name="submit" class="btn-primary">
                <br><br>
            </form>

            <p class="text-center">Created by <a href="">Favour Bassey</a></p>
    </div>

   
</body>
</html>

<?php 
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $sql = "SELECT * FROM tbl_admin WHERE username = '$username' and password = '$password'";

        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);

        if ($count == 1){
            $_SESSION['login'] = "<div class='success'>Login successfully.</div>";
            $_SESSION['user'] = $username;
            header("location:".SITEURL.'admin/');
                                     
        }else{
            $_SESSION['login'] = "<div class='error text-center'>Username or password did not match.</div>";
            header("location:".SITEURL.'admin/login.php');
        }
    }

    ?>