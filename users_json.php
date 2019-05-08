<?php
	header('Content-Type: application/json');
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

	$jarr = array();

	if ($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			array_push($jarr,$row);
		}
	}

	$conn->close();

	echo json_encode($jarr);

?>