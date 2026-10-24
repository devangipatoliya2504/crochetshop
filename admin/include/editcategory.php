<?php
	include("config/connection.php");
	$editmode = false;
	$c_name = "";
	$c_id = isset($_REQUEST['c_id']) ? intval($_REQUEST['c_id']) : 0;
	
	if($c_id > 0) {
		$query = "SELECT * FROM category WHERE c_id = " . $c_id;
		$result = mysql_query($query);
		if($result && $row = mysql_fetch_array($result)) {
			$c_name = $row['c_name'];
			$editmode = true;
		}
	}
?>

<div style="max-width:480px; margin:20px auto; background:#FFFFFF; border-radius:var(--radius-xl); padding:36px; border:1px solid var(--border-light); box-shadow:var(--shadow-card);">
	<div style="text-align:left; margin-bottom:24px;">
		<span style="font-size:0.85rem; font-weight:700; color:var(--primary); text-transform:uppercase;">Category Management</span>
		<h2 style="font-family:var(--font-heading); font-size:1.8rem; color:var(--text-primary); margin:0;">
			Edit Category #<?php echo $c_id; ?>
		</h2>
	</div>

	<form action="action/insertcategory.php" method="post" name="category">
		<input type="hidden" name="c_id" value="<?php echo $c_id; ?>">

		<div style="margin-bottom:22px;">
			<label style="display:block; font-size:0.88rem; font-weight:700; color:var(--text-primary); margin-bottom:6px;">Category Name</label>
			<input type="text" name="c_name" value="<?php echo htmlspecialchars($c_name); ?>" pattern="[A-Za-z\s]+" title="Only letters and spaces allowed" required autofocus>
		</div>

		<div style="display:flex; gap:12px;">
			<input type="submit" name="change" value="update" class="btn" style="flex:1;">
			<a href="index.php?page=viewcategory" class="btn btn-secondary">Cancel</a>
		</div>
	</form>
</div>
