<?php include('partial/menu.php'); ?>

<!-- main contents section start -->
<div class="main-content">
                <div class="wrapper">
                    <h1>Manage oder</h1>


                    <br><br><br>

                    <?php

                            if(isset($_SESSION['update'])){
                                echo $_SESSION['update'];
                                unset($_SESSION['update']);
                            }
                        ?>
                        <br><br>

                    <table class="tbl-full">
                        <tr>
                            <th>S.N.</th>
                            <th>Food</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Total</th>
                            <th>Order Date</th>
                            <th>Status</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Actions</th>
                        </tr>

                        <?php
                            $sql = "SELECT * FROM tbl_order ORDER BY id desc";

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
                                        $food = $rows['food'];
                                        $price = $rows['price'];
                                        $qty = $rows['qty'];
                                        $total = $rows['total'];
                                        $order_date = $rows['order_date'];
                                        $status = $rows['status'];
                                        $customer_name = $rows['customer_name'];
                                        $customer_contact = $rows['customer_contact'];
                                        $customer_email = $rows['customer_email'];
                                        $customer_address = $rows['customer_address'];

                                        ?>
                                        <tr>
                                            <td><?php echo $sn++ ?></td>
                                            <td><?php echo $food ?></td>
                                            <td><?php echo $price ?></td>
                                            <td><?php echo $qty ?></td>
                                            <td><?php echo $total ?></td>
                                            <td><?php echo $order_date ?></td>
                                            <td><?php 
                                                if($status == "Ordered"){
                                                    echo "<label style='color: black;'>$status</label>";
                                                }elseif($status == "On Delivery"){
                                                    echo "<label style='color: orange;'>$status</label>";
                                                }elseif ($status == "Delivered") {
                                                    echo "<label style='color: green;'>$status</label>";
                                                }elseif ($status == "Cancelled") {
                                                    echo "<label style='color: red;'>$status</label>";
                                                }
                                            
                                            ?> 
                                            </td>
                                            <td><?php echo $customer_name ?></td>
                                            <td><?php echo $customer_contact ?></td>
                                            <td><?php echo $customer_email ?></td>
                                            <td><?php echo $customer_address ?></td>
                                            <td>
                                                <a href="<?php echo SITEURL;?>admin/update-order.php?id=<?php echo $id;?>" class="btn-secondary">Update Order</a>
                                            </td>
                                        </tr>
                                        <?php

                                }
                                }else {
                                # code...
                                ?>
                                    <tr>
                                        <td colspan="6" class="error">Order not Available</td>
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