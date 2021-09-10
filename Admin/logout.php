<?php require '../config/config.php';?>
<?php require '../config/validate.php';?>
<?php
if(isset($_SESSION['username']))
{
    session_destroy();
    header("location:".BURL);
}
else
{
    header("location:".BURLA."index.php");
}

?>