<?php
	include_once('session.php');
?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>Contacts</title>
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
							<h2>Contacts</h2>
						</header>

						<!-- Content -->
							<section id="content">
								<!--<a href="#" class="image fit"><img src="images/pic07.jpg" alt="" /></a>-->
								<h3>
								<?php
									extract($_POST);

									if($session_login === true){
										$contact=file("./contacts.txt");
										foreach ($contact as $line)
										{
											$item = explode(" ", $line);
											foreach ($item as $value)
											{
												echo $value ."<br>";
											}
												echo "<br>";
										}
										die();
									}else{
										echo "Please sign in to access contacts information";
									}
								?>
								</h3>

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
