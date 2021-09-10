<?php include('partials-front/menu.php'); ?>


<?php 
    if(isset($_GET['category_id']))
    {
        $row=getRow('category','cat_id',$_GET['category_id']);
        $title = $row['title'];
    }
    else
    {
        header('location:'.BURL);
    }
?>

<section class="food-search text-center">
        <div class="container">
            
            <h2>Foods on <a href="#" class="text-white">"<?php echo htmlentities($title); ?>"</a></h2>

        </div>
</section>
<section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php 
            
                //Create SQL Query to Get foods based on Selected CAtegory
                $row2=getRow('food','category_id',$_GET['category_id']);
                if($row2)
                {
                    $id = $row2['id'];
                $title = $row2['title'];
                $price = $row2['price'];
                $description = $row2['description'];
                $image_name = $row2['image_name'];
            
                
            ?>
                        
                <div class="food-menu-box">
                    <div class="food-menu-img">
                        <?php 
                            if($image_name=="")
                            {
                                        //Image not Available
                                echo "<div class='error'>Image not Available.</div>";
                            }
                            else
                            {
                                        //Image Available
                                ?>
                                <img src="<?php echo BURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                <?php
                            }
                        ?>
                                
                            </div>

                            <div class="food-menu-desc">
                                <h4><?php echo htmlentities($title); ?></h4>
                                <p class="food-price">$<?php echo htmlentities($price); ?></p>
                                <p class="food-detail">
                                    <?php echo htmlentities($description); ?>
                                </p>
                                <br>

                                <a href="<?php echo BURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                            </div>
                        </div>

                        <?php
                }
                else
                {
                    //Food not available
                    echo "<div class='error'>Food not Available.</div>";
                }
            
            ?>
             <div class="clearfix"></div>

            

</div>

</section>
<?php include('partials-front/footer.php'); ?>