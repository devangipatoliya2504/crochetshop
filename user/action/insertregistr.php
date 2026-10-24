<?php

include("../config/connection.php");


$firstname=$_REQUEST['r_firstname'];
$lastname=$_REQUEST['r_lastname'];
$address=$_REQUEST['r_address'];
$city=$_REQUEST['r_city'];
$email=$_REQUEST['r_email'];
$contect=$_REQUEST['r_contect'];
$username=$_REQUEST['r_username'];
$password=$_REQUEST['r_password'];
$securityque=$_REQUEST['r_securityque'];
$securityanswer=$_REQUEST['r_answer'];

$i1="INSERT INTO registration values(null,'$firstname','$lastname','$address',
'$city','$email','$contect','$username','$password','$securityque','$securityanswer')";

if(mysql_query($i1))
{
	//echo "insert:";
	header("location:../index.php?page=login");
	//header("location:view.php");
}
else
{
	echo mysql_error();
}

?>