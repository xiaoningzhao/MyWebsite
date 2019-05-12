<?php
	include_once('session.php');
	
	extract($_GET);
	
	$json_db = file_get_contents('db.json');
	$db = json_decode($json_db, true);

	$db_servername = $db['servername'];
	$db_username = $db['username'];
	$db_password = $db['password'];
	$db_dbname = $db['dbname'];

	$productName = "";
	$productDescription = "";
	$productImage = "";

	$rating_count = array(0,0,0,0,0,0);
	$rating_total = 0;
	$rating_avg = 0.0;

	$conn = new mysqli($db_servername, $db_username, $db_password, $db_dbname);
	
	if ($conn->connect_error) {
		die("Could not connect database.".$conn->connect_error);
	}

	if($session_login==true){
		$query_insert_history = "INSERT INTO product_access_history (productID, userID, timedate) VALUES ('$productID', '$session_userid', now())";
		$result_insert_history = $conn->query($query_insert_history);
		// if ($result_insert_history==true) {
		// 	echo "<header class='major'><h2>Successful!<h2></header>";
		// }else{
		// 	echo "<header class='major'><h2>Failed! ".$conn->error."</h2></header>";
		// }
	}

	$query = "SELECT productID, productName, productDescription, productImage FROM product WHERE productID = '$productID'";

	$result = $conn->query($query);

	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$productName = $row['productName'];
		$productDescription = $row['productDescription'];
		$productImage = $row['productImage'];
	}

	$query_rating = "SELECT rating, count(rating) as ratingcount FROM review WHERE productID = '$productID' GROUP BY rating";
	$result = $conn->query($query_rating);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			switch ($row['rating']) {
				case '0':
					$rating_count[0] = $row['ratingcount'];
					break;
				case '1':
					$rating_count[1] = $row['ratingcount'];
					break;				
				case '2':
					$rating_count[2] = $row['ratingcount'];
					break;
				case '3':
					$rating_count[3] = $row['ratingcount'];
					break;
				case '4':
					$rating_count[4] = $row['ratingcount'];
					break;
				case '5':
					$rating_count[5] = $row['ratingcount'];
					break;				
				default:
					break;
			};
		}
	}

	$rating_total = $rating_count[0]+$rating_count[1]+$rating_count[2]+$rating_count[3]+$rating_count[4]+$rating_count[5];
	$rating_avg = 0;
	if($rating_total != 0){
		$rating_avg = ($rating_count[1]+$rating_count[2]*2+$rating_count[3]*3+$rating_count[4]*4+$rating_count[5]*5)/$rating_total;
	}

	$query_review = "SELECT review, rating, userID, timedate FROM review WHERE productID = '$productID' ORDER BY timedate DESC";
	$result_review = $conn->query($query_review);

	$conn->close();

	$expire=time()+60*60*24*7;
	$page_id=$productName;

	if(isset($_COOKIE['recent_page'])){
		$page = $_COOKIE['recent_page'];
		$arr = unserialize($page);
		array_unshift($arr, $page_id);
		$arr = array_unique($arr);
		if(count($arr)>5){
			array_pop($arr);
		}
		$page = serialize($arr);
		setcookie('recent_page',$page, $expire,"/");
	}else{
		$arr = array($page_id);
		$page = serialize($arr);
		setcookie('recent_page',$page, $expire,"/");
	}

	if(isset($_COOKIE['page_visits'])){
		$page_visits = $_COOKIE['page_visits'];
		$arr_visits = unserialize($page_visits);
		if(array_key_exists($page_id,$arr_visits)){
			$arr_visits[$page_id] = $arr_visits[$page_id] + 1;
		}else{
			$arr_visits[$page_id] = 1;
		}
		$page_visits = serialize($arr_visits);
		setcookie('page_visits',$page_visits, $expire, "/");
	}else{
		$arr_visits = array($page_id => 1);
		$page_visits = serialize($arr_visits);
		setcookie('page_visits', $page_visits, $expire, "/"); 
	}
?>

<!DOCTYPE HTML>

