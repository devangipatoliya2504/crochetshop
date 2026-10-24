<div class="auth-wrapper" style="max-width: 520px;">
	<div class="auth-header">
		<div class="auth-icon-badge">
			<i class="fa-solid fa-key"></i>
		</div>
		<h2 class="auth-title">Change Password</h2>
		<p class="auth-subtitle">Update your credentials to keep your account safe</p>
	</div>

	<?php
		if(isset($_REQUEST['msg'])) {
			$m = $_REQUEST['msg'];
			$errorText = "";
			if($m == 0) $errorText = "The old password you entered is incorrect.";
			if($m == 1) $errorText = "Incorrect password.";
			if($m == 2) $errorText = "New password and confirm password do not match.";

			if(!empty($errorText)) {
				echo "
				<div style='background:#FFF0F0; border-left:4px solid #D32F2F; color:#D32F2F; padding:12px 16px; border-radius:var(--radius-md); margin-bottom:20px; font-weight:600; font-size:0.9rem;'>
					<i class='fa-solid fa-circle-exclamation'></i> $errorText
				</div>";
			}
		}
	?>

	<form action="action/checkpass.php" method="post">
		<div class="form-group">
			<label class="form-label">Current Password</label>
			<input type="password" name="oldpass" placeholder="Enter old password" required>
		</div>

		<div class="form-group">
			<label class="form-label">New Password</label>
			<input type="password" name="newpass" placeholder="Enter new password" required>
		</div>

		<div class="form-group">
			<label class="form-label">Confirm New Password</label>
			<input type="password" name="conpass" placeholder="Re-enter new password" required>
		</div>

		<div style="display:flex; gap:12px; margin-top:24px;">
			<button type="submit" class="btn" style="flex:1;">
				<i class="fa-solid fa-check"></i> Update Password
			</button>
			<a href="index.php?page=home" class="btn btn-secondary">Cancel</a>
		</div>
	</form>
</div>
