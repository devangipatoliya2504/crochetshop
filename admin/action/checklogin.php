<?php
	include("../config/connection.php");
	session_start();
	
	$admin_username=$_REQUEST['admin_username'];
	
	$admin_password=$_REQUEST['admin_password'];
	
	echo $query="select * from admin where admin_username='".$admin_username."'AND admin_password='".$admin_password."'";
	$result=mysql_query($query);
	if($row=mysql_fetch_array($result))
	{
		echo $_SESSION['admin_username']=$row['admin_username'];
		echo $_SESSION['admin_password']=$row['admin_password'];
		echo $_SESSION['admin_id']=$row['admin_id'];
		header("location:../index.php?page=home&msg=0");
	}
	else
	{
		header("location:../index.php?page=login&msg=1");
	}
?>