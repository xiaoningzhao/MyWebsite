<?php
	include_once('session.php');
?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>Services</title>
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
							<h2>Services</h2>
						</header>
						<div class="row gtr-150">
							<div class="col-4 col-12-medium">

								<!-- Sidebar -->
									<section id="sidebar">
										<section>
											<h3>Services List</h3>
											<h4>Business Strategy</h4>
											<li><a href="/service_detail.php?productID=00001">Business Analysis</a></li>
											<li><a href="/service_detail.php?productID=00002">Business Planning</a></li>
											<li><a href="/service_detail.php?productID=00003">Strategy Execution and Evaluation</a></li>
											
											<hr />

											<h4>Sales & Marketing</h4>
											<li><a href="/service_detail.php?productID=00004">Sales Management</a></li>
											<li><a href="/service_detail.php?productID=00005">Customer Lifecycle Management</a></li>
											<li><a href="/service_detail.php?productID=00006">Branding</a></li>
											<li><a href="/service_detail.php?productID=00007">Digital Marketing</a></li>
											
											<hr />

											<h4>Information Technology</h4>
											<li><a href="/service_detail.php?productID=00008">Strategic IT Planning</a></li>
											<li><a href="/service_detail.php?productID=00009">Digital Transformation</a></li>
											<li><a href="/service_detail.php?productID=00010">IT Security</a></li>

										</section>
									</section>

							</div>
							<div class="col-8 col-12-medium imp-medium">

								<!-- Content -->
									<section id="content">

									<?php
										$query = "SELECT p.productID, p.productName, count(ph.productID) AS Visit FROM product p LEFT JOIN product_access_history ph ON p.productID = ph.productID GROUP BY p.productID, p.productName ORDER BY Visit DESC";

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

										$jarr = "[['Services', 'Visit']";

										if ($result->num_rows > 0) {

											while($row = $result->fetch_assoc()) {
												$jarr = $jarr.",['".$row['productName']."',".$row['Visit']."]";
											}
										}

										$jarr = $jarr."]";

										$conn->close();
									?>

									<h3>Most Popular Services</h3>
									<div id="piechart" class="col-6"></div>

									<hr>
										
									<div class="col-3">
									<h3>Services Visited Statistics</h3>
									<h4>Recent 5 visited pages.</h4>
									<?php
									if(isset($_COOKIE['recent_page'])){
										$page = $_COOKIE['recent_page'];
										$arr = unserialize($page);
										foreach($arr as $v){
											echo $v."<br>";
										}
									}
									?>

									</div>
									
									<div class="col-3">
									<h4>Most visited pages</h4>

									<?php
									if(isset($_COOKIE['page_visits'])){
										$page_visits = $_COOKIE['page_visits'];
										$arr_visits = unserialize($page_visits);
										arsort($arr_visits);
										foreach($arr_visits as $key => $v){
											echo $key."  - times visit: ".$v."<br>";
										}
									}
									?>
									</div>
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

			<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
			<script type="text/javascript">
				// Load google charts
				google.charts.load('current', {'packages':['corechart']});
				google.charts.setOnLoadCallback(drawChart);

				var rawdata = <?php echo $jarr; ?>;

				// Draw the chart and set the chart values
				function drawChart() {
				  var data = google.visualization.arrayToDataTable(rawdata);

				  // Optional; add a title and set the width and height of the chart
				  var options = {'height':400, backgroundColor:'transparent', legend:{textStyle: {color: 'white'}}};

				  // Display the chart inside the <div> element with id="piechart"
				  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
				  chart.draw(data, options);
				}
			</script>


	</body>
</html>