<?php
	include("config/connection.php");
	$r_id = isset($_REQUEST['r_id']) ? intval($_REQUEST['r_id']) : 0;
?>

<script type="text/javascript">
	function check_valid() {
		var newpass = document.forgotpassword.newpass.value;
		var conpass = document.forgotpassword.conpass.value;
		
		if(newpass == "") {
			alert("Please enter your new password");
			document.forgotpassword.newpass.focus();
			return false;
		}
		if(conpass == "") {
			alert("Please confirm your password");
			document.forgotpassword.conpass.focus();
			return false;
		}
		if(newpass !== conpass) {
			alert("New password and confirm password must match");
			return false;
		}
		return true;
	}
</script>

<div class="auth-wrapper" style="max-width: 520px;">
	<div class="auth-header">
		<div class="auth-icon-badge">
			<i class="fa-solid fa-lock"></i>
		</div>
		<h2 class="auth-title">Create New Password</h2>
		<p class="auth-subtitle">Step 3: Enter your new password below</p>
	</div>

	<form name="forgotpassword" method="post" action="action/for3.php" onsubmit="return check_valid();">
		<input type="hidden" name="r_id" value="<?php echo $r_id; ?>">

		<div class="form-group">
			<label class="form-label">New Password</label>
			<input type="password" name="newpass" placeholder="Enter new password" required autofocus>
		</div>

		<div class="form-group">
			<label class="form-label">Confirm New Password</label>
			<input type="password" name="conpass" placeholder="Re-enter new password" required>
		</div>

		<div style="display:flex; gap:12px; margin-top:24px;">
			<button type="submit" name="submit" class="btn" style="flex:1;">
				<i class="fa-solid fa-check"></i> Set New Password
			</button>
			<input type="reset" name="reset" value="Clear" class="btn btn-secondary">
		</div>
	</form>
</div>
