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

											$query = "INSERT INTO userinfo (userID, password, first_name, last_name, email, home_address, home_phone, cellphone) VALUES ('$userID','".md5($password)."','$first_name','$last_name','$email', '$home_address','$home_phone','$cellphone')";
											$result = $conn->query($query);

											
											if ($result===true) {
												echo "<header class='major'><h2>Sign Up Successful!<h2></header>";
											}else{
												echo "<header class='major'><h2>Sign Up Failed! ".$conn->error."</h2></header>";
											}
 
											$conn->close();
										?>
								</div>

						<!-- Buttons -->
							<section>
								<ul class="actions">
									<li><a href="login.php" class="button primary">Back</a></li>
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