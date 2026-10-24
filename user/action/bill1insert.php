<html>
<?php 
		include("../config/connection.php");
		
	session_start();
	if(isset($_SESSION['r_id']))
	{
	echo$r_id=$_SESSION['r_id'];
	echo "<br>".$fnm=$_REQUEST['fnm'];
	echo "<br>".$sadd=$_REQUEST['add'];
	echo "<br>".$scity=$_REQUEST['city'];
	echo "<Br>".$seml=$_REQUEST['email'];
	echo "<Br>".$sphone=$_REQUEST['cno'];
	echo "<br>tt:".$total=$_REQUEST['total'];
	echo "<br>:".$status=$_REQUEST['status'];
	
	echo "<br>".$pid1=$_REQUEST['p_id'];
	
			echo $pro="SELECT  c.*,p.*
			FROM cart_item c
			JOIN product p ON p.p_id=c.p_id
			WHERE p.p_id = $pid1";
			
			$result=mysql_query($pro);
			
			if($row=mysql_fetch_array($result))	
			{
				$order_price=$row['p_price'];
				
				$detail=$row['p_description'];
								
				$order="select * from registration where r_id=".$_SESSION['r_id'];
				$result=mysql_query($order);
				if($row=mysql_fetch_array($result))	
				{
						$current_date = date('Y-m-d H:i:s');	
						echo"<br>". $order_master = "INSERT INTO order_master  VALUES(NULL,'$r_id','$fnm','$detail','$total','$seml','$sadd','$scity','$sphone','$current_date','$status')";
						mysql_query($order_master);
						
				}		
			}
	echo $que3="select max(order_id) from order_master";
	echo $res3=mysql_query($que3);
	while($id_row=mysql_fetch_array($res3))
	{
    	echo $id=$id_row[0];
	}	
		
	echo $que="select * from cart_item where id=".$_SESSION['r_id'];
	echo $res=mysql_query($que);
	while($row=mysql_fetch_array($res))
	{
	  echo"<br>";
		echo "aaa";
		$p=$row['c_quantity'] ;
		echo "p=".$p;
		//$pro=$_SESSION['p_quantity'];
		//echo "pro=".$pro;
	 echo $que1="update product set p_quantity=p_quantity-$p where p_id=".$row['p_id'];
		$res1=mysql_query($que1);
		echo"<br>";
		 echo $que4="insert into order_detail(order_id,p_id,quantity)values('".$id."','".$row['p_id']."','".$row['c_quantity']."')";
		 echo"<br>";
		echo $res4=mysql_query($que4);
		// echo "qqqqqqqqq";
		
		if($res4)
		{
		    //echo "qqqqqqqqq";
			  echo $query5="delete from cart_item where id=".$_SESSION['r_id'];
			 $result5=mysql_query($query5);
			 if($result5)
			{
		// echo"Yes";
			header("location:../index.php?page=success");
			 }
			 else
			 {
				// echo"No";
				 echo mysql_error();
			 }
		}	
	}			
		}		
				
	 ?>



