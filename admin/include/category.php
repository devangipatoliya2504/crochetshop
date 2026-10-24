<div style="max-width:480px; margin:20px auto; background:#FFFFFF; border-radius:var(--radius-xl); padding:36px; border:1px solid var(--border-light); box-shadow:var(--shadow-card);">
	<div style="text-align:left; margin-bottom:24px;">
		<span style="font-size:0.85rem; font-weight:700; color:var(--primary); text-transform:uppercase;">Category Management</span>
		<h2 style="font-family:var(--font-heading); font-size:1.8rem; color:var(--text-primary); margin:0;">
			Add New Category
		</h2>
	</div>

	<?php
		if(isset($_REQUEST['flag']) && $_REQUEST['flag'] == 1) {
			echo "
			<div style='background:#FFF0F0; border-left:4px solid #D32F2F; color:#D32F2F; padding:12px 16px; border-radius:var(--radius-md); margin-bottom:20px; font-weight:600; font-size:0.9rem;'>
				<i class='fa-solid fa-circle-exclamation'></i> Category already exists in records.
			</div>";
		}
	?>

	<form name="category" action="action/insertcategory.php" method="POST">
		<div style="margin-bottom:22px;">
			<label style="display:block; font-size:0.88rem; font-weight:700; color:var(--text-primary); margin-bottom:6px;">Category Name</label>
			<input type="text" name="c_name" pattern="[A-Za-z\s]+" title="Only letters and spaces allowed" placeholder="e.g. Handmade Purses, Toys, Caps" required autofocus>
		</div>

		<div style="display:flex; gap:12px;">
			<button type="submit" name="submit" class="btn" style="flex:1;">
				<i class="fa-solid fa-plus"></i> Save Category
			</button>
			<a href="index.php?page=viewcategory" class="btn btn-secondary">Cancel</a>
		</div>
	</form>
</div>
