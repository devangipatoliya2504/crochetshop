<div class="auth-wrapper" style="max-width: 650px;">
	<div class="auth-header">
		<div class="auth-icon-badge">
			<i class="fa-solid fa-user-plus"></i>
		</div>
		<h2 class="auth-title">Create an Account</h2>
		<p class="auth-subtitle">Join our handmade crochet atelier family</p>
	</div>

	<form method="post" action="action/insertregistr.php">
		<div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
			<div class="form-group">
				<label class="form-label">First Name</label>
				<input type="text" name="r_firstname" placeholder="Enter first name" pattern="[A-Za-z\s]+" title="Only letters and spaces allowed" required>
			</div>
			<div class="form-group">
				<label class="form-label">Last Name</label>
				<input type="text" name="r_lastname" placeholder="Enter last name" pattern="[A-Za-z\s]+" title="Only letters and spaces allowed" required>
			</div>
		</div>

		<div class="form-group">
			<label class="form-label">Address</label>
			<textarea rows="2" name="r_address" placeholder="Enter full residential address" required></textarea>
		</div>

		<div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
			<div class="form-group">
				<label class="form-label">City</label>
				<input type="text" name="r_city" placeholder="Enter city" pattern="[A-Za-z\s]+" title="Only letters and spaces allowed" required>
			</div>
			<div class="form-group">
				<label class="form-label">Contact Number</label>
				<input type="text" name="r_contect" maxlength="10" placeholder="10-digit mobile no." pattern="\d{10}" title="Only 10-digit numbers allowed" required>
			</div>
		</div>

		<div class="form-group">
			<label class="form-label">Email Address</label>
			<input type="email" name="r_email" placeholder="name@example.com" required>
		</div>

		<div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
			<div class="form-group">
				<label class="form-label">Username</label>
				<input type="text" name="r_username" placeholder="Choose a username" pattern="[A-Za-z0-9_\s]+" title="Letters, numbers, and underscores" required>
			</div>
			<div class="form-group">
				<label class="form-label">Password</label>
				<input type="password" name="r_password" maxlength="15" placeholder="Create password" required>
			</div>
		</div>

		<div class="form-group">
			<label class="form-label">Security Question (for recovery)</label>
			<select name="r_securityque" required>
				<option value="what is your favourite food?">What is your favourite food?</option>
				<option value="what is your favourite color?">What is your favourite color?</option>
				<option value="what is your favourite city?">What is your favourite city?</option>
				<option value="what is your favourite movie?">What is your favourite movie?</option>
				<option value="what is your favourite place?">What is your favourite place?</option>
			</select>
		</div>

		<div class="form-group">
			<label class="form-label">Security Answer</label>
			<input type="password" name="r_answer" placeholder="Enter your secret answer" required>
		</div>

		<div style="display:flex; gap:14px; margin-top:24px;">
			<button type="submit" name="btn" class="btn" style="flex:1;">
				<i class="fa-solid fa-heart"></i> Register Now
			</button>
			<input type="reset" name="btn" value="Clear" class="btn btn-secondary">
		</div>

		<div class="auth-links">
			<a href="index.php?page=login">
				Already have an account? <strong>Sign In here</strong>
			</a>
		</div>
	</form>
</div>
