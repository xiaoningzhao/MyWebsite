<?php
	include_once('session.php');
?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>User</title>
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
							<h2>User</h2>
							<p>Create or Search user</p>
						</header>

						<!-- Form -->
							<section>
								<h3>Create User</h3>
								<form method="post" action="CreateUser.php">
									<div class="row gtr-uniform gtr-50">
										<div class="col-4 col-12-xsmall">
											<input type="text" name="first_name" id="first_name" value="" placeholder="*First Name" required/>
										</div>
										<div class="col-4 col-12-xsmall">
											<input type="text" name="last_name" id="last_name" value="" placeholder="*Last Name" required/>
										</div>
										<div class="col-4 col-12-xsmall">
											<input type="email" name="email" id="email" value="" placeholder="Email" />
										</div>
										<div class="col-12 col-12-xsmall">
											<input type="text" name="home_address" id="home_address" value="" placeholder="Home Address" />
										</div>
										<div class="col-6 col-12-xsmall">
											<input type="text" name="home_phone" id="home_phone" value="" placeholder="Home Phone" />
										</div>
										<div class="col-6 col-12-xsmall">
											<input type="text" name="cellphone" id="cellphone" value="" placeholder="Cellphone" />
										</div>
										<div class="col-12">
											<ul class="actions">
												<li><input type="submit" value="Create" class="primary" /></li>
												<li><input type="reset" value="Reset" /></li>
											</ul>
										</div>
									</div>
								</form>
							</section>

							* Required field

							<hr />


							<section>
								<h3>Search User</h3>
								<form method="post" action="SearchUsers.php">
									<div class="row gtr-uniform gtr-50">
										<div class="col-4 col-12-xsmall">
											<input type="text" name="first_name" id="first_name" value="" placeholder="First Name" />
										</div>
										<div class="col-4 col-12-xsmall">
											<input type="text" name="last_name" id="last_name" value="" placeholder="Last Name" />
										</div>
										<div class="col-4 col-12-xsmall">
											<input type="email" name="email" id="email" value="" placeholder="Email" />
										</div>
										<div class="col-6 col-12-xsmall">
											<input type="text" name="home_phone" id="home_phone" value="" placeholder="Home Phone" />
										</div>
										<div class="col-6 col-12-xsmall">
											<input type="text" name="cellphone" id="cellphone" value="" placeholder="Cellphone" />
										</div>
										<div class="col-12">
											<ul class="actions">
												<li><input type="submit" value="Search" class="primary" /></li>
												<li><input type="reset" value="Reset" /></li>
											</ul>
										</div>
									</div>
								</form>
							</section>

							<hr />


							<section>
								<h3>List All Users</h3>
								<form method="post" action="ListUsers.php">
											<ul class="actions">
												<li><input type="submit" value="List" class="primary" /></li>
												<li><input type="reset" value="Reset" /></li>
											</ul>
										</div>
									</div>
								</form>
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