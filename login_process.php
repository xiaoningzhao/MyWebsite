<?php
	include_once('session.php');

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

	$query = "SELECT userID, first_name, last_name FROM userinfo WHERE userID = '$userID' and password = '".md5($password)."'";

	$result = $conn->query($query);

	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();

	    $_SESSION["session_login"] = true;
	    $_SESSION["session_userid"] = $row['userID'];
	    $_SESSION["session_name"] = $row['first_name'].", ".$row['last_name'];
 		
 		header("Refresh:1;url=index.php");
 		echo "<header class='major'><h2>Welcome ".$_SESSION["session_name"]."! Login Successful.</h2></header>";


	}else{
		header("Refresh:1;url=login.php");
		echo "<header class='major'><h2>Login Failed.</h2></header>";
	}
	$conn->close();
?>
