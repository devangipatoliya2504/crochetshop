<?php
	session_start();
	$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : 'home';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Portal | The Crochet Edit</title>
	<link type="text/css" rel="stylesheet" href="css/css.css">
	<script type="text/javascript">
		function f1() {
			return confirm("Are you sure you want to update?");
		}
		function f2() {
			return confirm("Are you sure you want to delete?");
		}
	</script>
</head>
<body>

<div id="wrapper">

	<!-- Admin Header -->
	<div id="header">
		<a href="index.php?page=home" class="brand-section">
			<div class="brand-logo-wrap">
				<img src="upload/60.jfif" alt="Admin Logo" onerror="this.src='../user/upload/60.jfif'">
			</div>
			<div class="brand-info">
				<h1 class="brand-title">Crochet Shop <span>Portal</span></h1>
				<span class="brand-tagline"><i class="fa-solid fa-shield-halved"></i> Management Console</span>
			</div>
		</a>

		<div class="user-account-bar login">
			<?php if(isset($_SESSION['admin_id'])): ?>
				<div class="user-badge">
					<i class="fa-solid fa-user-gear"></i>
					<span>Administrator Active</span>
				</div>
				<a href="index.php?page=changepassword" class="btn-header-outline log1" title="Change Password">
					<i class="fa-solid fa-key"></i> Password
				</a>
				<a href="index.php?page=logout" class="btn-header-primary" title="Logout">
					<i class="fa-solid fa-arrow-right-from-bracket"></i> Logout
				</a>
			<?php else: ?>
				<a href="index.php?page=login" class="btn-header-primary">
					<i class="fa-solid fa-lock"></i> Admin Sign In
				</a>
			<?php endif; ?>
		</div>
	</div>

	<!-- Admin Navigation Menu -->
	<div class="menu">
		<?php
			if(isset($_SESSION['admin_id'])) {
				$isReg = ($page == 'viewregistration') ? 'active' : '';
				$isCat = ($page == 'viewcategory' || $page == 'addcategory' || $page == 'category' || $page == 'editcategory') ? 'active' : '';
				$isProd = ($page == 'viewproduct' || $page == 'product' || $page == 'productedit') ? 'active' : '';
				$isFeed = ($page == 'viewfeedback') ? 'active' : '';
				$isPurch = ($page == 'viewpurchase' || $page == 'view' || $page == 'shipping') ? 'active' : '';

				echo "<a href='index.php?page=home' class='space nav-link ".($page=='home'?'active':'')."'><i class='fa-solid fa-gauge'></i> Dashboard</a>";
				echo "<a href='index.php?page=viewregistration' class='space nav-link $isReg'><i class='fa-solid fa-users'></i> Registrations</a>";
				echo "<a href='index.php?page=viewcategory' class='space nav-link $isCat'><i class='fa-solid fa-tags'></i> Categories</a>";
				echo "<a href='index.php?page=viewproduct' class='space nav-link $isProd'><i class='fa-solid fa-boxes-stacked'></i> Products</a>";
				echo "<a href='index.php?page=viewfeedback' class='space nav-link $isFeed'><i class='fa-solid fa-comments'></i> Feedback</a>";
				echo "<a href='index.php?page=viewpurchase' class='space nav-link $isPurch'><i class='fa-solid fa-truck-ramp-box'></i> Purchases</a>";
			} else {
				echo "<a href='index.php?page=login' class='space nav-link active'><i class='fa-solid fa-lock'></i> Please Sign In</a>";
			}
		?>
	</div>

	<!-- Content Area -->
	<div class="content">
		<?php
			$targetPage = "include/" . $page . ".php";
			if(file_exists($targetPage)) {
				include($targetPage);
			} else {
				include("include/home.php");
			}
		?>
	</div>

	<!-- Admin Footer -->
	<div class="footer">
		Handcrafted Atelier Management &bull; Developed by <strong>Devangi Patoliya</strong> &amp; <strong>Vishva Tilala</strong> &bull; &copy; <?php echo date('Y'); ?>
	</div>

</div>

</body>
</html>
