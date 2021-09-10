<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Category</h1>

        <br /><br />
       
        <br><br>

                <!-- Button to Add Admin -->
                <a href="<?php echo BURL; ?>Admin/add-category.php" class="btn-primary">Add Category</a>

                <br /><br /><br />

                <table class="tbl-full">
                    <tr>
                    <th>S.N.</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>
                    <?php 
                        $data = getRows("category");$x=1;$chk=0;
                        foreach($data as $rows){?>

                        
                   

                                    <tr>
                                        <td><?php echo $x?>. </td>
                                        <td><?php echo htmlentities($rows['title']);?></td>

                                        <td>
                                        <?php 
                                            if($rows['image_name'] !="")
                                            {
                                                ?>
                                                <img src="<?php echo BURL; ?>images/category/<?php echo htmlentities($rows['image_name']); ?>" width="100px" >
                                                <?php 
                                            }
                                            else
                                            {
                                                echo "<div class='error'>Image not Added.</div>";         
                                            }
                                           ?>

                                        </td>
                                        <td><?php echo htmlentities($rows['featured']); ?></td>
                                        <td><?php echo htmlentities($rows['active']); ?></td>
                                        <td>
                                            <a href="<?php echo BURL; ?>Admin/update-category.php?id=<?php echo htmlentities($rows['cat_id']); ?>" class="btn-secondary">Update Category</a>
                                            <a href="#"class="btn btn-danger delete" data-field="cat_id" data-id="<?php echo htmlentities($rows['cat_id']);?>" data-table="category">Delete Category</a>
                                        </td>
                                    </tr>

                            <?php $x++;$chk=1;}?>        

                        
                            <?php 
                            if($chk == 0){
                               echo "<tr>";
                               echo"<td colspan=\"6\"><div class=\"error\">No Category Added.</div></td>";
                               echo"</tr>";
                            }                
                            ?>
                            

                    

                    
                </table>
    </div>
    
</div>

<?php include('partials/footer.php'); ?>