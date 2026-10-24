<?php
include("../config/connection.php");
	
	$id=$_REQUEST['f_id'];
	$d1="delete from feedback where f_id=".$_REQUEST['f_id'];
	//echo $d1;
	if(mysql_query($d1))
	{
		//echo "ok";
		header("location:../index.php?page=viewfeedback");
	}
	else
	{
		echo mysql_error($con);
	}
?>