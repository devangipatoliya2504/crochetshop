<?php
	include("../config/connection.php");
	session_start();
	
	$r_id=$_SESSION['r_id'];	
	$r_username=$_SESSION['r_username'];
	$f_comment=$_REQUEST['f_comment'];


$i1="INSERT INTO feedback values(null,'$r_id','$r_username','$f_comment')";

if(mysql_query($i1))
{
	
	header("location:../index.php?page=home&msg=0");
}
else
{
	header("location:../index.php?page=feedback&msg=1");
}

?>