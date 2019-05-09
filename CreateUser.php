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
							<h2>User Information</h2>
						</header>

						<!-- Table -->
							<section>
								<div class="table-wrapper">
										<?php

											extract($_POST);

											$json_db = file_get_contents('db.json');
											$db = json_decode($json_db, true);

											$db_servername = $db['servername'];
											$db_username = $db['username'];
											$db_password = $db['password'];
											$db_dbname = $db['dbname'];

											$conn = new mysqli($db_servername, $db_username, $db_password, $db_dbname);
											
											if ($conn->connect_error) {
												die("Could not connect database.".$conn->connect_error);
											}

											$sql = $conn->prepare("INSERT INTO userinfo (first_name, last_name, email, home_address, home_phone, cellphone) VALUES (?, ?, ?, ?, ?, ?)");
											$sql->bind_param("ssssss", $first_name, $last_name, $email, $home_address, $home_phone, $cellphone);

											$sql->execute();

											echo "<b>User Created </b><br>";
											echo "First Name: ".$first_name."<br>"."Last Name: ".$last_name."<br>"."Email: ".$email."<br>"."Home Address: ".$home_address."<br>"."Home Phone: ".$home_phone."<br>"."Cellphone: ".$cellphone;
 
											$sql->close();
											$conn->close();
										?>
								</div>

						<!-- Buttons -->
							<section>
								<ul class="actions">
									<li><a href="user.php" class="button primary">Back</a></li>
								</ul>
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