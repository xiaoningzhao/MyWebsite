<?php
	extract($_POST);

	header('Content-Type: application/json');

	$query = "INSERT INTO userinfo (userID, password, first_name, last_name, email, home_address, home_phone, cellphone) VALUES ('$userID','$password','$first_name','$last_name','$email', '$home_address','$home_phone','$cellphone')";

	$json_db = file_get_contents('../db.json');
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
		$jarr = array("result" => true);
		echo json_encode($jarr);
	}else{
		$jarr = array("result" => false);
		echo json_encode($jarr);		
	}

	$conn->close();

?>