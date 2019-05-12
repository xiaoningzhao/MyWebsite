<?php
	include_once('session.php');
?>
<!-- Header -->
<header id="header">
	<h1 id="logo"><a href="index.php">X Consulting</a></h1>
	<nav id="nav">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="about.php">About</a></li>
			<li>
				<a href="services.php">Services</a>
				<ul>
					<li><a href="business_strategy.php">Business Strategy</a>
						<ul>
							<li><a href="/service_detail.php?productID=00001">Business Analysis</a></li>
							<li><a href="/service_detail.php?productID=00002">Business Planning</a></li>
							<li><a href="/service_detail.php?productID=00003">Strategy Execution & Evaluation</a></li>
						</ul>
					</li>
					<li><a href="sales_marketing.php">Sales & Marketing</a>
						<ul>
							<li><a href="/service_detail.php?productID=00004">Sales Management</a></li>
							<li><a href="/service_detail.php?productID=00005">Customer Lifecycle Management</a></li>
							<li><a href="/service_detail.php?productID=00006">Branding</a></li>
							<li><a href="/service_detail.php?productID=00007">Digital Marketing</a></li>
						</ul>
					</li>
					<li><a href="information_technology.php">Information Technology</a>
						<ul>
							<li><a href="/service_detail.php?productID=00008">Strategic IT Planning</a></li>
							<li><a href="/service_detail.php?productID=00009">Digital Transformation</a></li>
							<li><a href="/service_detail.php?productID=00010">IT Security</a></li>
						</ul>
					</li>
				</ul>
			</li>
			<li><a href="news.php">News</a></li>
			<li><a href="Contacts.php">Contacts</a></li>
			<li><a href="user.php">User</a></li>
			<?php 
				if($session_login==true){
					echo "<li>Welcome <b>$session_name</b> <a href='logout.php' class='button primary'>Sign Out</a></li>";
				}else{
					echo "<li><a href='login.php' class='button primary'>Sign In</a></li>";
				}
			?>
		</ul>
	</nav>
</header>