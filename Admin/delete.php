<?php 
require '../config/db.php';


$table = mysqli_real_escape_string($conn,$_GET['table']);
$item_id = mysqli_real_escape_string($conn,$_GET['item_id']);
$field = mysqli_real_escape_string($conn,$_GET['field']);
$stmt = $conn->prepare("DELETE FROM $table WHERE $field = ?");
$stmt->bind_param("s",$item_id);
$result = $stmt->execute();
if($result)
{
    $data['message'] = "success";
}
else
{
    $data['message'] = "error";
}
echo json_encode($data);

?>