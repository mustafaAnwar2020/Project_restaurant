<?php 

function checkEmpty($value)
{
	if(empty($value))
	{
		return false;
	}
	return true;

}



function checkLess($value,$min)
{
	if(trim(strlen($value)) <= $min)
	{
		return false;
	}
	return true;
}

function validEmail($value){
	if(!filter_var($value,FILTER_VALIDATE_EMAIL))
	{
		return false;
	}
	return true;

}
?>