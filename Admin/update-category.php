<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Category</h1>

        <br><br>

        <?php 
            if(isset($_GET['id']) && is_numeric($_GET['id'])){
            
                $row = getRow('category','cat_id',$_GET['id']);
                $title = $row['title'];
                $id = $row['cat_id'];
                $current_image = $row['image_name'];
            }
        ?>
       

        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" value="<?php echo htmlentities($title); ?>">
                    </td>
                </tr>

                <tr>
                    <td>Current Image: </td>
                    <td>
                        <?php
                        if($current_image!="")
                        {
                        ?>
                        <img src="<?php echo BURL; ?>images/category/<?php echo htmlentities($current_image); ?>" width="100px" >
                        <?php 
                        }
                        else
                        {
                            echo "<div class='error'>Image not Added.</div>";         
                        }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>New Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="hidden" name="current_image" value="<?php echo htmlentities($current_image); ?>">
                        <input type="hidden" name="id" value="<?php echo htmlentities($id); ?>">
                        <input type="submit" name="submit" value="Update Category" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>

        <?php 
            if(isset($_POST['submit']))
            {
                $id = $_POST['id'];
                $title = $_POST['title'];
                $Image = $_POST['current_image'];
                $whitelist_ext = array('jpeg','jpg','png','gif');
                $title = $_POST['title'];
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
                                if($Image!="")
                                {
                                    $remove_path = "../images/category/".$Image;
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
                        $stmt = $conn->prepare("UPDATE `category` SET `title` = ? , `image_name` = ? WHERE `cat_id` = ?");
                        $stmt->bind_param("sss",$title,$Image_name,$id);
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
                    $Image_name=$Image;
                    echo "<div class='error'>Invalid Image Name .</div>";
                }
             }
            }
        ?>

    </div>
</div>

<?php include('partials/footer.php'); ?>