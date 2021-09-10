<?php include('partials-front/menu.php'); ?>

<?php 
    if(isset($_GET['food_id']))
    {
        $row = getRow('food','id',$_GET['food_id']);
        if($row)
        {
            $title = $row['title'];
            $price = $row['price'];
            $image_name = $row['image_name'];
        }
        else
        {
            header("location:".BURL);
        }

    }
?>

<section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                        <?php 
                        
                            //CHeck whether the image is available or not
                            if($image_name=="")
                            {
                                //Image not Availabe
                                echo "<div class='error'>Image not Available.</div>";
                            }
                            else
                            {
                                //Image is Available
                                ?>
                                <img src="<?php echo BURL; ?>images/food/<?php echo htmlentities($image_name); ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                <?php
                            }
                        
                        ?>
                        
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $title; ?></h3>
                        <input type="hidden" name="food" value="<?php echo htmlentities($title); ?>">

                        <p class="food-price">$<?php echo htmlentities($price); ?></p>
                        <input type="hidden" name="price" value="<?php echo htmlentities($price); ?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Vijay Thapa" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. hi@vijaythapa.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>
            </form>

            <?php
                if(isset($_POST['submit']))
                {
                    $food = $_POST['food'];
                    $price = $_POST['price'];
                    $qty = $_POST['qty'];
                    $total = $price * $qty;
                    $date = date("Y-m-d h:i:s");
                    $status = "Ordered";
                    $customer_name = $_POST['full-name'];
                    $customer_contact = $_POST['contact'];
                    $customer_email = $_POST['email'];
                    $customer_address = $_POST['address'];
                    $stmt = $conn->prepare("INSERT INTO `orders` (`food`,`price`,`qty`,`total`,`date`,`status`,`customerName`,`customerContact`,`customerEmail`,`customerAddress`) VALUES (?,?,?,?,?,?,?,?,?,?)");
                    $stmt->bind_param("ssssssssss",$food,$price,$qty,$total,$date,$status,$customer_name,$customer_contact,$customer_email,$customer_address);
                    $result = $stmt->execute();
                    if($result)
                    {
                        echo"<div class='success text-center'>Food Ordered Successfully.</div>";
                    }
                    else
                    {
                        echo"<div class='success text-center'>Invalid order .</div>";
                    }
                }
            ?>

<?php include('partials-front/footer.php'); ?>