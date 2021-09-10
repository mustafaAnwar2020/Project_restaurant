<?php require '../config/config.php';?>
<?php require '../config/validate.php';?>
<?php 
    if(isset($_SESSION['username']))
    {
        header("location:".BURLA."index.php");
    }
?>
<html>
    <head>
        <title>Login - Food Order System</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
        
        <div class="login">
            <h1 class="text-center">Login</h1>
            <br><br>

            <br><br>

            <?php
                if(isset($_POST['submit'])){
                    $username = $_POST['username'];
                    $password = md5($_POST['password']);
                    if(checkEmpty($username) && checkEmpty($password))
                    {
                        $row = getRow('admin','username',$username);
                        $stmt = $conn->prepare("SELECT * FROM `admin` WHERE `username`=? AND `password`=?");
                        $stmt->bind_param("ss",$username,$password);
                        $stmt->execute();
                        $result= $stmt->get_result();
                        if(mysqli_num_rows($result)==1)
                        {
                                $_SESSION['id'] = $row['id'];
                                $_SESSION['username'] = $row['username'];
                                header("location:".BURLA."index.php");

                        }
                        else
                        {
                            echo "<div class='success'>Invalid Username or Password!</div>";
                        }

                    }
                    else
                    {
                        echo "<div class='success'>Empty username or password!</div>";
                    }

                }
            ?>

            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" class="text-center">
            Username: <br>
            <input type="text" name="username" placeholder="Enter Username"><br><br>

            Password: <br>
            <input type="password" name="password" placeholder="Enter Password"><br><br>

            <input type="submit" name="submit" value="Login" class="btn-primary">
            <br><br>
            </form>


            <p class="text-center">Created By - <a href="#">Mustafa Anwar</a></p>
        </div>

    </body>
</html>

