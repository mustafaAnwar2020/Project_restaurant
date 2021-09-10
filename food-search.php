<?php include('partials-front/menu.php'); ?>
<section class="food-search text-center">
        <div class="container">
            <?php 

                //Get the Search Keyword
                // $search = $_POST['search'];
                $search = $_POST['search'];
            
            ?>
            <h2>Foods on Your Search <a href="#" class="text-white">"<?php echo htmlentities($search); ?>"</a></h2>

        </div>
</section>

<section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
                <?php
                    $search1 = "%{$_POST['search']}%";
                    //$sql = "SELECT * FROM `food` WHERE `title` LIKE '%$search%' OR `description` LIKE'%$search%'";
                    $stmt = $conn->prepare("SELECT * FROM `food` WHERE `title` LIKE ? OR `description` LIKE ?");                  
                    $stmt->bind_param('ss',$search1,$search1);
                    $stmt->execute();
                    $res = $stmt->get_result();
                    $count = mysqli_num_rows($res) ;
                    if($count > 0)
                    {
                        while($row = $res->fetch_assoc())
                        {
                            $id = $row['id'];
                            $title = $row['title'];
                            $price = $row['price'];
                            $description = $row['description'];
                            $image_name = $row['image_name'];
                            ?>            

                        <div class="food-menu-box">
                            <div class="food-menu-img">
                            <?php 
                                if($row['image_name'] !="")
                                {
                            ?>
                                <img src="<?php echo BURL; ?>images/food/<?php echo htmlentities($row['image_name']); ?>" width="100px" >
                                <?php 
                                }
                                else
                                {
                                    echo "<div class='error'>Image not Added.</div>";         
                                }
                            ?>   
                                
                            </div>

                            <div class="food-menu-desc">
                                <h4><?php echo htmlentities($title); ?></h4>
                                <p class="food-price">$<?php echo  htmlentities($price); ?></p>
                                <p class="food-detail">
                                    <?php echo  htmlentities($description); ?>
                                </p>
                                <br>

                                <a href="#" class="btn btn-primary">Order Now</a>
                            </div>
                        </div>

              
                        <?php
                        }
                        
                    }  
                    else
                    {
                        echo "<div class='error'>Food not found.</div>"; 
                    }
                ?>
            

            <div class="clearfix"></div>

            

        </div>

    </section>

<?php include('partials-front/footer.php'); ?>