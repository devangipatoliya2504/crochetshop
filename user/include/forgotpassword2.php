<?php
	include("config/connection.php");
	$r_id = isset($_REQUEST['r_id']) ? intval($_REQUEST['r_id']) : 0;
	$r_securityque = "";
	if($r_id > 0) {
		$res = mysql_query("SELECT * FROM registration WHERE r_id = " . $r_id);
		if($row = mysql_fetch_array($res)) {
			$r_securityque = $row['r_securityque'];
		}
	}
?>

<div class="auth-wrapper" style="max-width: 520px;">
	<div class="auth-header">
		<div class="auth-icon-badge">
			<i class="fa-solid fa-shield-halved"></i>
		</div>
		<h2 class="auth-title">Security Verification</h2>
		<p class="auth-subtitle">Step 2: Answer your security question</p>
	</div>

	<form name="forgotpassword" action="action/for2.php" method="post">
		<input type="hidden" name="r_id" value="<?php echo $r_id; ?>">

		<div class="form-group">
			<label class="form-label">Your Security Question</label>
			<input type="text" name="r_securityque" value="<?php echo htmlspecialchars($r_securityque); ?>" readonly style="background:#F5EFEB; font-weight:600;">
		</div>

		<div class="form-group">
			<label class="form-label">Security Answer</label>
			<input type="text" name="r_answer" placeholder="Enter your secret answer" required autofocus>
		</div>

		<div style="display:flex; gap:12px; margin-top:24px;">
			<button type="submit" id="submit" class="btn" style="flex:1;">
				Verify &amp; Continue <i class="fa-solid fa-arrow-right"></i>
			</button>
			<a href="index.php?page=forgotpassword1" class="btn btn-secondary">Back</a>
		</div>
	</form>
</div>
