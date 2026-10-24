<?php
	include("config/connection.php");
	$order_id = isset($_REQUEST['order_id']) ? intval($_REQUEST['order_id']) : 0;
?>

<div style="max-width:850px; margin:0 auto;">
	<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
		<div>
			<span style="font-size:0.85rem; font-weight:700; color:var(--primary); text-transform:uppercase;">Order Details</span>
			<h2 style="font-family:var(--font-heading); font-size:1.8rem; color:var(--text-primary); margin:0;">
				Purchase Order #<?php echo $order_id; ?>
			</h2>
		</div>
		<a href="index.php?page=viewpurchase" class="btn btn-secondary">
			<i class="fa-solid fa-arrow-left"></i> Back to Orders
		</a>
	</div>

	<?php
		if($order_id > 0) {
			$ordermaster = "SELECT * FROM order_master WHERE order_id = " . $order_id;
			$res = mysql_query($ordermaster);
			$orderRow = mysql_fetch_array($res);

			$order_detail = "SELECT * FROM order_detail WHERE order_id = " . $order_id;
			$res1 = mysql_query($order_detail);
	?>

	<table>
		<thead>
			<tr>
				<th>#</th>
				<th>Product</th>
				<th>Image</th>
				<th>Unit Price</th>
				<th>Quantity</th>
				<th>Item Total</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$total1 = 0;
				$i = 1;
				if($res1) {
					while($row1 = mysql_fetch_array($res1)) {
						$pid = $row1['p_id'];
						$pro = "SELECT * FROM product WHERE p_id = " . $pid;
						$res2 = mysql_query($pro);
						while($row2 = mysql_fetch_array($res2)) {
							$itemTotal = $row1['quantity'] * $row2['p_price'];
							$total1 += $itemTotal;
			?>
			<tr>
				<td style="color:var(--text-muted); font-weight:600;"><?php echo $i; ?></td>
				<td style="font-weight:700; color:var(--text-primary);"><?php echo htmlspecialchars($row2['p_name']); ?></td>
				<td>
					<img src="../uploadfile/<?php echo $row2['p_image']; ?>" alt="Product" style="width:50px; height:50px; border-radius:var(--radius-sm); object-fit:cover; border:1px solid var(--border-light);" onerror="this.onerror=null; this.src='../user/upload/28.png';">
				</td>
				<td>₹<?php echo $row2['p_price']; ?></td>
				<td><?php echo $row1['quantity']; ?></td>
				<td style="font-weight:700; color:var(--primary);">₹<?php echo $itemTotal; ?></td>
			</tr>
			<?php
							$i++;
						}
					}
				}
			?>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="5" style="text-align:right; font-weight:700; font-size:1.1rem;">Grand Total:</td>
				<td style="font-family:var(--font-heading); font-size:1.4rem; font-weight:800; color:var(--primary);">₹<?php echo $total1; ?></td>
			</tr>
		</tfoot>
	</table>

	<?php
		} else {
			echo "<div style='text-align:center; padding:30px;'>Order ID not found.</div>";
		}
	?>
</div>
