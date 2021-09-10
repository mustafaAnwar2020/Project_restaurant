<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Food</h1>

        <br /><br />

                
                <a href="<?php echo BURL; ?>Admin/add-food.php" class="btn-primary">Add Food</a>

                <br /><br /><br />

                

                <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Actions</th>
                        <?php exec("whoami");?>
                    </tr>
                    <?php
                        $data = getRows('food');$x=1;
                        foreach($data as $rows){
                       ?>     
                    <tr>
                    <td><?php echo $x;?>. </td>
                                    <td><?php echo htmlentities($rows['title']);?></td>
                                    <td><?php echo htmlentities($rows['price']);?></td>
                                    <td>
                                        <?php 
                                            if($rows['image_name']!="")
                                            {
                                                ?>
                                                <img src="<?php echo BURL; ?>images/food/<?php echo htmlentities($rows['image_name']); ?>" width="100px">
                                                <?php
                                            }    
                                            else
                                            {
                                                echo "<div class='error'>Image not Added.</div>";
                                            }
                                            
                                        ?>
                                    </td>
                                    <td><?php echo htmlentities($rows['featured']);?></td>
                                    <td><?php echo htmlentities($rows['active']);?></td>
                                    <td>
                                        <a href="<?php echo BURL; ?>Admin/update-food.php?id=<?php echo htmlentities($rows['id']); ?>" class="btn-secondary">Update Food</a>
                                        <a href="#"class="btn btn-danger delete" data-field="id" data-id="<?php echo htmlentities($rows['id']);?>" data-table="food">Delete Food</a>
                                    </td>
                                </tr>

                         <?php
                          $x++;  }
                         ?>
                    </tr>
    </table>
    </div>
    
</div>

<?php include('partials/footer.php'); ?>