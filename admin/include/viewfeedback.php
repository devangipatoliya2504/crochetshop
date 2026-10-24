<div id="main_feed">
	<div style="text-align:left; margin-bottom:20px;">
		<span style="font-size:0.85rem; font-weight:700; color:var(--primary); text-transform:uppercase;">Community Voice</span>
		<h2 style="font-family:var(--font-heading); font-size:1.8rem; color:var(--text-primary); margin:0;">
			Customer Feedback
		</h2>
	</div>

	<?php
		include("config/connection.php");
		$result = mysql_query("SELECT * FROM feedback");

		if($result && mysql_num_rows($result) > 0) {
			echo "<table>
				<thead>
					<tr>
						<th style='width:180px;'>Username</th>
						<th>Feedback / Comment</th>
						<th style='text-align:center; width:100px;'>Action</th>
					</tr>
				</thead>
				<tbody>";
			while($row = mysql_fetch_array($result)) {
				$f_id = $row['f_id'];
				echo "<tr>
					<td style='font-weight:700; color:var(--text-primary);'><i class='fa-solid fa-user' style='color:var(--primary); margin-right:6px;'></i> ".htmlspecialchars($row['r_username'])."</td>
					<td style='color:var(--text-secondary); line-height:1.6;'>".htmlspecialchars($row['f_comment'])."</td>
					<td style='text-align:center;'>
						<a href='action/deletefeedback.php?f_id=$f_id' onclick='return f2();' class='btn btn-secondary' style='padding:6px 14px; font-size:0.85rem; color:#D32F2F !important;' title='Delete'>
							<i class='fa-solid fa-trash-can'></i>
						</a>
					</td>
				</tr>";
			}
			echo "</tbody></table>";
		} else {
			echo "<div style='text-align:center; padding:40px; color:var(--text-secondary);'>No customer feedback submitted yet.</div>";
		}
	?>
</div>
