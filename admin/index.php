<?php include('partial/menu.php'); ?>

        <!-- main contents section start -->
            <div class="main-content">
                <div class="wrapper">
                    <h1>Dashboard</h1>

                    <?php

                        if(isset($_SESSION['login'])){
                            echo $_SESSION['login'];
                            unset($_SESSION['login']);
                        }

                    ?>

                    <div class="col-4 text-center">
                        <h1>5</h1>
                        <br>
                        category
                    </div>

                    <div class="col-4 text-center">
                        <h1>5</h1>
                        <br>
                        category
                    </div>

                    <div class="col-4 text-center">
                        <h1>5</h1>
                        <br>
                        category
                    </div>

                    <div class="col-4 text-center">
                        <h1>5</h1>
                        <br>
                        category
                    </div>

                    <div class="clear-fix">

                    </div>
                </div>
            </div>
        <!-- main contents section ends -->

        <?php include('partial/footer.php'); ?>