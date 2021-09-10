<?php 
 include('partials/menu.php'); 


if(isset($_POST['submit']))
{
    $name = $_POST['full_name'];
    $username = $_POST['username'];
    $admin_id = $_POST['id'];
    if(checkLess($name,3) &&checkEmpty($name))
    {
        $row = getRow('admin','id',$admin_id);
        if($row)
        {
            //$sql = "UPDATE `admin` SET `fullName` = '$name' , `username` = '$username' WHERE `id` = '$admin_id'";
            $stmt = $conn->prepare("UPDATE `admin` SET `fullName` = ? , `username` = ? WHERE `id` = ?");
            $stmt->bind_param("sss",$name,$username,$admin_id);
        }
        else
        {
            echo "Enter correct data!";
        }
        $stmt->execute();
        $result=$stmt->execute();
        header("location:".BURLA."manage-admin.php");
        
    }
    else
    {
        $error_message = "Enter valid name !";
    }
}
?>
