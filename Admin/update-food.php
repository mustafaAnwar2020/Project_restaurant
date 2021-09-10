<?php include('partials/menu.php'); ?>

        <?php 
            if(isset($_GET['id']) && is_numeric($_GET['id'])){
            
                $row = getRow('food','id',$_GET['id']);
                $title = $row['title'];
                $id = $row['id'];
                $current_image = $row['image_name'];
                $description = $row['description'];
                $active = $row['active'];
                $featured = $row['featured'];
                $price = $row['price'];
                $current_category = $row['category_id'];

            }
        ?>


<div class="main-content">
    <div class="wrapper">
        <h1>Update Food</h1>
        <br><br>

        <form action="" method="POST" enctype="multipart/form-data">
        
        <table class="tbl-30">

            <tr>
                <td>Title: </td>
                <td>
                    <input type="text" name="title" value="<?php echo htmlentities($title); ?>">
                </td>
            </tr>

            <tr>
                <td>Description: </td>
                <td>
                    <textarea name="description" cols="30" rows="5"><?php echo htmlentities($description); ?></textarea>
                </td>
            </tr>

            <tr>
                <td>Price: </td>
                <td>
                    <input type="number" name="price" value="<?php htmlentities($price); ?>">
                </td>
            </tr>

            <tr>
                <td>Current Image: </td>
                <td>
                    <?php 
                        if($current_image == "")
                        {
                            //Image not Available 
                            echo "<div class='error'>Image not Available.</div>";
                        }
                        else
                        {
                            //Image Available
                            ?>
                            <img src="<?php echo BURL; ?>images/food/<?php echo htmlentities($current_image); ?>" width="150px">
                            <?php
                        }
                    ?>
                </td>
            </tr>

            <tr>
                <td>Select New Image: </td>
                <td>
                    <input type="file" name="image">
                </td>
            </tr>

            <tr>
                <td>Category: </td>
                <td>
                    <select name="category">
                            <?php
                                $data = getRows('category');
                                foreach($data as $rows){
                                    $cat_id = $rows['cat_id'];
                                    $cat_title = $rows['title'];
                                    ?>
                                    <option <?php if($current_category==$cat_id){echo "selected";} ?> value="<?php echo $cat_id; ?>"><?php echo $cat_title; ?></option>
                                    <?php
                                }
                            ?>
                        

                    </select>
                </td>
            </tr>

            <tr>
                <td>Featured: </td>
                <td>
                    <input <?php if($featured=="Yes") {echo "checked";} ?> type="radio" name="featured" value="Yes"> Yes 
                    <input <?php if($featured=="No") {echo "checked";} ?> type="radio" name="featured" value="No"> No 
                </td>
            </tr>

            <tr>
                <td>Active: </td>
                <td>
                    <input <?php if($active=="Yes") {echo "checked";} ?> type="radio" name="active" value="Yes"> Yes 
                    <input <?php if($active=="No") {echo "checked";} ?> type="radio" name="active" value="No"> No 
                </td>
            </tr>

            <tr>
                <td>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="current_image" value="<?php echo htmlentities($current_image); ?>">

                    <input type="submit" name="submit" value="Update Food" class="btn-secondary">
                </td>
            </tr>
        
        </table>
        
        </form>
        <?php 
            if(isset($_POST['submit'])){
                $id = $_POST['id'];
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $cat_id = $_POST['category'];
                $current_image = $_POST['current_image'];
                if(isset($_POST['featured']))
                {
                    $featured = $_POST['featured'];
                }
                else
                {
                    $featured = "No"; 
                }
                
                if(isset($_POST['active']))
                {
                    $active = $_POST['active'];
                }
                else
                {
                    $active = "No"; 
                }
                $whitelist_ext = array('jpeg','jpg','png','gif');
                if(isset($_FILES['image']['name'])){
                    $Image_name = $_FILES['image']['name'];
                    if($Image_name != ""){
                        $end = explode(".",$Image_name);
                        $ext = end($end);
                        if (!in_array($ext, $whitelist_ext)) {
                         echo "<div class='error'>Invlaid File Type.</div>";
                        }
                        else
                        {
                         $check = getimagesize($_FILES['image']['tmp_name']);
                         if($check !== FALSE)
                         {
                             $Image_name = "Food_Category_".rand(000, 999).'.'.$ext;
                             $source_path = $_FILES['image']['tmp_name'];
                             $destination_path = "../images/food/".$Image_name;
                             $upload = move_uploaded_file($source_path,$destination_path);
                             if($upload == FALSE)
                             {
                                 echo "<div class='error'>Can't upload file .</div>";
                                 die();
                             }
                             if($current_image!="")
                                {
                                    $remove_path = "../images/food/".$current_image;
                                    $remove = unlink($remove_path);
                                    if($remove == FALSE)
                                    {
                                        echo "<div class='error'>Can't delete file .</div>";
                                    }
                                }
                         }
                         else
                         {
                             echo "<div class='error'>File is too large .</div>";
                         }
     
                        }
                        $stmt = $conn->prepare("UPDATE `food` SET `title` = ? , `image_name` = ? ,`description` = ? ,`price` = ?, `category_id` = ?, `featured` = ? , `active` = ?  WHERE `id` = ?");
                        $stmt->bind_param("ssssssss",$title,$Image_name,$description,$price,$cat_id,$featured,$active,$id);
                        $result = $stmt->execute();
                        if($result)
                        {
                            echo "<div class='error'>File Updated Successfully .</div>";
                        }
                        else
                        {
                            echo "<div class='error'>Something Went Wrong! </div>";
                        }
                    }
                    else
                    {
                     $Image_name="";
                     echo "<div class='error'>Invalid Image Name .</div>";
                    }
                }

            }
        ?>                        

    </div>
</div>

<?php include('partials/footer.php'); ?>