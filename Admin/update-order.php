<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Order</h1>
        <br><br>


        <?php 
        
            //CHeck whether id is set or not
            if(isset($_GET['id']))
            {
                $row = getRow('orders','id',$_GET['id']);
                $food = $row['food'];
                $id = $row['id'];
                $price = $row['price'];
                $qty = $row['qty'];
                $status = $row['status'];
                $customerName = $row['customerName'];
                $customerContact = $row['customerContact'];
                $customerEmail = $row['customerEmail'];
                $customerAddress = $row['customerAddress'];
            }
        
        ?>

        <form action="" method="POST">
        
            <table class="tbl-30">
                <tr>
                    <td>Food Name</td>
                    <td><b> <?php echo $food; ?> </b></td>
                </tr>

                <tr>
                    <td>Price</td>
                    <td>
                        <b> $ <?php echo $price; ?></b>
                    </td>
                </tr>

                <tr>
                    <td>Qty</td>
                    <td>
                        <input type="number" name="qty" value="<?php echo $qty; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Status</td>
                    <td>
                        <select name="status">
                            <option <?php if($status=="Ordered"){echo "selected";} ?> value="Ordered">Ordered</option>
                            <option <?php if($status=="On Delivery"){echo "selected";} ?> value="On Delivery">On Delivery</option>
                            <option <?php if($status=="Delivered"){echo "selected";} ?> value="Delivered">Delivered</option>
                            <option <?php if($status=="Cancelled"){echo "selected";} ?> value="Cancelled">Cancelled</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Customer Name: </td>
                    <td>
                        <input type="text" name="customer_name" value="<?php echo $customerName; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Customer Contact: </td>
                    <td>
                        <input type="text" name="customer_contact" value="<?php echo $customerContact; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Customer Email: </td>
                    <td>
                        <input type="text" name="customer_email" value="<?php echo $customerEmail; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Customer Address: </td>
                    <td>
                        <textarea name="customer_address" cols="30" rows="5"><?php echo $customerAddress; ?></textarea>
                    </td>
                </tr>

                <tr>
                    <td clospan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <input type="submit" name="submit" value="Update Order" class="btn-secondary">
                    </td>
                </tr>
            </table>
        
        </form>

            <?php
                if(isset($_POST['submit']))
                {
                    $id = $_POST['id'];
                    $price = $_POST['price'];
                    $qty = $_POST['qty'];
                    $total = $price * $qty;
                    $status = $_POST['status'];
                    $customer_name = $_POST['customer_name'];
                    $customer_contact = $_POST['customer_contact'];
                    $customer_email = $_POST['customer_email'];
                    $customer_address = $_POST['customer_address'];
                    $stmt = $conn->prepare("UPDATE `orders` SET `price`= ? , `qty` = ? , `total` = ? , `status` = ? , `customerName` = ?,`customerContact` = ?, `customerEmail` = ? , `customerAddress` = ? WHERE `id` = ? ");
                    $stmt->bind_param("sssssssss",$price,$qty,$total,$status,$customer_name,$customer_contact,$customer_email,$customer_address,$id);
                    $result = $stmt->execute();
                    if($result)
                    {
                        echo "<div class='error'>Order Updated Successfully .</div>";
                    }
                    else
                    {
                        echo "<div class='error'>Something Went Wrong! </div>";
                    }
                }

            ?>
        


    </div>
</div>

<?php include('partials/footer.php'); ?>