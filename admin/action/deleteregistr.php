<?php
 include("../config/connection.php");

$r_id=$_REQUEST['r_id'];
$d1="delete from registration where r_id='$r_id'";
if(mysql_query($d1))
{
	header("location:../index.php?page=viewregistration");
}
else
{
	die('not delete'.mysql_error());
}
?>