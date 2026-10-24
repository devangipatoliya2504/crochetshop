<?php
	include("config/connection.php");
	$total = isset($_REQUEST['total']) ? htmlspecialchars($_REQUEST['total']) : '0';
	$id1 = isset($_REQUEST['p_id']) ? htmlspecialchars($_REQUEST['p_id']) : '0';
?>

<div class="auth-wrapper" style="max-width: 600px;">
	<div class="auth-header">
		<div class="auth-icon-badge">
			<i class="fa-solid fa-truck-ramp-box"></i>
		</div>
		<h2 class="auth-title">Shipping &amp; Billing Details</h2>
		<p class="auth-subtitle">Where should we deliver your handcrafted treasures?</p>
	</div>

	<!-- Order Summary Pill -->
	<div style="background:var(--bg-subtle); padding:16px 20px; border-radius:var(--radius-md); display:flex; justify-content:space-between; align-items:center; margin-bottom:26px; border:1px solid var(--border-light);">
		<span style="font-weight:700; color:var(--text-secondary);"><i class="fa-solid fa-receipt"></i> Payable Amount:</span>
		<span style="font-family:var(--font-heading); font-size:1.6rem; font-weight:800; color:var(--primary);">₹<?php echo $total; ?></span>
	</div>

	<form name="rform" method="POST" action="action/bill1insert.php">
		<input type="hidden" name="total" value="<?php echo $total; ?>">
		<input type="hidden" name="p_id" value="<?php echo $id1; ?>">

		<div class="form-group">
			<label class="form-label">Full Name</label>
			<input type="text" name="fnm" pattern="[A-Za-z\s]+" title="Only letters and spaces allowed" placeholder="Enter your full name" required>
		</div>

		<div class="form-group">
			<label class="form-label">Delivery Address</label>
			<input type="text" name="add" placeholder="House/Flat No., Street, Landmark" required>
		</div>

		<div class="form-group" style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
			<div>
				<label class="form-label">City</label>
				<input type="text" name="city" pattern="[A-Za-z\s]+" title="Only letters and spaces allowed" placeholder="Enter your city" required>
			</div>
			<div>
				<label class="form-label">Contact Number</label>
				<input type="text" name="cno" maxlength="10" placeholder="10-digit mobile number" pattern="\d{10}" title="10-digit number required" required>
			</div>
		</div>

		<div class="form-group">
			<label class="form-label">Email Address</label>
			<input type="email" name="email" placeholder="name@example.com" required>
		</div>

		<div style="display:flex; gap:14px; margin-top:24px;">
			<button type="submit" class="btn" style="flex:1;">
				<i class="fa-solid fa-lock"></i> Complete Purchase
			</button>
			<input type="reset" class="btn btn-secondary" value="Reset">
		</div>
	</form>
</div>
