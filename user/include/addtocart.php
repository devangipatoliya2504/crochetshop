<?php
	include("config/connection.php");
	
	$quantity = 1;
	$id1 = isset($_REQUEST['p_id']) ? intval($_REQUEST['p_id']) : 0;
	
	// Handle form submission for quantity adjustments
	if (isset($_POST['quantity'])) {
		$quantity = (int)$_POST['quantity'];
		if (isset($_POST['increase'])) {
			$quantity++;
		}
		if (isset($_POST['decrease']) && $quantity > 1) {
			$quantity--;
		}
	}
	
	$product = "SELECT * FROM product WHERE p_id = $id1";
	$result = mysql_query($product);
	
	if($result && $row = mysql_fetch_array($result)) {
		$name = htmlspecialchars($row['p_name']);
		$stock = intval($row['p_quantity']);
		$price = floatval($row['p_price']);
		$total_price = $quantity * $price;
		$img = $row['p_image'];
?>

<div class="auth-wrapper" style="max-width: 650px;">
	<div class="auth-header">
		<div class="auth-icon-badge">
			<i class="fa-solid fa-cart-shopping"></i>
		</div>
		<h2 class="auth-title">Add to Your Cart</h2>
		<p class="auth-subtitle">Select the quantity of this handcrafted treasure</p>
	</div>

	<div style="display:flex; gap:26px; align-items:center; flex-wrap:wrap; margin-bottom:24px; padding-bottom:24px; border-bottom:1px dashed var(--border-stitch);">
		<div style="width:130px; height:130px; border-radius:var(--radius-md); overflow:hidden; border:1px solid var(--border-light); flex-shrink:0;">
			<img src="../uploadfile/<?php echo $img; ?>" alt="<?php echo $name; ?>" style="width:100%; height:100%; object-fit:cover;" onerror="this.onerror=null; this.src='upload/28.png';">
		</div>
		<div style="flex-grow:1;">
			<h3 style="font-family:var(--font-heading); font-size:1.4rem; color:var(--text-primary); margin-bottom:4px;"><?php echo $name; ?></h3>
			<div style="font-size:1.15rem; font-weight:700; color:var(--primary); margin-bottom:6px;">₹<?php echo $price; ?> <span style="font-size:0.8rem; font-weight:normal; color:var(--text-secondary);">/ piece</span></div>
			<span class="detail-stock-pill" style="display:inline-block;">
				<i class="fa-solid fa-boxes-stacked"></i> <?php echo $stock; ?> in stock
			</span>
		</div>
	</div>

	<!-- Quantity Selector Form -->
	<form method="post" action="index.php?page=addtocart&p_id=<?php echo $id1; ?>" style="margin-bottom:24px;">
		<div style="display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:16px;">
			<span style="font-weight:700; font-size:1rem; color:var(--text-primary);">Select Quantity:</span>
			<div style="display:inline-flex; align-items:center; gap:8px;">
				<button type="submit" name="decrease" class="btn btn-secondary" style="width:42px; height:42px; padding:0; font-size:1.2rem; border-radius:50%;">-</button>
				<input type="text" name="quantity" id="quantity" value="<?php echo $quantity; ?>" readonly style="width:60px; text-align:center; font-weight:700; font-size:1.1rem; padding:8px 4px;">
				<button type="submit" name="increase" class="btn btn-secondary" style="width:42px; height:42px; padding:0; font-size:1.2rem; border-radius:50%;">+</button>
			</div>
		</div>
	</form>

	<!-- Total Calculation Card -->
	<div style="background:var(--bg-subtle); padding:16px 20px; border-radius:var(--radius-md); display:flex; justify-content:space-between; align-items:center; margin-bottom:24px;">
		<span style="font-weight:700; font-size:1.05rem; color:var(--text-primary);">Total Amount:</span>
		<span style="font-family:var(--font-heading); font-size:1.6rem; font-weight:800; color:var(--primary);">₹<?php echo $total_price; ?></span>
	</div>

	<?php if ($quantity <= $stock && $stock > 0): ?>
		<div style="display:flex; gap:14px;">
			<a href="action/addtocartinsert.php?p_id=<?php echo $id1; ?>&c_quantity=<?php echo $quantity; ?>&total=<?php echo $total_price; ?>" class="btn" style="flex:1;">
				<i class="fa-solid fa-bag-shopping"></i> Add to Cart
			</a>
			<a href="index.php?page=gallary" class="btn btn-secondary">
				<i class="fa-solid fa-arrow-left"></i> Back
			</a>
		</div>
	<?php else: ?>
		<div style="background:#FFF0F0; color:#D32F2F; padding:12px; border-radius:var(--radius-md); text-align:center; font-weight:700; margin-bottom:16px;">
			<i class="fa-solid fa-circle-exclamation"></i> Requested quantity exceeds available stock (<?php echo $stock; ?> available).
		</div>
		<div style="text-align:center;">
			<a href="index.php?page=gallary" class="btn btn-secondary">Back to Products</a>
		</div>
	<?php endif; ?>
</div>

<?php
	} else {
		echo "<div style='text-align:center; padding:40px;'>Product not found. <a href='index.php?page=gallary' class='btn'>Go to Shop</a></div>";
	}
?>
