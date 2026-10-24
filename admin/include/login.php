<div style="max-width:460px; margin:30px auto; background:#FFFFFF; border-radius:var(--radius-xl); padding:40px 34px; border:1px solid var(--border-light); box-shadow:var(--shadow-card);">
	<div style="text-align:center; margin-bottom:26px;">
		<div style="width:64px; height:64px; border-radius:50%; margin:0 auto 16px; background:var(--primary-light); color:var(--primary); display:flex; align-items:center; justify-content:center; font-size:1.6rem;">
			<i class="fa-solid fa-shield-halved"></i>
		</div>
		<h2 style="font-family:var(--font-heading); font-size:1.8rem; color:var(--text-primary);">Admin Login</h2>
		<p style="color:var(--text-secondary); font-size:0.9rem; margin-top:4px;">Enter administrator credentials</p>
	</div>

	<?php
		if(isset($_REQUEST['msg']) && $_REQUEST['msg'] == 1) {
			echo "
			<div style='background:#FFF0F0; border-left:4px solid #D32F2F; color:#D32F2F; padding:12px 16px; border-radius:var(--radius-md); margin-bottom:20px; font-weight:600; font-size:0.9rem;'>
				<i class='fa-solid fa-circle-exclamation'></i> Incorrect admin credentials.
			</div>";
		}
	?>

	<form action="action/checklogin.php" method="post">
		<div style="margin-bottom:18px;">
			<label style="display:block; font-size:0.88rem; font-weight:700; color:var(--text-primary); margin-bottom:6px;">
				<i class="fa-solid fa-user-tie" style="color:var(--primary);"></i> Admin Username
			</label>
			<input type="text" name="admin_username" placeholder="Enter username" required autofocus>
		</div>

		<div style="margin-bottom:24px;">
			<label style="display:block; font-size:0.88rem; font-weight:700; color:var(--text-primary); margin-bottom:6px;">
				<i class="fa-solid fa-key" style="color:var(--primary);"></i> Admin Password
			</label>
			<input type="password" name="admin_password" maxlength="15" placeholder="Enter password" required>
		</div>

		<div style="display:flex; gap:12px;">
			<button type="submit" id="submit" class="btn" style="flex:1;">
				<i class="fa-solid fa-arrow-right-to-bracket"></i> Sign In to Portal
			</button>
			<input type="reset" id="reset" value="Clear" style="background:var(--bg-subtle); border:1px solid var(--border-stitch); padding:10px 18px; border-radius:var(--radius-full); cursor:pointer;">
		</div>
	</form>
</div>
