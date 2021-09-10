<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>

        <br><br>
        <?php 
        if(isset($_GET['id']) && is_numeric($_GET['id'])){
            $row = getRow('admin','id',$_GET['id']);
            if($row){
                $admin_id = $row['id'];
            }
            else
            {
                header("location:".BURLA."manage-admin.php");
            }
        }
        else
        {
            header("location:".BURLA."manage-admin.php");
        }
        ?>
        


        <form action="<?php echo BURLA.'/update.php' ?>" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td>
                        <input type="text" name="full_name" value="<?php echo htmlentities($row['fullName'])?>">
                    </td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" value="<?php echo htmlentities($row['username'])?>">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $admin_id; ?>">
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>
    </div>
</div>




<?php include('partials/footer.php'); ?>