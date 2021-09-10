<?php 
session_start();
$server= "localhost";
$username= "root";
$password= "";
$dbname= "food_order";


$conn = mysqli_connect($server,$username,$password,$dbname);

if (!$conn)
{
	die("Error :".mysqli_connect_error());
}
function db_insert($sql)
{
	global $conn;
	$result= mysqli_query($conn,$sql);

	if($result)
	{
		return "Success";
	}
	return false;
}


function getRow($table,$field,$value){
	global $conn;
	//$sql = "SELECT * FROM `$table` WHERE `$field` = '$value'";
	$stmt = $conn->prepare("SELECT * FROM `$table` WHERE `$field` = ?");
	$stmt->bind_param('s',$value);
	$stmt->execute();

	$result= $stmt->get_result();

	if($result)
	{
		$rows = [];
		if(mysqli_num_rows($result) > 0)
		{
			$rows[] = $result->fetch_assoc();
			return $rows[0];
		}

	}
	return false;

}


function getRows($table)
{
	global $conn;
	$sql = "SELECT * FROM `$table`";
	$result= mysqli_query($conn,$sql);

	if($result)
	{
		$rows = [];
		if(mysqli_num_rows($result) > 0)
		{
			while($row = mysqli_fetch_assoc($result))
			{
				$rows[] = $row; 
			}
		}

	}
	return $rows;
}
?>