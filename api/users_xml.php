	<?php
		$query = "SELECT first_name, last_name, email, home_address, home_phone, cellphone from userinfo";

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

		$doc = new DOMDocument('1.0', 'utf-8');
		$doc->formatOutput = true;
		$r = $doc->createElement("root");
		$doc->appendChild($r);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$b = $doc->createElement("data");

				foreach($row as $key => $value){
					$v = $doc->createElement("$key");
					$v->appendChild($doc->createTextNode($value));
					$b->appendChild($v);
				}
				$r->appendChild($b);
			}
			echo $doc->saveXML();
		}

		$conn->close();
	?>
