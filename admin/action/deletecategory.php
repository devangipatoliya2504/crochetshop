<?php
	include("../config/connection.php");
	
	$c_id=$_REQUEST['c_id'];
	$que1="delete from category where c_id=".$_REQUEST['c_id'];
	$res=mysql_query($que1);
	if($res)
	{
		header("location:../Index.php?page=Viewcategory");
		echo "delete";
	}
	else
	{  
		echo "category is not delete";
	}
	mysql_error();
	
	mysql_close($con);
		
?>