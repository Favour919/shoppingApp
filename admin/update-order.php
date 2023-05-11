<?php include('partial/menu.php'); ?>


<div class="main-content">
                <div class="wrapper">
                    <h1>Update Order</h1>
                    <br><br>
                    <?php 

            if (isset($_GET['id'])) {
                # code...
                $id = $_GET['id'];
                $sql = "SELECT * FROM tbl_order WHERE id = $id";

                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                    if ($count == 1){
                        $rows = mysqli_fetch_assoc($res);

                        $food = $rows['food'];
                        $price = $rows['price'];
                        $qty = $rows['qty'];
                        $status = $rows['status'];
                        $customer_name = $rows['customer_name'];
                        $customer_contact = $rows['customer_contact'];
                        $customer_email = $rows['customer_email'];
                        $customer_address = $rows['customer_address'];

                    }else{
                        $_SESSION['category-not-found'] = "<div class='error'>Order not found.</div>";
                        header("location:".SITEURL.'admin/manage-order.php');
                    }


            }else{

                header("location:".SITEURL.'admin/manage-order.php');
            }


            ?>
                    <form action="" method="post" enctype="multipart/form-data">
                    <table class="tbl-30">
                <tr>
                    <td>Food Name: </td>
                    <td>
                    <b><?php echo $food; ?></b> 
                    </td>
                </tr>
                <tr>
                    <td>Price: </td>
                    <td>
                        <b><?php echo $price; ?></b> 
                    </td>
                </tr>
                <tr>
                    <td>Qty: </td>
                    <td>
                    <input type="number" name="qty" id="" value="<?php echo $qty; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Status: </td>
                    <td>
                        <select name="status">
                            <option <?php if($status == "Ordered"){echo "selected";} ?> value="Ordered">Ordered</option>
                            <option <?php if($status == "On Delivery"){echo "selected";} ?> value="On Delivery">On Delivery</option>
                            <option <?php if($status == "Delivered"){echo "selected";} ?> value="Delivered">Delivered</option>
                            <option <?php if($status == "Cancelled"){echo "selected";} ?> value="Cancelled">Cancelled</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Customer Name: </td>
                    <td>
                        <input type="text" name="customer_name" id="" value="<?php echo $customer_name; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Customer Contact: </td>
                    <td>
                        <input type="tel" name="customer_contact" id="" value="<?php echo $customer_contact; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Customer Email: </td>
                    <td>
                        <input type="email" name="customer_email" id="" value="<?php echo $customer_email; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Customer Address: </td>
                    <td>
                    <textarea name="address" rows="4" cols="30" class="input-responsive" ><?php echo $customer_address; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="price" value="<?php echo $price; ?>">
                        <input type="submit" name="submit" value="Update Order" class="btn-secondary">
                    </td>
                </tr>
            </table>
            </form>

            <?php 

    if(isset($_POST['submit'])){

    $id = $_GET['id'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $total = $price * $qty;

    $status = $_POST['status'];

    $customer_name = $_POST['customer_name'];
    $customer_contact = $_POST['customer_contact'];
    $customer_email = $_POST['customer_email'];
    $customer_address = $_POST['address'];


    $sql2 = "UPDATE tbl_order SET 
                qty = $qty,
                total = $total,
                status = '$status',
                customer_name = '$customer_name',
                customer_contact = '$customer_contact',
                customer_email = '$customer_email',
                customer_address = '$customer_address'
                WHERE id='$id'
            ";

        $res2 = mysqli_query($conn, $sql2);

    if($res2 == true){
        $_SESSION['update'] = "<div class='success'>Order Updated successfully.</div>";
         header("location:".SITEURL.'admin/manage-order.php');
     }else{
        $_SESSION['update'] = "<div class='error'>Failed to update order.</div>";
        header("location:".SITEURL.'admin/manage-order.php');
    }
}

?>

        </div>
</div>

<?php include('partial/footer.php'); ?>