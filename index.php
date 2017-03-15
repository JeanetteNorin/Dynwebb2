<?php
date_default_timezone_set('Europe/Stockholm');
include 'common.library.php';
include 'header.php';

// Performs a query to the database
$query = "SELECT date_time, text, title, catid FROM blog
		 ORDER BY date_time DESC";
$result = mysqli_query($conn, $query);

// Loops through query and shows result
while (list($date, $text, $title, $catid) = mysqli_fetch_row($result)) {
	$query2 = "SELECT category FROM cat WHERE catid='$catid'";
	$result2 = mysqli_query($conn, $query2);
	while ($row2 = mysqli_fetch_array($result2)) {
		$cat = $row2['category'];
	}
	echo "<div class=blog_posts>
		  <div class=blog_title><h2>$title</h2></div>
	      <div class=blog_content><p>$text</p></div>
	      <div class=blog_footer><p> $date <br> Category: $cat</p></div></div>";
}
?>

</body>
</html>

