<div id="main1">
	<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
		<div>
			<span style="font-size:0.85rem; font-weight:700; color:var(--primary); text-transform:uppercase;">Store Inventory</span>
			<h2 style="font-family:var(--font-heading); font-size:1.8rem; color:var(--text-primary); margin:0;">
				Manage Categories
			</h2>
		</div>
		<a href="index.php?page=category" class="btn">
			<i class="fa-solid fa-plus"></i> Add New Category
		</a>
	</div>

	<?php
		include("config/connection.php");
		$result = mysql_query("SELECT * FROM category");

		echo "<table>
			<thead>
				<tr>
					<th style='width:120px;'>Category ID</th>
					<th>Category Name</th>
					<th style='text-align:center; width:100px;'>Edit</th>
					<th style='text-align:center; width:100px;'>Delete</th>
				</tr>
			</thead>
			<tbody>";

		if($result && mysql_num_rows($result) > 0) {
			while($row = mysql_fetch_array($result)) {
				echo "<tr>
					<td style='font-weight:700; color:var(--text-muted);'>#".$row['c_id']."</td>
					<td style='font-weight:700; color:var(--text-primary);'>".htmlspecialchars($row['c_name'])."</td>
					<td style='text-align:center;'>
						<a href='index.php?page=editcategory&c_id=".$row['c_id']."' class='btn btn-secondary' style='padding:6px 14px; font-size:0.85rem;' title='Edit'>
							<i class='fa-solid fa-pen-to-square'></i>
						</a>
					</td>
					<td style='text-align:center;'>
						<a href='action/deletecategory.php?c_id=".$row['c_id']."' onclick='return f2();' class='btn btn-secondary' style='padding:6px 14px; font-size:0.85rem; color:#D32F2F !important;' title='Delete'>
							<i class='fa-solid fa-trash-can'></i>
						</a>
					</td>
				</tr>";
			}
		} else {
			echo "<tr><td colspan='4' style='text-align:center; padding:30px; color:var(--text-secondary);'>No categories found.</td></tr>";
		}
		echo "</tbody></table>";
	?>
</div>
