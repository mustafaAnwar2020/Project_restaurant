<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Order</h1>

                <br /><br /><br />

                
                <br><br>
                <?php 
                    $data = getRows('orders');$x=1;
                    if($data)
                    {
                        foreach($data as $rows){
                            $status=$rows['status'];
                    
                    
                ?>

                    
                <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Food</th>
                        <th>Price</th>
                        <th>Qty.</th>
                        <th>Total</th>
                        <th>Order Date</th>
                        <th>Status</th>
                        <th>Customer Name</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>

                    

                                    <tr>
                                        <td><?php echo $x;?>. </td>
                                        <td><?php echo htmlentities($rows['food']);?></td>
                                        <td><?php echo htmlentities($rows['price']);?></td>
                                        <td><?php echo htmlentities($rows['qty']);?></td>
                                        <td><?php echo htmlentities($rows['total']);?></td>
                                        <td><?php echo htmlentities($rows['date']);?></td>

                                        <td>
                                           <?php
                                                if($status=="Ordered")
                                                {
                                                    echo "<label>".htmlentities($status)."</label>";
                                                }
                                                elseif($status=="On Delivery")
                                                {
                                                    echo "<label style='color: orange;'>".htmlentities($status)."</label>";
                                                }
                                                elseif($status=="Delivered")
                                                {
                                                    echo "<label style='color: green;'>".htmlentities($status)."</label>";
                                                }
                                                elseif($status=="Cancelled")
                                                {
                                                    echo "<label style='color: red;'>".htmlentities($status)."</label>";
                                                }
                                           ?>
                                        </td>

                                        <td><?php echo htmlentities($rows['customerName']);?></td>
                                        <td><?php echo htmlentities($rows['customerContact']);?></td>
                                        <td><?php echo htmlentities($rows['customerEmail']);?></td>
                                        <td><?php echo htmlentities($rows['customerAddress']);?></td>
                                        <td>
                                            <a href="<?php echo BURL; ?>Admin/update-order.php?id=<?php echo $rows['id']; ?>" class="btn-secondary">Update Order</a>
                                        </td>
                                    </tr>

                                
                            <?php
                              $x++;}
                            }
                            else
                            {
                                echo "<tr><td colspan='12' class='error'>Orders not Available</td></tr>";
                            }
                            ?>
                </table>
    </div>
    
</div>

<?php include('partials/footer.php'); ?>