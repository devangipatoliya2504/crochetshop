<?php

include("../config/connection.php");

	 $r_id=$_REQUEST['r_id'];
	 $r_answer=$_REQUEST['r_answer'];
	
	if(isset($r_answer))
	{
		$res=mysql_query("select * from registration where r_id=".$r_id);
		if($row=mysql_fetch_array($res))
		{
			
			$an=$row[10];
			if($an==$r_answer)
			{	
				//echo "ok";
				header("location:../index.php?page=forgotpassword3&r_id=".$r_id."");
			}
			else
			{
				//echo "not";
				header("location:../index.php?page=forgotpassword1");
			}
			
		}
	}
?>	