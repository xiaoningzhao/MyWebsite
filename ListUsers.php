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
									<h4>Users from this website</h4>
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

											$query = "SELECT first_name, last_name, email, home_address, home_phone, cellphone from userinfo";

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
								<h4>Users from <u><a href="http://zhiyuanyao.net">EPIC HELI SKIING</a></u></h4>
								<?php
									$ch = curl_init();

									curl_setopt($ch,CURLOPT_URL,"http://zhiyuanyao.net/users_list.php");
									curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
									curl_setopt($ch,CURLOPT_HEADER,0);

									$output = curl_exec($ch);
									if($output === FALSE ){
										echo "CURL Error:".curl_error($ch);
									}
										echo $output;
									curl_close($ch);
								
									// $ch = curl_init();

									// curl_setopt($ch,CURLOPT_URL,"https://xiaoningzhao.com/users_json.php");
									// curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
									// curl_setopt($ch,CURLOPT_HEADER,0);

									// $output = curl_exec($ch);
									// if($output === FALSE ){
									// 	echo "CURL Error:".curl_error($ch);
									// }else{
									// 	$arr=json_decode($output);
									// 	print("<table><tbody>");

									// 	foreach($arr as $row => $value)
									// 	{
									// 		print("<tr>");
									// 		foreach($value as $item => $v)
									// 		{
									// 			print("<td>$v</td>");
									// 		}											
									// 		print("</tr>");
									// 	}
									// 	print("</tbody></table>");

									// }
										
									// curl_close($ch);
								?>
							</section>

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