<?php include('partials-front/menu.php'); ?>
<section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo BURL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>

    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <?php
                $sql = "SELECT * FROM `category` WHERE `active` = 'Yes'";
                $res = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($res);
                if($count > 0){
                    while($row = mysqli_fetch_assoc($res))
                    {
                        $id = $row['cat_id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                    ?>
                    <a href="<?php echo BURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                    <div class="box-3 float-container">
                                <?php 
                                    //Check whether Image is available or not
                                    if($image_name=="")
                                    {
                                        //Display MEssage
                                        echo "<div class='error'>Image not Available</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="<?php echo BURL; ?>images/category/<?php echo htmlentities($image_name); ?>" alt="Pizza" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                                

                                <h3 class="float-text text-white"><?php echo htmlentities($title); ?></h3>
                            </div>
                        </a>
                    <?php
                    }
                }
                else{
                    echo "<div class='error'>Category not Added.</div>";
                }
            ?>


            <div class="clearfix"></div>

        </div>
    </section>
<?php include('partials-front/footer.php'); ?>