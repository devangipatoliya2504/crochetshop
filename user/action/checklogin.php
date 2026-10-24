<?php
	include("../config/connection.php");
	session_start();
	
	$r_username=$_REQUEST['r_username'];
	
	$r_password=$_REQUEST['r_password'];
	
	echo $query="select * from registration where r_username='".$r_username."'AND r_password='".$r_password."'";
	$result=mysql_query($query);
	if($row=mysql_fetch_array($result))
	{
		echo $_SESSION['r_username']=$row['r_username'];
		echo $_SESSION['r_password']=$row['r_password'];
		echo $_SESSION['r_id']=$row['r_id'];
		header("location:../index.php?page=home&msg=0");
	}
	else
	{
		header("location:../index.php?page=login&msg=1");
	}
?>