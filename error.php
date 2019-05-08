<?php
	include_once('session.php');
?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>Error</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">
		<div id="page-wrapper">

			<?php 
				include 'header.php';
			?>

			<!-- Main -->
				<div id="main" class="wrapper style1">
					<div class="container">
						<header class="major">
							<h2>Error</h2>
							<p>Please Login to access information.</p>
						</header>
						<!-- Form -->
							<section>
								<form method="post" action="Contacts.php">
									<div class="row gtr-uniform gtr-50">
										<div class="col-12-xsmall">
											<input type="text" name="name" id="name" value="" placeholder="Username" />
										</div>
										<br>
										<div class="col-12-xsmall">
											<input type="password" name="password" id="password" value="" placeholder="Password" />
										</div>
										<div class="col-12">
											<ul class="actions">
												<li><input type="submit" value="Submit" class="primary" /></li>
												<li><input type="reset" value="Reset" /></li>
											</ul>
										</div>
									</div>
								</form>
							</section>
					</div>
				</div>

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