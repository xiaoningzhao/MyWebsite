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
								<h3>Search results</h3>
								<div class="table-wrapper">
									<table>
										<thead>
											<tr>
												<th>First Name</th>
												<th>Last Name</th>
												<th>Email</th>
												<th>Home Address</th>
												<th>Home Phone</th>
												<th>Cellphone</th>
											</tr>
										</thead>

										<?php

											extract($_POST);

											$query = "SELECT first_name, last_name, email, home_address, home_phone, cellphone from userinfo ";
											$where = "";
											if($first_name != ""){
												$where = $where."first_name='".$first_name."' ";
											}
											if($last_name != ""){
												if($where !=""){
													$where = $where."and last_name='".$last_name."' ";
												}else{
													$where = $where."last_name='".$last_name."' ";
												}
											}
											if($email != ""){
												if($where !=""){
													$where = $where."and email='".$email."' ";
												}else{
													$where = $where."email='".$email."' ";
												}
											}
											if($home_phone != ""){
												if($where !=""){
													$where = $where."and home_phone='".$home_phone."' ";
												}else{
													$where = $where."home_phone='".$home_phone."' ";
												}
											}
											if($cellphone != ""){
												if($where !=""){
													$where = $where."and cellphone='".$cellphone."' ";
												}else{
													$where = $where."cellphone='".$cellphone."' ";
												}
											}
											if($where != ""){
												$query = $query."where ".$where; 
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

											if ($result->num_rows > 0) {
												print("<tbody>");

												while($row = $result->fetch_assoc()) {
													print("<tr>");
													foreach($row as $key => $value){
														print("<td>$value</td>");
													}
													print("</tr>");
												}

												print("</tbody>");
											}

											$conn->close();
										?>
									</table>
								</div>
							</section>

							<section>
								<ul class="actions">
									<li><a href="user.php" class="button primary">Back</a></li>
								</ul>
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