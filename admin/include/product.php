<?php
	include("config/connection.php");
	$fetch = "SELECT * FROM category";
	$res = mysql_query($fetch);
?>

<div style="max-width:650px; margin:20px auto; background:#FFFFFF; border-radius:var(--radius-xl); padding:36px; border:1px solid var(--border-light); box-shadow:var(--shadow-card);">
	<div style="text-align:left; margin-bottom:26px;">
		<span style="font-size:0.85rem; font-weight:700; color:var(--primary); text-transform:uppercase;">Catalog Addition</span>
		<h2 style="font-family:var(--font-heading); font-size:1.8rem; color:var(--text-primary); margin:0;">
			Add New Handcrafted Product
		</h2>
	</div>

	<form action="action/productinsert.php" method="POST" enctype="multipart/form-data">
		<div style="margin-bottom:18px;">
			<label style="display:block; font-size:0.88rem; font-weight:700; color:var(--text-primary); margin-bottom:6px;">Category</label>
			<select name="c_id" required>
				<option value="">-- Select Category --</option>
				<?php
					if($res) {
						while($row = mysql_fetch_array($res)) {
							echo "<option value='".$row[0]."'>".htmlspecialchars($row[1])."</option>";
						}
					}
				?>
			</select>
		</div>

		<div style="margin-bottom:18px;">
			<label style="display:block; font-size:0.88rem; font-weight:700; color:var(--text-primary); margin-bottom:6px;">Product Name</label>
			<input type="text" id="p_name" name="p_name" pattern="[A-Za-z0-9\s\-]+" title="Letters, numbers, and spaces allowed" placeholder="e.g. Daisy Flower Crochet Bag" required>
		</div>

		<div style="margin-bottom:18px;">
			<label style="display:block; font-size:0.88rem; font-weight:700; color:var(--text-primary); margin-bottom:6px;">Product Image</label>
			<input type="file" name="uploadfile" required>
		</div>

		<div style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:18px;">
			<div>
				<label style="display:block; font-size:0.88rem; font-weight:700; color:var(--text-primary); margin-bottom:6px;">Price (₹)</label>
				<input type="text" name="p_price" id="p_price" pattern="[0-9]+" title="Only numbers allowed" placeholder="e.g. 599" required>
			</div>
			<div>
				<label style="display:block; font-size:0.88rem; font-weight:700; color:var(--text-primary); margin-bottom:6px;">Quantity in Stock</label>
				<input type="text" name="p_quantity" id="p_quantity" pattern="[0-9]+" title="Only numbers allowed" placeholder="e.g. 10" required>
			</div>
		</div>

		<div style="margin-bottom:24px;">
			<label style="display:block; font-size:0.88rem; font-weight:700; color:var(--text-primary); margin-bottom:6px;">Description</label>
			<textarea name="p_description" id="p_description" rows="3" placeholder="Describe the materials, yarn type, dimensions, and craft details..." required></textarea>
		</div>

		<div style="display:flex; gap:12px;">
			<button type="submit" class="btn" style="flex:1;">
				<i class="fa-solid fa-cloud-arrow-up"></i> Save Product
			</button>
			<a href="index.php?page=viewproduct" class="btn btn-secondary">Cancel</a>
		</div>
	</form>
</div>
