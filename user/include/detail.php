<?php
	include("config/connection.php");
	$id1 = isset($_REQUEST['p_id']) ? intval($_REQUEST['p_id']) : 0;
	$product = "SELECT * FROM product WHERE p_id = $id1";
	$result = mysql_query($product);

	if($result && $row = mysql_fetch_array($result)) {
		$id = $row['p_id'];
		$name = htmlspecialchars($row['p_name']);
		$price = $row['p_price'];
		$stock = $row['p_quantity'];
		$desc = isset($row['p_description']) ? htmlspecialchars($row['p_description']) : '';
		$img = $row['p_image'];
?>

<div class="product-detail-view">
	<!-- Left: Big Product Image Showcase -->
	<div class="detail-gallery">
		<img src="../uploadfile/<?php echo $img; ?>" alt="<?php echo $name; ?>" onerror="this.onerror=null; this.src='upload/28.png';">
	</div>

	<!-- Right: Product Specifications & Actions -->
	<div class="detail-info">
		<div style="display:flex; justify-content:space-between; align-items:center;">
			<span class="product-badge" style="position:static;"><i class="fa-solid fa-sparkles"></i> Artisan Original</span>
			<span class="detail-stock-pill"><i class="fa-solid fa-cubes"></i> <?php echo $stock; ?> In Stock</span>
		</div>

		<h2 class="detail-title"><?php echo $name; ?></h2>

		<div class="detail-price-tag">
			₹<?php echo $price; ?>
			<span style="font-size:0.85rem; font-weight:normal; color:var(--text-secondary);">Tax included</span>
		</div>

		<?php if(!empty($desc)): ?>
			<p style="color:var(--text-secondary); line-height:1.6; font-size:0.95rem;">
				<?php echo $desc; ?>
			</p>
		<?php endif; ?>

		<ul class="detail-highlights">
			<li><i class="fa-solid fa-circle-check"></i> 100% Handcrafted by passionate local artisans</li>
			<li><i class="fa-solid fa-leaf"></i> Soft, breathable, hypoallergenic cotton &amp; wool</li>
			<li><i class="fa-solid fa-gift"></i> Packed in sustainable, gift-ready aesthetic box</li>
			<li><i class="fa-solid fa-truck-fast"></i> Safe and tracked door-to-door delivery</li>
		</ul>

		<div class="detail-actions">
			<a href="index.php?page=addtocart&p_id=<?php echo $id1; ?>" class="btn" style="flex:1;">
				<i class="fa-solid fa-cart-plus"></i> Add to Cart
			</a>
			<a href="index.php?page=gallary" class="btn btn-secondary">
				<i class="fa-solid fa-arrow-left"></i> Back
			</a>
		</div>
	</div>
</div>

<?php
	} else {
		echo "
		<div style='text-align:center; padding:60px 20px;'>
			<h3 style='font-family:var(--font-heading);'>Product Not Found</h3>
			<p style='color:var(--text-secondary); margin:10px 0 20px;'>This handcrafted creation may no longer be available.</p>
			<a href='index.php?page=gallary' class='btn'>Back to Products</a>
		</div>";
	}
?>
