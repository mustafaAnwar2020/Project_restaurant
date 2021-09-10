<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Food</h1>

        <br><br>


        <form action="" method="POST" enctype="multipart/form-data">
        
            <table class="tbl-30">

                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Title of the Food">
                    </td>
                </tr>

                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description" cols="30" rows="5" placeholder="Description of the Food."></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Price: </td>
                    <td>
                        <input type="number" name="price">
                    </td>
                </tr>

                <tr>
                    <td>Select Image: </td>
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
                                    $id = $rows['cat_id'];
                                    $title = $rows['title'];
                                    ?>
                                    <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
                                    <?php
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="featured" value="Yes"> Yes 
                        <input type="radio" name="featured" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Yes"> Yes 
                        <input type="radio" name="active" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Food" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>

        <?php 
            if(isset($_POST['submit'])){
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $cat_id = $_POST['category'];
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
                         }
                         else
                         {
                             echo "<div class='error'>File is too large .</div>";
                         }
     
                        }
                        $stmt = $conn->prepare("INSERT INTO `food` (`title`,`description`,`image_name`,`active`,`featured`,`price`,`category_id`) VALUES (?,?,?,?,?,?,?) ");
                        $stmt->bind_param("sssssss",$title,$description,$Image_name,$active,$featured,$price,$cat_id);
                        $result = $stmt->execute();
                        if($result)
                        {
                            echo "<div class='error'>File Uploaded Successfully .</div>";
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