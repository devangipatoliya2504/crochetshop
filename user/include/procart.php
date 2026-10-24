<?php
	include("config/connection.php");
	
	if(!isset($_SESSION['r_id'])) {
		echo "
		<div style='text-align:center; padding:50px 20px;'>
			<i class='fa-solid fa-user-lock' style='font-size:3rem; color:var(--primary); margin-bottom:14px;'></i>
			<h3 style='font-family:var(--font-heading);'>Please Log In</h3>
			<p style='color:var(--text-secondary); margin-bottom:20px;'>You need to log in to view and manage your shopping bag.</p>
			<a href='index.php?page=login' class='btn'><i class='fa-solid fa-arrow-right-to-bracket'></i> Sign In</a>
		</div>";
		return;
	}

	$userId = intval($_SESSION['r_id']);
	$productQuery = "SELECT c.cart_id, p.p_id, p.p_image, p.p_name, p.p_price, c.c_quantity, 
					 (p.p_price * c.c_quantity) AS total
					 FROM cart_item c
					 JOIN product p ON c.p_id = p.p_id
					 WHERE c.id = " . $userId;
	$r = mysql_query($productQuery);
?>

<div class="cart-container" style="max-width:960px; margin:0 auto;">
	<div class="section-header" style="text-align:left; margin-bottom:24px;">
		<span class="section-subtitle">Review &amp; Checkout</span>
		<h2 class="section-title"><i class="fa-solid fa-bag-shopping" style="color:var(--primary);"></i> Your Shopping Bag</h2>
	</div>

	<?php
		if($r && mysql_num_rows($r) > 0) {
			$total = 0;
			$lastPid = 0;
			$i = 1;
	?>

	<div style="background:#FFFFFF; border-radius:var(--radius-lg); border:1px solid var(--border-light); overflow:hidden; box-shadow:var(--shadow-card); margin-bottom:28px;">
		<table style="margin:0; box-shadow:none; border-radius:0;">
			<thead>
				<tr>
					<th>#</th>
					<th>Item</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Total</th>
					<th style="text-align:center;">Remove</th>
				</tr>
			</thead>
			<tbody>
				<?php
					while($row = mysql_fetch_array($r)) {
						$pid = $row['p_id'];
						$lastPid = $pid;
						$itemTotal = $row['p_price'] * $row['c_quantity'];
						$total += $itemTotal;
				?>
				<tr>
					<td style="color:var(--text-muted); font-weight:600;"><?php echo $i; ?></td>
					<td>
						<div style="display:flex; align-items:center; gap:14px;">
							<img src="../uploadfile/<?php echo $row['p_image']; ?>" alt="<?php echo htmlspecialchars($row['p_name']); ?>" style="width:54px; height:54px; border-radius:var(--radius-sm); object-fit:cover; border:1px solid var(--border-light);" onerror="this.onerror=null; this.src='upload/28.png';">
							<span style="font-weight:700; color:var(--text-primary);"><?php echo htmlspecialchars($row['p_name']); ?></span>
						</div>
					</td>
					<td>₹<?php echo $row['p_price']; ?></td>
					<td>
						<span style="background:var(--bg-subtle); padding:4px 12px; border-radius:var(--radius-full); font-weight:700;">
							<?php echo $row['c_quantity']; ?>
						</span>
					</td>
					<td style="font-weight:800; color:var(--primary);">₹<?php echo $itemTotal; ?></td>
					<td style="text-align:center;">
						<a href="action/cartdel.php?p_id=<?php echo $pid; ?>" onclick="return f2();" class="btn btn-secondary" style="padding:6px 12px; font-size:0.85rem; color:#D32F2F !important;" title="Remove Item">
							<i class="fa-solid fa-trash-can"></i>
						</a>
					</td>
				</tr>
				<?php
						$i++;
					}
				?>
			</tbody>
		</table>
	</div>

	<!-- Cart Summary Footer -->
	<div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:20px; background:var(--bg-subtle); padding:24px 28px; border-radius:var(--radius-lg); border:1px solid var(--border-light);">
		<div>
			<span style="font-size:0.9rem; color:var(--text-secondary); display:block;">Grand Total:</span>
			<span style="font-family:var(--font-heading); font-size:2rem; font-weight:800; color:var(--primary);">₹<?php echo $total; ?></span>
		</div>
		<div style="display:flex; gap:14px; flex-wrap:wrap;">
			<a href="index.php?page=gallary" class="btn btn-secondary">
				<i class="fa-solid fa-store"></i> Continue Shopping
			</a>
			<a href="index.php?page=billform&p_id=<?php echo $lastPid; ?>&total=<?php echo $total; ?>" class="btn">
				<i class="fa-solid fa-credit-card"></i> Proceed to Purchase
			</a>
		</div>
	</div>

	<?php
		} else {
	?>
		<div style="text-align:center; padding:70px 20px; background:#FFF; border-radius:var(--radius-xl); border:1px solid var(--border-light); box-shadow:var(--shadow-subtle);">
			<div style="width:80px; height:80px; border-radius:50%; background:var(--primary-light); color:var(--primary); display:flex; align-items:center; justify-content:center; font-size:2rem; margin:0 auto 16px;">
				<i class="fa-solid fa-bag-shopping"></i>
			</div>
			<h3 style="font-family:var(--font-heading); font-size:1.6rem; color:var(--text-primary);">Your Cart is Empty</h3>
			<p style="color:var(--text-secondary); max-width:440px; margin:8px auto 24px;">Looks like you haven't added any handcrafted crochet wonders yet. Discover our latest creations!</p>
			<a href="index.php?page=gallary" class="btn">
				<i class="fa-solid fa-compass"></i> Explore Collection
			</a>
		</div>
	<?php
		}
	?>
</div>
