<?php
	if($_SERVER['REQUEST_METHOD']=='GET') {
		require_once "connection-info.php";
		$query = "SELECT * FROM Records";
		$result = mysqli_query($mycon, $query);
		echo "<table border='1'>
				<tr>
				<th>Name</th>
				<th>Phone Number</th>
				<th>UserID</th>
				</tr>";
		while($row = mysqli_fetch_array($result)) {
			echo "<tr>";
			echo "<td>" . $row['Name'] . "</td>";
			echo "<td>" . $row['Phone'] . "</td>";
			echo "<td>" . $row['UserID'] . "</td>";
			echo "</tr>";
		}
		echo "</table>";
	
		if (!$result) {
			echo "An unexpected error has occurred.";
		}
	
		mysqli_close($mycon);
	}
?>