<?php
include("../config/connection.php");
	
	echo $r_id=$_REQUEST['r_id'];
	echo $newpass=$_REQUEST['newpass'];
	echo $conpass=$_REQUEST['conpass'];
	
		echo $res=mysql_query("select * from registration where r_id=".$r_id);
		if($row=mysql_fetch_array($res))
		{
			$r_id=$row[0];
			$an=$row[0];
			echo $a="update registration SET r_password='$conpass' where r_id='$r_id'";
			if(mysql_query($a))
			{
				//echo"yes";
				header("location:../index.php?page=home");
			}
		}
	
	else
	{	
		//echo"no";
		header("location:./index.php?page=forgotpassword1");
	}
?>	