<?php
	include_once('session.php');
?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>X Consulting</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload landing">
		<div id="page-wrapper">

			<?php 
				include 'header.php';
			?>

			<!-- Banner -->
				<section id="banner">
					<div class="content">
						<header>
							<h2>Let Your Business Run Better With X</h2>
							<p>For course CMPE-272<br />
							Enterprise Software Platform</p>
						</header>
						<span class="image"><img src="images/Bulb.png" alt="" /></span>
					</div>
					<a href="#one" class="goto-next scrolly">Next</a>
				</section>

			<!-- One -->
				<section id="one" class="spotlight style1 bottom">
					<span class="image fit main"><img src="images/pic02.jpg" alt="" /></span>
					<div class="content">
						<div class="container">
							<div class="row">
								<div class="col-4 col-12-medium">
									<header>
										<h2>Business Strategy</h2>
										<p>Beyond a plan</p>
									</header>
								</div>
								<div class="col-4 col-12-medium">
									<p>We help clients improve performance by designing portfolios—supported by resource reallocation, integrated business-unit strategies, and planning processes—that position them for success.</p>
									<ul class="actions">
										<li><a href="Business_Strategy.html" class="button">Learn More</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<a href="#two" class="goto-next scrolly">Next</a>
				</section>

			<!-- Two -->
				<section id="two" class="spotlight style2 right">
					<span class="image fit main"><img src="images/pic03.jpg" alt="" /></span>
					<div class="content">
						<header>
							<h2>Sales & Marketing</h2>
							<p>Start with customer pain points</p>
						</header>
						<p>We help clients make lasting improvements to the effectiveness of their sales investments and interactions with customers across all channels to drive sales growth.</p>
						<ul class="actions">
							<li><a href="Sales_Marketing.html" class="button">Learn More</a></li>
						</ul>
					</div>
					<a href="#three" class="goto-next scrolly">Next</a>
				</section>

			<!-- Three -->
				<section id="three" class="spotlight style3 left">
					<span class="image fit main bottom"><img src="images/pic04.jpg" alt="" /></span>
					<div class="content">
						<header>
							<h2>Information Technology</h2>
							<p>Business accelerator</p>
						</header>
						<p>We know how technology and digital trends are transforming your environment. We’ll uncover where the real value exists for you.</p>
						<ul class="actions">
							<li><a href="Information_Technology.html" class="button">Learn More</a></li>
						</ul>
					</div>
				</section>
			
			<?php 
				include 'footer.php';
			?>
		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
	</body>
</html>