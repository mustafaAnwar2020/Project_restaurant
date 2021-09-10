<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>

        <br><br>

        <?php 
        
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        
        ?>

        <br><br>

        <!-- Add CAtegory Form Starts -->
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Category Title">
                    </td>
                </tr>

                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image">
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
                        <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>
       

       <?php 
       if(isset($_POST['submit']))
       {
           $whitelist_ext = array('jpeg','jpg','png','gif');
           $title = $_POST['title'];
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
                        $destination_path = "../images/category/".$Image_name;
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
                   $stmt = $conn->prepare("INSERT INTO `category` (`title`,`image_name`,`active`,`featured`) VALUES (?,?,?,?) ");
                   $stmt->bind_param("ssss",$title,$Image_name,$active,$featured);
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