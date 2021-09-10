<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br><br>

        <?php 
            if(isset($_GET['id']))
            {
                $id=$_GET['id'];
            }
        ?>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        
            <table class="tbl-30">
                <tr>
                    <td>Current Password: </td>
                    <td>
                        <input type="password" name="current_password" placeholder="Current Password">
                    </td>
                </tr>

                <tr>
                    <td>New Password:</td>
                    <td>
                        <input type="password" name="new_password" placeholder="New Password">
                    </td>
                </tr>

                <tr>
                    <td>Confirm Password: </td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Confirm Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Change Password" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>

    </div>
</div>

<?php
if(isset($_POST['submit']))
{
    $id = $_POST['id'];
    $current_password = md5($_POST['current_password']);
    $new_password = md5($_POST['new_password']);
    $confirm_password = md5($_POST['confirm_password']);
    if($new_password == $confirm_password){
            $stmt = $conn->prepare("SELECT * FROM `admin` WHERE `id`=? AND `password`=?");
            $stmt->bind_param("ss",$id,$current_password);
            $stmt->execute();
            $result= $stmt->get_result();
            if(mysqli_num_rows($result)==1)
            {
                $stmt1 = $conn->prepare("UPDATE `admin` SET `password` = ? WHERE `id` = ? ");
                $stmt1->bind_param("ss",$new_password,$id);
                $result1 = $stmt1->execute();
                if($result1)
                {
                    echo "<div class='error'>Password changed successfuly </div>";
                }
                else
                {
                    echo "<div class='error'>Failed to Change Password. </div>";
                }
                
            }

    }
    else
    {
        echo "<div class='error'>Passwords Did not Match. </div>";
    }
    
}
?>
<?php include('partials/footer.php'); ?>