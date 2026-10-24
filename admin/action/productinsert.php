<?php

	include("../config/connection.php");

	echo $c_id=$_REQUEST['c_id'];
	echo $p_name=$_REQUEST['p_name'];
	echo $image=$_FILES["uploadfile"]["name"];
	//$Image=$_REQUEST['uploadfile'];

	echo $p_price=$_REQUEST['p_price'];
	echo $p_quantity=$_REQUEST['p_quantity'];
	echo $p_description=$_REQUEST['p_description'];
	

	echo $pin="INSERT INTO product Values(NULL,'$c_id','$p_name','$image','$p_price','$p_quantity','$p_description')";
	
	
	if(mysql_query($pin))
	{
		
		echo"yes";
		header("location:../index.php?page=viewproduct");
	}
	else
	{
		echo mysql_error($con);
			//header("Location:index.php?page=viewproduct");
			//header("Location:../include/viewproduct");
		echo"no ";
	}
	
	$allowedExts=array("gif","jpeg","jpg","png","jfif","PNG");
	$temp=explode(".",$_FILES["uploadfile"]["name"]);
	$extension=end($temp);
	
	if((($_FILES["uploadfile"]["type"]=="image/gif")
	||($_FILES["uploadfile"]["type"]=="image/jpeg")
	||($_FILES["uploadfile"]["type"]=="image/jpg")
	||($_FILES["uploadfile"]["type"]=="image/pjpeg")
	||($_FILES["uploadfile"]["type"]=="image/jfif")
	||($_FILES["uploadfile"]["type"]=="image/png")
	||($_FILES["uploadfile"]["type"]=="image/PNG"))
	&&($_FILES["uploadfile"]["size"]< 2000000)
	&& in_array($extension,$allowedExts))
	{
		if($_FILES["uploadfile"]["error"]> 0)
		{
			echo"Return code:".$_FILES["uploadfile"]["error"]."<br>";
		}
		else
		{
			
			
			if(file_exists("uploadfile/".$_FILES["uploadfile"]["name"]))
			{
				echo $_FILES["uploadfile"]["name"]."already exists.";
			}
			else
			{
				move_uploaded_file($_FILES["uploadfile"]["tmp_name"],
				"../..//uploadfile/".$_FILES["uploadfile"]["name"]);
				//echo"stored in:"."productin.php/".$_FILES["file"]["name"]."<br>";
				echo"image upload";
			}
		}
	}
	else
	{
		echo"invalid file";
	}
?>