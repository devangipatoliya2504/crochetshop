<?php
include("../config/connection.php");
	$query="delete from product where p_id=".$_REQUEST['p_id'];
	
	if(mysql_query($query,$con))
	{
		header("location:../index.php?page=viewproduct");
	}
	else
	{
		echo "product is not delete".mysql_error();
	}
	mysql_close($con);	
?>