<?php

require_once "config/dbconfig.php";
$db=new operations();

if(isset($_GET['id']))
{
	global $db;
	$id=$_GET['id'];
	if ($db->Delete_Record($id)) 
	{
		$db->set_message('<div class="alert alert-danger">Your record is Deleted</div>');
		header('location:view.php');
	}
	else{
		$db->set_message('<div class="alert alert-danger">Your record is not Deleted</div>');
	}
}

?>