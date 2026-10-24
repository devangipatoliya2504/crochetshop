<div style="max-width:500px; margin:20px auto; background:#FFFFFF; border-radius:var(--radius-xl); padding:36px; border:1px solid var(--border-light); box-shadow:var(--shadow-card);">
	<div style="text-align:left; margin-bottom:24px;">
		<span style="font-size:0.85rem; font-weight:700; color:var(--primary); text-transform:uppercase;">Admin Security</span>
		<h2 style="font-family:var(--font-heading); font-size:1.8rem; color:var(--text-primary); margin:0;">
			Change Password
		</h2>
	</div>

	<?php
		if(isset($_REQUEST['msg'])) {
			$m = $_REQUEST['msg'];
			$err = "";
			if($m == 0) $err = "Current password is incorrect.";
			if($m == 1) $err = "Incorrect password.";
			if($m == 2) $err = "New password and confirmation do not match.";

			if(!empty($err)) {
				echo "
				<div style='background:#FFF0F0; border-left:4px solid #D32F2F; color:#D32F2F; padding:12px 16px; border-radius:var(--radius-md); margin-bottom:20px; font-weight:600; font-size:0.9rem;'>
					<i class='fa-solid fa-circle-exclamation'></i> $err
				</div>";
			}
		}
	?>

	<form action="action/checkpass.php" method="post">
		<div style="margin-bottom:18px;">
			<label style="display:block; font-size:0.88rem; font-weight:700; color:var(--text-primary); margin-bottom:6px;">Current Password</label>
			<input type="password" name="oldpass" placeholder="Enter old password" required autofocus>
		</div>

		<div style="margin-bottom:18px;">
			<label style="display:block; font-size:0.88rem; font-weight:700; color:var(--text-primary); margin-bottom:6px;">New Password</label>
			<input type="password" name="newpass" placeholder="Enter new password" required>
		</div>

		<div style="margin-bottom:24px;">
			<label style="display:block; font-size:0.88rem; font-weight:700; color:var(--text-primary); margin-bottom:6px;">Confirm New Password</label>
			<input type="password" name="conpass" placeholder="Confirm new password" required>
		</div>

		<div style="display:flex; gap:12px;">
			<input type="submit" value="Update Password" class="btn" style="flex:1;">
			<a href="index.php?page=home" class="btn btn-secondary">Cancel</a>
		</div>
	</form>
</div>
