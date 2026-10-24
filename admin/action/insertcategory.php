<?php
	include("../config/connection.php");
	if(isset($_REQUEST['c_id']))
	{
		
		$query = "UPDATE category SET c_name='" . $_REQUEST['c_name'] . "' WHERE c_id=" . $_REQUEST['c_id'];
echo $query; 

		$resault=mysql_query($query,$con);
		
		if($resault)
		{
			echo "record update";
			header("location:../Index.php?page=viewcategory");
		}
		else
		{
			echo "record not update".mysql_error();
		}
	}
	else
	{
		$c_name=$_REQUEST['c_name'];
		$query="insert into category(c_name)values('$c_name')";
		$resault=mysql_query($query,$con);
		
		if($resault)
		{
			echo "record inserted";
			header("location:../Index.php?page=viewcategory");
		}
		else
		{
			echo mysql_error();
		}
	}
?>