<?php 
	include("../config/connection.php");
	
	session_start();
		
		if(isset($_SESSION['r_id']))
		{
			echo $id1=$_REQUEST['p_id'];	
			echo$total=$_REQUEST['total'];		
			echo$quantity=$_REQUEST['c_quantity'];	
			
			
			echo$s="select * from registration where r_id=".$_SESSION['r_id'];
			$result=mysql_query($s);
			while($row=mysql_fetch_array($result))
			{
			$r_id=$_SESSION['r_id'];
			}
			echo"<br>";
			
				$s="select * from product where p_id=$id1 ";
				$result=mysql_query($s);
				
				while($row=mysql_fetch_array($result))
				{
					$id1=$row['p_id'];
					echo "quuuu".$stock=$row['p_quantity'];
					echo"ttttt".$total;	
					$detail=$row['p_description'];
					 // Check if product is already in the cart
					
					echo"<br>".$check_cart_query = "SELECT * FROM cart_item WHERE id = ".$_SESSION['r_id']." AND p_id = $id1";
					$check_cart_result = mysql_query($check_cart_query);

					if (mysql_num_rows($check_cart_result) > 0) {
						// Already in cart ? Update quantity and total
						$cart_item = mysql_fetch_assoc($check_cart_result);
						$existing_quantity = $cart_item['c_quantity'];
						echo"<br>".$new_quantity = $existing_quantity + $quantity;
						$new_total = $new_quantity * $price;

						echo"<br>".$update_cart_query = "UPDATE cart_item 
											  SET c_quantity = $new_quantity  WHERE id = ".$_SESSION['r_id']." AND p_id = $id1";
						if(mysql_query($update_cart_query))
						{
							$up="UPDATE product SET p_quantity=$stock-$quantity WHERE p_id = $id1";
							if(mysql_query($up))
							{
								header("location:../index.php?page=procart&p_id=$id1&cart_total=$total");
							}
						}
					}
					else
					{
						echo $insert_query = "INSERT INTO cart_item  VALUES (NULL,'$r_id', '$id1','$quantity','$detail','$total')";
					
						if(mysql_query($insert_query))
						{
							echo "<br>Item added to cart! isnserted succesfully...........";
							$up="UPDATE product SET p_quantity=$stock-$quantity WHERE p_id = $id1";
							if(mysql_query($up))
							{
								header("location:../index.php?page=procart&p_id=$id1&cart_total=$total");
							}
						}else
						{
						mysql_error($con);
						}
					}
				}
			
		}
	
	else
	{
				header("location:../index.php?page=login");
	}
		
	 ?>