<?php
include("../config/connection.php");

	
	 echo $rnm=$_REQUEST['r_username'];
	echo $q=mysql_query("select * from registration where r_username='".$rnm."'");
		if($row=mysql_fetch_array($q))
		{
			$r_id=$row[0];
			if($rnm==$row['r_username'])
			{
			echo "ok";
				header("location:../index.php?page=forgotpassword2&r_id=$r_id");
			}
		
			else
			{
				echo "not";
				header("location:../index.php?page=forgotpassword1");
			
			}
		}
		else
		{
			echo "not";
			header("location:../index.php?page=forgotpassword1");
			echo mysql_error();
		}
?>