<div class="auth-wrapper" style="max-width: 560px;">
	<div class="auth-header">
		<div class="auth-icon-badge">
			<i class="fa-solid fa-comments"></i>
		</div>
		<h2 class="auth-title">Share Your Thoughts</h2>
		<p class="auth-subtitle">We cherish every piece of feedback from our crochet family</p>
	</div>

	<?php
		if(isset($_REQUEST['msg']) && $_REQUEST['msg'] == 1) {
			echo "
			<div style='background:#FFF0F0; border-left:4px solid #D32F2F; color:#D32F2F; padding:12px 16px; border-radius:var(--radius-md); margin-bottom:20px; font-weight:600; font-size:0.9rem;'>
				<i class='fa-solid fa-circle-exclamation'></i> Username not found. Please enter your registered username.
			</div>";
		}
	?>

	<form action="action/insertfeedback.php" method="POST">
		<div class="form-group">
			<label class="form-label">
				<i class="fa-solid fa-user" style="color:var(--primary); margin-right:6px;"></i> Your Registered Username
			</label>
			<input type="text" name="r_usernamename" value="<?php echo isset($_SESSION['r_username']) ? htmlspecialchars($_SESSION['r_username']) : ''; ?>" placeholder="Enter your username" required>
		</div>

		<div class="form-group">
			<label class="form-label">
				<i class="fa-solid fa-heart" style="color:var(--primary); margin-right:6px;"></i> Your Feedback / Custom Order Inquiry
			</label>
			<textarea name="f_comment" rows="4" pattern="[A-Za-z\s]+" title="Only letters and spaces allowed" placeholder="How did you like your crochet creation? Or describe your dream design..." required></textarea>
		</div>

		<div style="display:flex; gap:12px; margin-top:24px;">
			<button type="submit" id="submit" class="btn" style="flex:1;">
				<i class="fa-solid fa-paper-plane"></i> Submit Feedback
			</button>
			<input type="reset" id="reset" value="Clear" class="btn btn-secondary">
		</div>
	</form>
</div>
