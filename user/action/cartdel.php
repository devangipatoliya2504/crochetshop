<?php
include("../config/connection.php");

$p_id = $_REQUEST['p_id'];
session_start();
$s = "select * from product where p_id=$p_id ";
$result = mysql_query($s);

while($row = mysql_fetch_array($result))
{
    echo "stock" . $stock = $row['p_quantity'];
}

echo "<br>" . $check_cart_query = "SELECT * FROM cart_item WHERE id = " . $_SESSION['r_id'] . " AND p_id = $p_id";
$check_cart_result = mysql_query($check_cart_query);

if (mysql_num_rows($check_cart_result) > 0) 
{
    $cart_item = mysql_fetch_assoc($check_cart_result);
    
    echo "<br>qcart" . $existing_quantity = $cart_item['c_quantity'];
    echo "<br>" . $new_quantity = $existing_quantity + $stock;
    echo $up = "UPDATE product SET p_quantity=$new_quantity WHERE p_id = $p_id";
    if (mysql_query($up))
    {
        $d1 = "delete from cart_item where p_id=$p_id";
        if (mysql_query($d1))
        {
            header("location:../index.php?page=procart");
        }
    }
}
?>