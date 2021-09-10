<?php include('partials/menu.php'); ?>


        <!-- Main Content Section Starts -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Admin</h1>

                <br />
                <?php
                    if(isset($_SESSION['admin']))
                    {
                        echo $_SESSION['admin'];
                        unset($_SESSION['admin']);
                    }
                ?>

                <br><br><br>

                <!-- Button to Add Admin -->
                <a href="add-admin.php" class="btn-primary">Add Admin</a>

                <br /><br /><br />

                <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Actions</th>
                    </tr>

                <?php 
                    $data=getRows("admin");$x=1;
                    foreach($data as $rows){?>
                        

                    <tr>
                        <td><?php echo $x; ?>. </td>
                        <td><?php echo htmlentities($rows['fullName']); ?></td>
                        <td><?php echo htmlentities($rows['username']); ?></td>
                        <td>
                                <a href="<?php echo BURL; ?>Admin/update-password.php?id=<?php echo $rows['id']; ?>" class="btn-primary">Change Password</a>
                                <a href="<?php echo BURL; ?>Admin/edit.php?id=<?php echo $rows['id']; ?>" class="btn-secondary">Update Admin</a>
                                <a href="#" class="btn btn-danger delete" data-field="id" data-id="<?php echo $rows['id'];?>" data-table="admin" >Delete Admin</a>
                        </td>
                    </tr>      
                    <?php $x++;}?>          
                </table>
                
            </div>
        </div>
        <!-- Main Content Setion Ends -->

<?php include('partials/footer.php'); ?>