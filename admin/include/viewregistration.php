<div id="main_reg">
	<div style="text-align:left; margin-bottom:20px;">
		<span style="font-size:0.85rem; font-weight:700; color:var(--primary); text-transform:uppercase;">User Accounts</span>
		<h2 style="font-family:var(--font-heading); font-size:1.8rem; color:var(--text-primary); margin:0;">
			Registered Customers
		</h2>
	</div>

	<?php
		include("config/connection.php");
		$result = mysql_query("SELECT * FROM registration");

		if($result && mysql_num_rows($result) > 0) {
			echo "<table>
				<thead>
					<tr>
						<th>Customer Name</th>
						<th>Address</th>
						<th>City</th>
						<th>Email</th>
						<th>Contact</th>
						<th style='text-align:center;'>Action</th>
					</tr>
				</thead>
				<tbody>";
			while($row = mysql_fetch_array($result)) {
				$r_id = $row['r_id'];
				echo "<tr>
					<td style='font-weight:700; color:var(--text-primary);'>".htmlspecialchars($row['r_firstname']." ".$row['r_lastname'])."</td>
					<td>".htmlspecialchars($row['r_address'])."</td>
					<td>".htmlspecialchars($row['r_city'])."</td>
					<td><a href='mailto:".$row['r_email']."'>".htmlspecialchars($row['r_email'])."</a></td>
					<td>".htmlspecialchars($row['r_contect'])."</td>
					<td style='text-align:center;'>
						<a href='action/deleteregistr.php?r_id=".$r_id."' onclick='return f2();' class='btn btn-secondary' style='padding:6px 14px; font-size:0.85rem; color:#D32F2F !important;' title='Delete Customer'>
							<i class='fa-solid fa-trash-can'></i>
						</a>
					</td>
				</tr>";
			}
			echo "</tbody></table>";
		} else {
			echo "<div style='text-align:center; padding:40px; color:var(--text-secondary);'>No registered users found.</div>";
		}
	?>
</div>