<html>
	<head>
		<title><?php echo $productName; ?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="/assets/css/main.css" />
		<noscript><link rel="stylesheet" href="/assets/css/noscript.css" /></noscript>
		<link rel="stylesheet" href="/assets/css/rating.css" />

		<style>
		/* Individual bars */
		.bar-5 {width: <?php if($rating_total != 0){echo ($rating_count[5]*100/$rating_total)."%";}else{echo "0%";} ?>; height: 18px; background-color: #4CAF50;}
		.bar-4 {width: <?php if($rating_total != 0){echo ($rating_count[4]*100/$rating_total)."%";}else{echo "0%";} ?>; height: 18px; background-color: #2196F3;}
		.bar-3 {width: <?php if($rating_total != 0){echo ($rating_count[3]*100/$rating_total)."%";}else{echo "0%";} ?>; height: 18px; background-color: #00bcd4;}
		.bar-2 {width: <?php if($rating_total != 0){echo ($rating_count[2]*100/$rating_total)."%";}else{echo "0%";} ?>; height: 18px; background-color: #ff9800;}
		.bar-1 {width: <?php if($rating_total != 0){echo ($rating_count[1]*100/$rating_total)."%";}else{echo "0%";} ?>; height: 18px; background-color: #f44336;}
		.bar-0 {width: <?php if($rating_total != 0){echo ($rating_count[0]*100/$rating_total)."%";}else{echo "0%";} ?>; height: 18px; background-color: purple;}
		</style>

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
							<h2><?php echo $productName; ?></h2>
							<p></p>
						</header>
						<!-- Content -->
							<section id="content">
								<img src=<?php echo "'$productImage'"; ?> width="60%" height="60%" alt="" />
								<?php
									echo "<h3>$productName</h3><p>$productDescription</p>"
								?>

							<hr>
							<div class="col-6">
								<h3>User Rating</h3>
								<?php
									for($i=0; $i<round($rating_avg); $i++){
										echo "<span class='fa fa-star checked'></span>";
									}
									for($i=5; $i>round($rating_avg); $i--){
										echo "<span class='fa fa-star'></span>";
									}
									echo "<p>".round($rating_avg,1)." average based on $rating_total reviews.</p>"; 
								?>

								<div class="row">
								  <div class="side">
								    <div>5 star</div>
								  </div>
								  <div class="middle">
								    <div class="bar-container">
								      <div class="bar-5"></div>
								    </div>
								  </div>
								  <div class="side right">
								    <div><?php echo $rating_count[5];?></div>
								  </div>
								  <div class="side">
								    <div>4 star</div>
								  </div>
								  <div class="middle">
								    <div class="bar-container">
								      <div class="bar-4"></div>
								    </div>
								  </div>
								  <div class="side right">
								    <div><?php echo $rating_count[4];?></div>
								  </div>
								  <div class="side">
								    <div>3 star</div>
								  </div>
								  <div class="middle">
								    <div class="bar-container">
								      <div class="bar-3"></div>
								    </div>
								  </div>
								  <div class="side right">
								    <div><?php echo $rating_count[3];?></div>
								  </div>
								  <div class="side">
								    <div>2 star</div>
								  </div>
								  <div class="middle">
								    <div class="bar-container">
								      <div class="bar-2"></div>
								    </div>
								  </div>
								  <div class="side right">
								    <div><?php echo $rating_count[2];?></div>
								  </div>
								  <div class="side">
								    <div>1 star</div>
								  </div>
								  <div class="middle">
								    <div class="bar-container">
								      <div class="bar-1"></div>
								    </div>
								  </div>
								  <div class="side right">
								    <div><?php echo $rating_count[1];?></div>
								  </div>
								   <div class="side">
								    <div>0 star</div>
								  </div>
								  <div class="middle">
								    <div class="bar-container">
								      <div class="bar-0"></div>
								    </div>
								  </div>
								  <div class="side right">
								    <div><?php echo $rating_count[0];?></div>
								  </div>
								</div>
							</div>
							<hr>

								<h4>Rating this service</h4>
								<form method="post" action="/review.php">
									<div class="rate">
										<input type="radio" id="star5" name="rate" value="5" />
										<label for="star5" title="5">5 stars</label>
										<input type="radio" id="star4" name="rate" value="4" />
										<label for="star4" title="4">4 stars</label>
										<input type="radio" id="star3" name="rate" value="3" />
										<label for="star3" title="3">3 stars</label>
										<input type="radio" id="star2" name="rate" value="2" />
										<label for="star2" title="2">2 stars</label>
										<input type="radio" id="star1" name="rate" value="1" />
										<label for="star1" title="1">1 star</label>
									</div>
									<div class="col-12">
											<textarea name="review" id="review" placeholder="Enter your review" rows="6"></textarea>
									</div>
									<?php echo "<div class='col-12'><input type='hidden' name='productID' id='productID' value='$productID' /></div>"; ?>
									<br>
									<div class="col-12">
										<ul class="actions">
											<li><input type="submit" value="Submit" class="primary" /></li>
											<li><input type="reset" value="Reset" /></li>
										</ul>
									</div>
								</form>
							</section>

							<section class="col-12">
								<h4>Reviews</h4>

								<?php 
									if ($result_review->num_rows > 0) {
										while($row = $result_review->fetch_assoc()) {

											$user_id = $row['userID'];

											if($row['userID']==null){
												$user_id = "Anonymous";
											}

											echo "<h5>From user ".$user_id.". at ".$row['timedate']."</h5>";

											for($i=0; $i<round($row['rating']); $i++){
												echo "<span class='fa fa-star checked'></span>";
											}
											for($i=5; $i>round($row['rating']); $i--){
												echo "<span class='fa fa-star'></span>";
											}
											echo "<p>Review: ".$row['review']."</p>";
											echo "<hr>";
										}
									}

								?>
							</section>


					</div>
				</div>

			<?php 
				include 'footer.php';
			?>

		</div>

		<!-- Scripts -->
			<script src="/assets/js/jquery.min.js"></script>
			<script src="/assets/js/jquery.scrolly.min.js"></script>
			<script src="/assets/js/jquery.dropotron.min.js"></script>
			<script src="/assets/js/jquery.scrollex.min.js"></script>
			<script src="/assets/js/browser.min.js"></script>
			<script src="/assets/js/breakpoints.min.js"></script>
			<script src="/assets/js/util.js"></script>
			<script src="/assets/js/main.js"></script>

	</body>
</html>