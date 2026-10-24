<div class="auth-wrapper" style="max-width: 500px;">
	<div class="auth-header">
		<div class="auth-icon-badge">
			<i class="fa-solid fa-lock-open"></i>
		</div>
		<h2 class="auth-title">Reset Password</h2>
		<p class="auth-subtitle">Step 1: Enter your registered username</p>
	</div>

	<?php
		if(isset($_REQUEST['msg']) && $_REQUEST['msg'] == 1) {
			echo "
			<div style='background:#FFF0F0; border-left:4px solid #D32F2F; color:#D32F2F; padding:12px 16px; border-radius:var(--radius-md); margin-bottom:20px; font-weight:600; font-size:0.9rem;'>
				<i class='fa-solid fa-circle-exclamation'></i> Username not found in our records.
			</div>";
		}
	?>

	<form name="forgotpassword" action="action/for1.php" method="post">
		<input type="hidden" name="r_id" value="<?php echo isset($r_id) ? $r_id : ''; ?>">

		<div class="form-group">
			<label class="form-label">Username</label>
			<input type="text" name="r_username" placeholder="Enter your username" required autofocus>
		</div>

		<div style="display:flex; gap:12px; margin-top:24px;">
			<button type="submit" name="next" class="btn" style="flex:1;">
				Next Step <i class="fa-solid fa-arrow-right"></i>
			</button>
			<input type="reset" id="reset" value="Clear" class="btn btn-secondary">
		</div>

		<div class="auth-links">
			<a href="index.php?page=login">
				<i class="fa-solid fa-arrow-left"></i> Back to Sign In
			</a>
		</div>
	</form>
</div>
