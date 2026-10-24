<?php

include("../config/connection.php");
	
	echo "<br>cid== ".$c_id=$_REQUEST['c_id'];
	echo "<br>pid== ".$p_id=$_REQUEST['hidid'];
	echo"<br>nm== ".$p_name=$_REQUEST['p_name'];
	echo"<br>img== ".$filename = $_FILES["uploadfile"]["name"];
   	
	echo "<br>rs== ".$p_price=$_REQUEST['p_price'];
	echo "<br>q== ".$p_quantity=$_REQUEST['p_quantity'];
	echo "<br>d== ".$p_description=$_REQUEST['p_description'];
	
	echo"<br>".$q="UPDATE product SET c_id='$c_id',
									p_name='$p_name',
									p_image='$filename',
									p_price='$p_price',
									p_quantity='$p_quantity',
									p_description='$p_description' 
									WHERE p_id='$p_id'";

	if(mysql_query($q))
	{
		echo"updated<br>";
		header("Location:../index.php?page=viewproduct");
	}
	else
	{
		echo mysql_error($con);
	}
	

	$allowedExts=array("gif","jpeg","png","JFIF","jfif","PNG","jpg","avif");
	$temp=explode(".",$_FILES["uploadfile"]["name"]);
	$extension=end($temp);
	
	if((($_FILES["uploadfile"]["type"]=="image/gif")
	||($_FILES["uploadfile"]["type"]=="image/jpeg")
	||($_FILES["uploadfile"]["type"]=="image/jpg")
	||($_FILES["uploadfile"]["type"]=="image/JFIF")	
	||($_FILES["uploadfile"]["type"]=="image/jfif")
	||($_FILES["uploadfile"]["type"]=="image/png")
	||($_FILES["uploadfile"]["type"]=="image/PNG")
	||($_FILES["uploadfile"]["type"]=="image/JPG")
	||($_FILES["uploadfile"]["type"]=="image/avif"))
	&&($_FILES["uploadfile"]["size"]< 90000000)
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


