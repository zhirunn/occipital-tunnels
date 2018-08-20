<?php
	if($_SERVER['REQUEST_METHOD']=='POST') {
		$name = trim($_POST['Name']);
		$phone = $_POST['Phone'];
		$userid = mt_rand(1000000000, 9999999999);
		require_once "connection-info.php";
		$query = "INSERT INTO Records (Name, Phone, UserID) VALUES ('$name', '$phone', '$userid');";
		$query .= "INSERT INTO Statistics (Insertions, Timestamp) VALUES (NOW(), NOW())";
		$result = mysqli_multi_query($mycon, $query);
		if($result) {
			echo "Record has been successfully added.";
		} else {
			echo "Record could not be added.";
		}

		if (!$result) {
			echo "An unexpected error has occurred.";
		}
		
		mysqli_close($mycon);
	}
?>