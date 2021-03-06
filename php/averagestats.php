<?php
	require_once "connection-info.php";
	$query = 
	"SELECT ROUND(total_insertions/unique_time, 2) as avg_insertions FROM (

	(SELECT SUM(the_count) as total_insertions FROM (
	SELECT DATE(Insertions) as the_date,
	HOUR(Insertions) as the_hour,
	COUNT(*) as the_count
	FROM Statistics WHERE Insertions IS NOT NULL
	GROUP BY the_date, the_hour
	) s1) a1
	,

	(SELECT COUNT(*) as unique_time FROM (
	SELECT DATE(Timestamp) as the_date,
	HOUR(Timestamp) as the_hour,
	COUNT(*) as the_count
	FROM Statistics
	GROUP BY the_date, the_hour
	) s1) a2
	)";

	$result = mysqli_query($mycon, $query);
	if($result) {
		while($row = mysqli_fetch_array($result)) {
			echo $row['avg_insertions'];
		}
	} else {
		echo "N/A";
	}

	mysqli_close($mycon);
?>