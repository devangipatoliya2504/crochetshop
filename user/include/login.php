<div class="auth-wrapper">
	<div class="auth-header">
		<div class="auth-icon-badge">
			<i class="fa-solid fa-user-lock"></i>
		</div>
		<h2 class="auth-title">Welcome Back</h2>
		<p class="auth-subtitle">Sign in to your Crochet Shop account</p>
	</div>

	<?php
		if(isset($_REQUEST['msg']) && $_REQUEST['msg'] == 1) {
			echo "
			<div style='background:#FFF0F0; border-left:4px solid #D32F2F; color:#D32F2F; padding:12px 16px; border-radius:var(--radius-md); margin-bottom:20px; font-weight:600; font-size:0.9rem;'>
				<i class='fa-solid fa-circle-exclamation'></i> Incorrect username or password. Please try again.
			</div>";
		}
	?>

	<form action="action/checklogin.php" method="post">
		<div class="form-group">
			<label class="form-label"><i class="fa-solid fa-user" style="color:var(--primary); margin-right:6px;"></i> Username</label>
			<input type="text" name="r_username" placeholder="Enter your username" required autofocus>
		</div>

		<div class="form-group">
			<label class="form-label"><i class="fa-solid fa-key" style="color:var(--primary); margin-right:6px;"></i> Password</label>
			<input type="password" name="r_password" maxlength="20" placeholder="Enter your password" required>
		</div>

		<div style="display:flex; gap:12px; margin-top:24px;">
			<button type="submit" id="submit" class="btn" style="flex:1;">
				<i class="fa-solid fa-arrow-right-to-bracket"></i> Sign In
			</button>
			<input type="reset" id="reset" value="Clear" class="btn btn-secondary">
		</div>

		<div class="auth-links">
			<a href="index.php?page=registration">
				<i class="fa-solid fa-user-plus"></i> Don't have an account? <strong>Create One</strong>
			</a>
			<a href="index.php?page=forgotpassword1" style="color:var(--text-secondary);">
				<i class="fa-solid fa-lock-open"></i> Forgot your password?
			</a>
		</div>
	</form>
</div>
