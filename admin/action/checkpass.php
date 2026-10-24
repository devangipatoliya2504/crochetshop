<?php
	include("../config/connection.php");
	session_start();
	echo $oldpass=$_REQUEST['oldpass'];
	echo $newpass=$_REQUEST['newpass'];
	echo $conpass=$_REQUEST['conpass'];
	if(isset($oldpass)&&($newpass)&&($conpass))
	{
		$admin_id=$_SESSION['admin_id'];
		$query="select * from admin";
		
		$res=mysql_query($query,$con);
		while($row=mysql_fetch_array($res))
		{
			$admin_password=$row['admin_password'];
			echo $admin_password;
			if($newpass==$conpass)
			{
				if($oldpass==$admin_password)
				{
					//echo"yes";
					$que1="update admin set admin_password='$newpass' where admin_id='$admin_id'";
					echo "<br>".$que1;
					$res=mysql_query($que1,$con);
					header("location:../index.php?page=home&msg=0");
				}
				else
				{
					
					//echo "incorrect password.";
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