<?php
	include("config/connection.php");
	
	// Fetch quick stats
	$countProd = 0;
	$countCat = 0;
	$countFeed = 0;
	$countOrders = 0;
	
	$qP = mysql_query("SELECT COUNT(*) FROM product");
	if($qP && $rP = mysql_fetch_array($qP)) $countProd = $rP[0];
	
	$qC = mysql_query("SELECT COUNT(*) FROM category");
	if($qC && $rC = mysql_fetch_array($qC)) $countCat = $rC[0];
	
	$qF = mysql_query("SELECT COUNT(*) FROM feedback");
	if($qF && $rF = mysql_fetch_array($qF)) $countFeed = $rF[0];
	
	$qO = mysql_query("SELECT COUNT(*) FROM order_master");
	if($qO && $rO = mysql_fetch_array($qO)) $countOrders = $rO[0];
?>

<div class="admin-dashboard">
	<div style="text-align:left; margin-bottom:28px;">
		<span style="font-size:0.85rem; font-weight:700; color:var(--primary); text-transform:uppercase; letter-spacing:1.5px;">Overview</span>
		<h2 style="font-family:var(--font-heading); font-size:2rem; color:var(--text-primary); margin-top:4px;">
			Welcome to the Store Manager
		</h2>
		<p style="color:var(--text-secondary); font-size:0.95rem;">
			Monitor your handcrafted crochet inventory, customer orders, and feedback in real-time.
		</p>
	</div>

	<!-- Dashboard Stat Cards -->
	<div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(210px, 1fr)); gap:20px; margin-bottom:35px;">
		<div style="background:#FFF; padding:22px 20px; border-radius:var(--radius-lg); border:1px solid var(--border-light); box-shadow:var(--shadow-subtle); display:flex; align-items:center; gap:16px;">
			<div style="width:52px; height:52px; border-radius:50%; background:var(--primary-light); color:var(--primary); display:flex; align-items:center; justify-content:center; font-size:1.4rem;">
				<i class="fa-solid fa-boxes-stacked"></i>
			</div>
			<div>
				<span style="font-size:0.82rem; color:var(--text-secondary); font-weight:600; text-transform:uppercase;">Products</span>
				<div style="font-family:var(--font-heading); font-size:1.8rem; font-weight:800; color:var(--text-primary);"><?php echo $countProd; ?></div>
			</div>
		</div>

		<div style="background:#FFF; padding:22px 20px; border-radius:var(--radius-lg); border:1px solid var(--border-light); box-shadow:var(--shadow-subtle); display:flex; align-items:center; gap:16px;">
			<div style="width:52px; height:52px; border-radius:50%; background:var(--secondary-light); color:var(--secondary); display:flex; align-items:center; justify-content:center; font-size:1.4rem;">
				<i class="fa-solid fa-tags"></i>
			</div>
			<div>
				<span style="font-size:0.82rem; color:var(--text-secondary); font-weight:600; text-transform:uppercase;">Categories</span>
				<div style="font-family:var(--font-heading); font-size:1.8rem; font-weight:800; color:var(--text-primary);"><?php echo $countCat; ?></div>
			</div>
		</div>

		<div style="background:#FFF; padding:22px 20px; border-radius:var(--radius-lg); border:1px solid var(--border-light); box-shadow:var(--shadow-subtle); display:flex; align-items:center; gap:16px;">
			<div style="width:52px; height:52px; border-radius:50%; background:#FFF4E5; color:var(--accent-gold); display:flex; align-items:center; justify-content:center; font-size:1.4rem;">
				<i class="fa-solid fa-truck-fast"></i>
			</div>
			<div>
				<span style="font-size:0.82rem; color:var(--text-secondary); font-weight:600; text-transform:uppercase;">Orders</span>
				<div style="font-family:var(--font-heading); font-size:1.8rem; font-weight:800; color:var(--text-primary);"><?php echo $countOrders; ?></div>
			</div>
		</div>

		<div style="background:#FFF; padding:22px 20px; border-radius:var(--radius-lg); border:1px solid var(--border-light); box-shadow:var(--shadow-subtle); display:flex; align-items:center; gap:16px;">
			<div style="width:52px; height:52px; border-radius:50%; background:#F3E8EE; color:var(--admin-accent); display:flex; align-items:center; justify-content:center; font-size:1.4rem;">
				<i class="fa-solid fa-comments"></i>
			</div>
			<div>
				<span style="font-size:0.82rem; color:var(--text-secondary); font-weight:600; text-transform:uppercase;">Feedbacks</span>
				<div style="font-family:var(--font-heading); font-size:1.8rem; font-weight:800; color:var(--text-primary);"><?php echo $countFeed; ?></div>
			</div>
		</div>
	</div>

	<!-- Quick Action Shortcuts -->
	<div style="background:var(--bg-subtle); padding:26px 30px; border-radius:var(--radius-lg); border:1px solid var(--border-light);">
		<h3 style="font-family:var(--font-heading); font-size:1.25rem; margin-bottom:14px; color:var(--text-primary);">
			Quick Management Actions
		</h3>
		<div style="display:flex; gap:14px; flex-wrap:wrap;">
			<a href="index.php?page=product" class="btn">
				<i class="fa-solid fa-circle-plus"></i> Add New Product
			</a>
			<a href="index.php?page=category" class="btn btn-secondary">
				<i class="fa-solid fa-folder-plus"></i> Add Category
			</a>
			<a href="index.php?page=viewpurchase" class="btn btn-secondary">
				<i class="fa-solid fa-box"></i> View Orders
			</a>
			<a href="index.php?page=viewfeedback" class="btn btn-secondary">
				<i class="fa-solid fa-envelope-open-text"></i> View Feedback
			</a>
		</div>
	</div>
</div>
