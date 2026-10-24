<?php
	include("config/connection.php");
	error_reporting(0);
	
	$c_id = isset($_REQUEST['c_id']) ? intval($_REQUEST['c_id']) : 0;
	$fetch = "SELECT * FROM category";
	$res = mysql_query($fetch);
?>

<div class="gallery-wrapper">
	<!-- Filter Header -->
	<div class="gallery-filter-wrap">
		<div class="gallery-filter-title">
			<i class="fa-solid fa-filter" style="color:var(--primary);"></i>
			<span>Filtered Collection</span>
		</div>
		<form action="index.php?page=add" method="POST" style="margin:0;">
			<div class="gallery-filter-controls">
				<select name="c_id" id="c_id" required>
					<option value="">-- Choose Category --</option>
					<?php
						if($res) {
							while($row = mysql_fetch_array($res)) {
								$selected = ($row[0] == $c_id) ? "selected" : "";
								echo "<option value='".$row[0]."' $selected>".htmlspecialchars($row[1])."</option>";
							}
						}
					?>
				</select>
				<button type="submit" class="btn" style="padding:10px 20px; font-size:0.9rem;">
					<i class="fa-solid fa-magnifying-glass"></i> Filter
				</button>
				<a href="index.php?page=gallary" class="btn btn-secondary" style="padding:10px 18px; font-size:0.9rem;">
					<i class="fa-solid fa-rotate-left"></i> All Products
				</a>
			</div>
		</form>
	</div>

	<!-- Filtered Products Showcase Grid -->
	<?php
		if($c_id > 0) {
			$query = "SELECT * FROM product WHERE c_id = " . $c_id;
			$c = mysql_query($query);

			if($c && mysql_num_rows($c) > 0) {
				echo "<div class='crochet-product-grid'>";
				while ($row = mysql_fetch_assoc($c)) {
					$id = $row['p_id'];
					$imgName = $row['p_image'];
					$pName = htmlspecialchars($row['p_name']);
					$price = isset($row['p_price']) ? $row['p_price'] : '';

					echo "
					<div class='product-card'>
						<div class='product-img-wrap'>
							<span class='product-badge'><i class='fa-solid fa-check'></i> In Stock</span>
							<img src='../uploadfile/$imgName' alt='$pName' onerror=\"this.onerror=null; this.src='upload/28.png';\">
						</div>
						<div class='product-body'>
							<h3 class='product-title'>$pName</h3>";
							if(!empty($price)) {
								echo "<div class='product-price'>₹$price</div>";
							}
					echo "
							<a href='index.php?page=detail&p_id=$id' class='btn btn-detail'>
								View Details <i class='fa-solid fa-arrow-right-long' style='margin-left:4px;'></i>
							</a>
						</div>
					</div>";
				}
				echo "</div>";
			} else {
				echo "
				<div style='text-align:center; padding:60px 20px; background:#FFF; border-radius:var(--radius-lg); border:1px solid var(--border-light);'>
					<i class='fa-solid fa-box-open' style='font-size:3rem; color:var(--border-stitch); margin-bottom:12px;'></i>
					<h3 style='font-family:var(--font-heading); color:var(--text-primary);'>No Products Found in this Category</h3>
					<p style='color:var(--text-secondary); margin:8px 0 16px;'>Explore our full catalog or pick another category.</p>
					<a href='index.php?page=gallary' class='btn'><i class='fa-solid fa-store'></i> View All Products</a>
				</div>";
			}
		} else {
			echo "<script>window.location.href='index.php?page=gallary';</script>";
		}
	?>
</div>
