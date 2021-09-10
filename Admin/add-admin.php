<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <br><br>

        <?php
    if(isset($_POST['submit'])){
        $fullName = $_POST['full_name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        if(checkEmpty($fullName) AND checkEmpty($username) AND checkEmpty($password))
        {
            $password = md5($password);
            $stmt = $conn->prepare("INSERT INTO admin (`fullName`,`username`,`password`) VALUES (?,?,?)");
            $stmt->bind_param("sss",$fullName,$username,$password);
            $result = $stmt->execute();
            if($result)
            {
                $_SESSION['admin']="admin";
                header("location:".BURLA."manage-admin.php");
            }

        }
        else{
            $error_message= "Fill all fields";
        }
        require_once BL.'/error.php';

    }
    else{
        
    }
?>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter Your Name">
                    </td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" placeholder="Your Username">
                    </td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="password" name="password" placeholder="Your Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>


    </div>
</div>

<?php include('partials/footer.php'); ?>

