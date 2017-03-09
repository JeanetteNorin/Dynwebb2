<!DOCTYPE html>
<html>
<head>
<title>Blogg</title>
<meta http-equiv="Content-Type" content="text/html" />
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

<?php
date_default_timezone_set('Europe/Stockholm');
include 'common.library.php';
include 'header.php';
db_connect();

$query = "SELECT date_time, text, title, catid FROM blog
  ORDER BY date_time DESC";

$result = mysql_query($query);
while (list($date, $text, $title, $catid) = mysql_fetch_row($result)) {
	$query2 = "SELECT category FROM cat WHERE catid='$catid'";
	$result2 = mysql_query($query2);
	while ($row2 = mysql_fetch_array($result2)) {
		$cat = $row2['category'];
	}
	echo "<h2>$title</h2>";
	echo "<p>$text</p>";
	echo "<p>@ $date, kategori: $cat</p>";
	
}
 
?>

</body>
</html>
