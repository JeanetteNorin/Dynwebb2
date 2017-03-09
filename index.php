<?php
date_default_timezone_set('Europe/Stockholm');
include 'common.library.php';
include 'header.php';
db_connect();

$query = "SELECT date_time, text, title, catid FROM blog
  ORDER BY date_time DESC";

$query = "SELECT date_time, text, title, catid FROM blog
  ORDER BY date_time DESC";

$result = mysqli_query($conn, $query);
while (list($date, $text, $title, $catid) = mysqli_fetch_row($result)) {
	$query2 = "SELECT category FROM cat WHERE catid='$catid'";
	$result2 = mysqli_query($conn, $query2);
	while ($row2 = mysqli_fetch_array($result2)) {

		$cat = $row2['category'];
	}
	echo "<h2>$title</h2>";
	echo "<p>$text</p>";
	echo "<p>@ $date, kategori: $cat</p>";
}

?>


	
}
 
?>

</body>
</html>
