<div id="h_1">
	<div style="text-align:left; margin-bottom:20px;">
		<span style="font-size:0.85rem; font-weight:700; color:var(--primary); text-transform:uppercase;">Order Processing</span>
		<h2 style="font-family:var(--font-heading); font-size:1.8rem; color:var(--text-primary); margin:0;">
			Pending Orders &amp; Purchases
		</h2>
	</div>

	<?php
		include("config/connection.php");
		
		$que = "SELECT * FROM order_master WHERE status='0'";
		$result = mysql_query($que);

		if($result && mysql_num_rows($result) > 0) {
			echo "<table>
				<thead>
					<tr>
						<th>#</th>
						<th>Customer</th>
						<th>Address</th>
						<th>City</th>
						<th>Contact</th>
						<th>Order Total</th>
						<th style='text-align:center;'>Details</th>
						<th style='text-align:center;'>Shipping</th>
					</tr>
				</thead>
				<tbody>";
			$i = 1;
			while($row = mysql_fetch_array($result)) {
				echo "<tr>
					<td style='font-weight:700; color:var(--text-muted);'>".$i."</td>
					<td style='font-weight:700; color:var(--text-primary);'>".htmlspecialchars($row['fnm'])."</td>
					<td>".htmlspecialchars($row[6])."</td>
					<td>".htmlspecialchars($row[7])."</td>
					<td>".htmlspecialchars($row[8])."</td>
					<td style='font-weight:800; color:var(--primary);'>₹".$row['total']."</td>
					<td style='text-align:center;'>
						<a href='index.php?page=view&order_id=".$row['order_id']."' class='btn btn-secondary' style='padding:6px 14px; font-size:0.85rem;'>
							<i class='fa-solid fa-eye'></i> View
						</a>
					</td>
					<td style='text-align:center;'>
						<a href='index.php?page=shipping&order_id=".$row['order_id']."' class='btn' style='padding:6px 14px; font-size:0.85rem;'>
							<i class='fa-solid fa-truck'></i> Ship
						</a>
					</td>
				</tr>";
				$i++;
			}
			echo "</tbody></table>";
		} else {
			echo "
			<div style='text-align:center; padding:50px 20px; background:#FFF; border-radius:var(--radius-lg); border:1px solid var(--border-light);'>
				<i class='fa-solid fa-clipboard-check' style='font-size:3rem; color:var(--secondary); margin-bottom:12px;'></i>
				<h3 style='font-family:var(--font-heading); color:var(--text-primary);'>No Pending Purchases</h3>
				<p style='color:var(--text-secondary);'>All current orders have been processed or none have been placed yet.</p>
			</div>";
		}
	?>
</div>
