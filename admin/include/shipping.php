<?php
	include("config/connection.php");
	$od = isset($_REQUEST['order_id']) ? intval($_REQUEST['order_id']) : 0;
	if($od > 0) {
		$d = "UPDATE order_master SET status = '1' WHERE order_id = " . $od;
		mysql_query($d);
	}
	echo "<script>window.location.href='index.php?page=viewpurchase';</script>";
?>
