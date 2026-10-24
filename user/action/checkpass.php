<?php
	include("../config/connection.php");
	session_start();
	echo $oldpass=$_REQUEST['oldpass'];
	echo $newpass=$_REQUEST['newpass'];
	echo $conpass=$_REQUEST['conpass'];
	if(isset($oldpass)&&($newpass)&&($conpass))
	{
		$r_id=$_SESSION['r_id'];
		$query="select * from registration";
		
		$res=mysql_query($query,$con);
		while($row=mysql_fetch_array($res))
		{
			$r_password=$row['r_password'];
			echo $r_password;
			if($newpass==$conpass)
			{
				if($oldpass==$r_password)
				{
					//echo"yes";
					$que1="update registration set r_password='$newpass' where r_id='$r_id'";
					echo "<br>".$que1;
					$res=mysql_query($que1,$con);
					header("location:../index.php?page=home&msg=0");
				}
				else
				{
					
					
					header("location:../index.php?page=changepassword&msg=1");
				}
			}
			else
			{
				
				header("location:../index.php?page=Changepassword&msg=2");
			}
		}
	}

?>