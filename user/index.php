<?php
	session_start();
	$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : 'home';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>The Crochet Edit | Artisan Handcrafted Boutique</title>
	<link rel="stylesheet" type="text/css" href="css/css.css">
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

	<!-- Top Announcement Ribbon -->
	<div class="top-ribbon">
		<span><i class="fa-solid fa-wand-magic-sparkles"></i> Handcrafted with Love &amp; 100% Eco-Friendly Pure Yarns</span>
		<span class="ribbon-highlight"><i class="fa-solid fa-gift"></i> Custom Orders &amp; Worldwide Shipping Available</span>
	</div>

	<!-- Main Boutique Header -->
	<div id="header">
		<a href="index.php?page=home" class="brand-section">
			<div class="brand-logo-wrap">
				<img src="upload/60.jfif" alt="The Crochet Edit Logo" onerror="this.src='upload/28.png'">
			</div>
			<div class="brand-info">
				<h1 class="brand-title">Crochet <span>Shop</span></h1>
				<span class="brand-tagline"><i class="fa-solid fa-feather-pointed"></i> Artisan Handcrafted Studio</span>
			</div>
		</a>

		<div class="user-account-bar login">
			<?php if(isset($_SESSION['r_id'])): ?>
				<div class="user-badge">
					<i class="fa-solid fa-circle-user fa-lg"></i>
					<span>Welcome, <span class="username-text"><?php echo htmlspecialchars($_SESSION['r_username']); ?></span></span>
				</div>
				<a href="index.php?page=changepassword" class="header-action-btn btn-header-outline log1" title="Change Password">
					<i class="fa-solid fa-key"></i> Password
				</a>
				<a href="index.php?page=logout" class="header-action-btn btn-header-primary" title="Logout">
					<i class="fa-solid fa-arrow-right-from-bracket"></i> Logout
				</a>
			<?php else: ?>
				<a href="index.php?page=login" class="header-action-btn btn-header-primary log">
					<i class="fa-solid fa-user-lock"></i> Sign In
				</a>
				<a href="index.php?page=registration" class="header-action-btn btn-header-outline">
					<i class="fa-solid fa-user-plus"></i> Register
				</a>
			<?php endif; ?>
		</div>
	</div>

	<!-- Main Navigation Menu -->
	<div class="menu">
		<?php
			$isHome = ($page == 'home') ? 'active' : '';
			$isGallery = ($page == 'gallary' || $page == 'add' || $page == 'detail') ? 'active' : '';
			$isCart = ($page == 'procart' || $page == 'addtocart' || $page == 'billform') ? 'active' : '';
			$isFeedback = ($page == 'feedback') ? 'active' : '';
			$isAbout = ($page == 'aboutus') ? 'active' : '';
			$isContact = ($page == 'contactus') ? 'active' : '';

			echo "<a href='index.php?page=home' class='space nav-link $isHome'><i class='fa-solid fa-house'></i> Home</a>";
			echo "<a href='index.php?page=gallary' class='space nav-link $isGallery'><i class='fa-solid fa-store'></i> Products</a>";

			if(isset($_SESSION['r_id'])) {
				echo "<a href='index.php?page=procart' class='space nav-link $isCart'><i class='fa-solid fa-bag-shopping'></i> My Cart</a>";
				echo "<a href='index.php?page=feedback' class='space nav-link $isFeedback'><i class='fa-solid fa-comment-heart'></i> Feedback</a>";
			}

			echo "<a href='index.php?page=aboutus' class='space nav-link $isAbout'><i class='fa-solid fa-heart'></i> About Us</a>";
			echo "<a href='index.php?page=contactus' class='space nav-link $isContact'><i class='fa-solid fa-envelope'></i> Contact Us</a>";
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

	<!-- Modern Boutique Footer -->
	<div class="footer crochet-footer">
		<div class="footer-top">
			<div class="footer-brand">
				Crochet <span>Shop</span>
				<div style="font-size:0.85rem; font-weight:normal; color:var(--text-secondary); margin-top:4px;">
					Artisan Hand-Knitted Wonders, Made Stitch by Stitch with Warmth &amp; Love.
				</div>
			</div>
			<div class="footer-links">
				<a href="index.php?page=home">Home</a>
				<a href="index.php?page=gallary">Shop Collection</a>
				<a href="index.php?page=aboutus">Our Story</a>
				<a href="index.php?page=contactus">Get in Touch</a>
			</div>
		</div>
		<div class="footer-credits">
			<span><i class="fa-solid fa-heart" style="color:var(--primary);"></i> Handcrafted with pride by</span>
			<strong>Devangi Patoliya</strong> &amp; <strong>Vishva Tilala</strong>
			<span>&bull; &copy; <?php echo date('Y'); ?> All Rights Reserved</span>
		</div>
	</div>

</div>

</body>
</html>
