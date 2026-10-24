<?php
	include("config/connection.php");
	
	session_start();
	
	echo $r_id=$_REQUEST['r_id'];
	echo $f_comment=$_REQUEST['f_comment'];
	
	echo $query="insert into feedback(r_id,f_comment)values('$r_id','$f_comment')";
	
	if(mysql_query($query,$con))
	{
		header("location:../index.php?page=feedback&msg=10");
		header("location:../index.php?page=home");
		echo"one record inserted";
	}
	else
	{
		echo"could not inserted".mysql_error();
	}
	mysql_close($con);
?>