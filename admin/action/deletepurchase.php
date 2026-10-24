<?php
include("../config/connection.php");

$order_id=$_REQUEST['order_id'];
$d1="delete from order_master where order_id='$order_id'";
if(mysql_query($d1))
{
	echo"yes";
	header("location:../index.php?page=viewpurchase");
}
else
{
	echo"no";
	die('not delete'.mysql_error());
}
?>