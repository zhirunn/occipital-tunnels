<?php
	if($_SERVER['REQUEST_METHOD']=='POST') {
		$userid = $_POST['UserID'];
		require_once "connection-info.php";
		$check = mysqli_query($mycon, "SELECT * FROM Records WHERE UserID = '$userid'");
		if (mysqli_num_rows($check) == 0) { 
			echo "This record does not exist.";
		} else {
			$query = "DELETE FROM Records WHERE UserID = '$userid';";
			$query .= "INSERT INTO Statistics (Deletions, Timestamp) VALUES (NOW(), NOW())";
			$result = mysqli_multi_query($mycon, $query);
			if($result) {
				echo "Record has been successfully deleted.";
			} else {
				echo "Record could not be deleted.";
			}
			
			if (!$result) {
				echo "An unexpected error has occurred.";
			}
		}
		
		mysqli_close($mycon);
	}
?>