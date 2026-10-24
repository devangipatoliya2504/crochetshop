<?php
	include("config/connection.php");
	$p_id = isset($_REQUEST['p_id']) ? intval($_REQUEST['p_id']) : 0;
	
	$fetch = "SELECT * FROM category";
	$res = mysql_query($fetch);
	
	$u1 = "SELECT * FROM product WHERE p_id = '$p_id'";
	$result = mysql_query($u1);
	
	if($result && $row = mysql_fetch_array($result)) {
		$selected_cid = $row['c_id'];
?>

<div style="max-width:650px; margin:20px auto; background:#FFFFFF; border-radius:var(--radius-xl); padding:36px; border:1px solid var(--border-light); box-shadow:var(--shadow-card);">
	<div style="text-align:left; margin-bottom:24px;">
		<span style="font-size:0.85rem; font-weight:700; color:var(--primary); text-transform:uppercase;">Inventory Update</span>
		<h2 style="font-family:var(--font-heading); font-size:1.8rem; color:var(--text-primary); margin:0;">
			Edit Product #<?php echo $p_id; ?>
		</h2>
	</div>

	<form action="action/productupdate.php" method="post" enctype="multipart/form-data">
		<input type="hidden" name="hidid" value="<?php echo $row['p_id']; ?>">

		<div style="margin-bottom:18px;">
			<label style="display:block; font-size:0.88rem; font-weight:700; color:var(--text-primary); margin-bottom:6px;">Category</label>
			<select name="c_id" required>
				<option value="">-- Select Category --</option>
				<?php
					if($res) {
						while($catRow = mysql_fetch_array($res)) {
							$sel = ($catRow['c_id'] == $selected_cid) ? "selected" : "";
							echo "<option value='".$catRow['c_id']."' $sel>".htmlspecialchars($catRow['c_name'])."</option>";
						}
					}
				?>
			</select>
		</div>

		<div style="margin-bottom:18px;">
			<label style="display:block; font-size:0.88rem; font-weight:700; color:var(--text-primary); margin-bottom:6px;">Product Name</label>
			<input type="text" name="p_name" value="<?php echo htmlspecialchars($row['p_name']); ?>" required>
		</div>

		<div style="margin-bottom:18px;">
			<label style="display:block; font-size:0.88rem; font-weight:700; color:var(--text-primary); margin-bottom:6px;">Update Image (leave blank to keep current)</label>
			<div style="display:flex; align-items:center; gap:14px; margin-bottom:8px;">
				<img src="../uploadfile/<?php echo $row['p_image']; ?>" alt="Current Image" style="width:60px; height:60px; border-radius:var(--radius-sm); object-fit:cover; border:1px solid var(--border-light);" onerror="this.onerror=null; this.src='../user/upload/28.png';">
				<span style="font-size:0.85rem; color:var(--text-secondary);">Current: <?php echo htmlspecialchars($row['p_image']); ?></span>
			</div>
			<input type="file" name="uploadfile">
		</div>

		<div style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:18px;">
			<div>
				<label style="display:block; font-size:0.88rem; font-weight:700; color:var(--text-primary); margin-bottom:6px;">Price (₹)</label>
				<input type="text" name="p_price" value="<?php echo $row['p_price']; ?>" required>
			</div>
			<div>
				<label style="display:block; font-size:0.88rem; font-weight:700; color:var(--text-primary); margin-bottom:6px;">Stock Quantity</label>
				<input type="text" name="p_quantity" value="<?php echo $row['p_quantity']; ?>" required>
			</div>
		</div>

		<div style="margin-bottom:24px;">
			<label style="display:block; font-size:0.88rem; font-weight:700; color:var(--text-primary); margin-bottom:6px;">Description</label>
			<textarea name="p_description" rows="3" required><?php echo htmlspecialchars($row['p_description']); ?></textarea>
		</div>

		<div style="display:flex; gap:12px;">
			<input type="submit" value="update" class="btn" style="flex:1;">
			<a href="index.php?page=viewproduct" class="btn btn-secondary">Cancel</a>
		</div>
	</form>
</div>

<?php
	} else {
		echo "<div style='text-align:center; padding:40px;'>Product not found. <a href='index.php?page=viewproduct' class='btn'>Back</a></div>";
	}
?>
