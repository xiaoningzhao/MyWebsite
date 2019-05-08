<?php
	include_once('session.php');
?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>Review</title>
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
						<div class="row gtr-150">
							<div class="col-8 col-12-medium imp-medium">
									<section id="content">

									<?php

										extract($_POST);

										if($rate==null){$rate=0;}
										
										$query = "INSERT INTO  review (productID, review, rating, userID, timedate) VALUES ('$productID', '$review', $rate, null ,now())";
										if($session_login==true){
											$query = "INSERT INTO  review (productID, review, rating, userID, timedate) VALUES ('$productID', '$review', $rate, '$session_userid',now())";
										}

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

										$result = $conn->query($query);

										if ($result==true) {
											echo "<header class='major'><h2>Rating Successful!<h2></header>";
										}else{
											echo "<header class='major'><h2>Rating Failed! ".$conn->error."</h2></header>";
										}
										$conn->close();
									?>

									</section>

									<section>
										<ul class="actions">
											<li><a href="#" class="button primary" onclick = "self.location=document.referrer;">Back</a></li>
										</ul>
									</section>

							</div>
						</div>
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