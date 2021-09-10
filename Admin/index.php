<?php include('partials/menu.php'); ?>
<div class="main-content">
            <div class="wrapper">
                <h1>Dashboard</h1>
                <br><br>
                
                <br><br>

                <div class="col-4 text-center">

                  <?php 
                    $data = getRows('category');$sum_cat =0;
                    foreach($data as $rows)
                    {
                        $sum_cat++;
                    }
                  ?>

                    <h1><?php echo $sum_cat;?></h1>
                    <br />
                    Categories
                </div>

                <div class="col-4 text-center">


                <?php 
                    $data = getRows('food');$sum_food =0;
                    foreach($data as $rows)
                    {
                        $sum_food++;
                    }
                  ?>

                    <h1><?php echo $sum_food;?></h1>
                    <br />
                    Foods
                </div>

                <div class="col-4 text-center">
                    
                    

                <?php 
                    $data = getRows('orders');$sum_order =0;
                    foreach($data as $rows)
                    {
                        $sum_order++;
                    }
                  ?>

                    <h1><?php echo $sum_order;?></h1>
                    <br />
                    Total Orders
                </div>

                <div class="col-4 text-center">
                    
                    <?php 
                        $sql = "SELECT SUM(`total`) AS `Total` FROM `orders` WHERE status='Delivered'";
                        $res = mysqli_query($conn,$sql);
                        $row = mysqli_fetch_assoc($res);
                        $total_revenue = $row['Total'];
                    ?>

                    <h1><?php echo $total_revenue;?></h1>
                    <br />
                    Revenue Generated
                </div>

                <div class="clearfix"></div>

            </div>
        </div>
        <!-- Main Content Setion Ends -->

<?php include('partials/footer.php') ?>