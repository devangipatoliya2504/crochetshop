<?php
	include("config/connection.php");
	$fetch = "SELECT * FROM category";
	$res = mysql_query($fetch);
?>

<div class="gallery-wrapper">
	<!-- Filter Header -->
	<div class="gallery-filter-wrap">
		<div class="gallery-filter-title">
			<i class="fa-solid fa-shapes" style="color:var(--primary);"></i>
			<span>Curated Crochet Collection</span>
		</div>
		<form action="index.php?page=add" method="POST" style="margin:0;">
			<div class="gallery-filter-controls">
				<label for="c_id" style="font-weight:600; font-size:0.9rem; color:var(--text-secondary);">
					Filter By:
				</label>
				<select name="c_id" id="c_id" required>
					<option value="">-- Choose Category --</option>
					<?php
						if($res) {
							while($row = mysql_fetch_array($res)) {
								echo "<option value='".$row[0]."'>".htmlspecialchars($row[1])."</option>";
							}
						}
					?>
				</select>
				<button type="submit" class="btn" style="padding:10px 20px; font-size:0.9rem;">
					<i class="fa-solid fa-filter"></i> Filter
				</button>
			</div>
		</form>
	</div>

	<!-- Products Showcase Grid -->
	<?php
		$s = "SELECT * FROM product";
		$result = mysql_query($s);

		if($result && mysql_num_rows($result) > 0) {
			echo "<div class='crochet-product-grid'>";
			while($row = mysql_fetch_array($result)) {
				$p_id = $row['p_id'];
				$imgName = $row['p_image'];
				$pName = htmlspecialchars($row['p_name']);
				$price = isset($row['p_price']) ? $row['p_price'] : '';

				echo "
				<div class='product-card'>
					<div class='product-img-wrap'>
						<span class='product-badge'><i class='fa-solid fa-heart'></i> Artisan Made</span>
						<img src='../uploadfile/$imgName' alt='$pName' onerror=\"this.onerror=null; this.src='upload/28.png';\">
					</div>
					<div class='product-body'>
						<h3 class='product-title'>$pName</h3>";
						if(!empty($price)) {
							echo "<div class='product-price'>₹$price</div>";
						}
				echo "
						<a href='index.php?page=detail&p_id=$p_id' class='btn btn-detail'>
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
				<h3 style='font-family:var(--font-heading); color:var(--text-primary);'>No Products Found</h3>
				<p style='color:var(--text-secondary);'>Check back soon for new handcrafted arrivals!</p>
			</div>";
		}
	?>
</div>
