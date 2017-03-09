<!DOCTYPE html>
<html>
<head>
<title>Delete post</title>
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
					
if ($_GET['id']) {
  $id = $_GET['id'];
  $query = "DELETE FROM blog WHERE id='$id'";
  $result = mysql_query($query);
  if ((mysql_affected_rows() == 0) || (mysql_affected_rows() == -1)) {
    echo "Ej borttaget!";
  }
  else {
    echo "Borttaget!";
  }		
}
 
$query = "SELECT date_time, title, text, id FROM blog ORDER BY title DESC";
 
$result = mysql_query($query);
while (list($date, $title, $text, $id) = mysql_fetch_row($result)) {
  echo "<a href=\"deletepost.php?id=$id\">$title</a>";
  echo "<p>$text</p>";
  echo "<p>$date</p>";
}
 
?>
 
</div>
</body>
</html>
