<?php
	require_once "connection-info.php";
	
	$query_insertion = 
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
	
	$query_deletion = 
	"SELECT ROUND(total_deletions/unique_time, 2) as avg_deletions FROM (

	(SELECT SUM(the_count) as total_deletions FROM (
	SELECT DATE(Deletions) as the_date,
	HOUR(Deletions) as the_hour,
	COUNT(*) as the_count
	FROM Statistics WHERE Deletions IS NOT NULL
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

	$result_insertion = mysqli_query($mycon, $query_insertion);	
	$result_deletion = mysqli_query($mycon, $query_deletion);	
	
	if (!$result_insertion || !$result_deletion) {
		echo "N/A";
	}
	
	if($result_insertion) {
		while($row = mysqli_fetch_array($result_insertion)) {
			echo $row['avg_insertions'];
		}
	}
	
	echo " records added per ";
	
	if($result_deletion) {
		while($row = mysqli_fetch_array($result_deletion)) {
			echo $row['avg_deletions'];
		}
	}
	
	echo " records deleted.";
	
	mysqli_close($mycon);
?>