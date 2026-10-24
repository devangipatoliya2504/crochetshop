<?php
	include("config/connection.php");
	$s = "SELECT * FROM product p JOIN category c ON p.c_id = c.c_id";
	$result = mysql_query($s);
?>

<div id="view">
	<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
		<div>
			<span style="font-size:0.85rem; font-weight:700; color:var(--primary); text-transform:uppercase;">Store Catalog</span>
			<h2 style="font-family:var(--font-heading); font-size:1.8rem; color:var(--text-primary); margin:0;">
				Manage Products
			</h2>
		</div>
		<a href="index.php?page=product" class="btn">
			<i class="fa-solid fa-plus"></i> Add New Product
		</a>
	</div>

	<table>
		<thead>
			<tr>
				<th>Image</th>
				<th>Product Name</th>
				<th>Category</th>
				<th>Price</th>
				<th>Stock</th>
				<th>Description</th>
				<th style="text-align:center;">Edit</th>
				<th style="text-align:center;">Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php
				if($result && mysql_num_rows($result) > 0) {
					while($row = mysql_fetch_array($result)) {
						$p_id = $row['p_id'];
			?>
			<tr>
				<td>
					<img src="../uploadfile/<?php echo $row['p_image']; ?>" alt="Product" style="width:50px; height:50px; border-radius:var(--radius-sm); object-fit:cover; border:1px solid var(--border-light);" onerror="this.onerror=null; this.src='../user/upload/28.png';">
				</td>
				<td style="font-weight:700; color:var(--text-primary);"><?php echo htmlspecialchars($row['p_name']); ?></td>
				<td>
					<span style="background:var(--bg-subtle); padding:4px 10px; border-radius:var(--radius-full); font-size:0.82rem; font-weight:600;">
						<?php echo htmlspecialchars($row['c_name']); ?>
					</span>
				</td>
				<td style="font-weight:700; color:var(--primary);">₹<?php echo $row['p_price']; ?></td>
				<td>
					<span style="font-weight:600;"><?php echo $row['p_quantity']; ?> pcs</span>
				</td>
				<td style="color:var(--text-secondary); font-size:0.88rem; max-width:200px;">
					<?php echo htmlspecialchars($row['p_description']); ?>
				</td>
				<td style="text-align:center;">
					<a href="index.php?page=productedit&p_id=<?php echo $p_id; ?>" class="btn btn-secondary" style="padding:6px 14px; font-size:0.85rem;" title="Edit">
						<i class="fa-solid fa-pen-to-square"></i>
					</a>
				</td>
				<td style="text-align:center;">
					<a href="action/productdelete.php?p_id=<?php echo $p_id; ?>" onclick="return f2();" class="btn btn-secondary" style="padding:6px 14px; font-size:0.85rem; color:#D32F2F !important;" title="Delete">
						<i class="fa-solid fa-trash-can"></i>
					</a>
				</td>
			</tr>
			<?php
					}
				} else {
					echo "<tr><td colspan='8' style='text-align:center; padding:30px; color:var(--text-secondary);'>No products in catalog.</td></tr>";
				}
			?>
		</tbody>
	</table>
</div>
