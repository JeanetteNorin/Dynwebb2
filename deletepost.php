<?php
session_start();
if(!isset($_SESSION['uid'])){
   header("Location:index.php");
}
date_default_timezone_set('Europe/Stockholm');
include 'common.library.php';
include 'header.php';
//db_connect();
					
if ($_GET['id']) {
  $id = $_GET['id'];
  $query = "DELETE FROM blog WHERE id='$id'";
  $result = mysqli_query($conn, $query);
  if ((mysqli_affected_rows() == 0) || (mysqli_affected_rows() == -1)) {
    echo "Borttaget!";
  }
  else {
    echo "Ej Borttaget!";
  }		
}
 
$query = "SELECT date_time, title, text, id FROM blog ORDER BY title DESC";
 
$result = mysqli_query($conn, $query);
while (list($date, $title, $text, $id) = mysqli_fetch_row($result)) {
  echo "<a href=\"deletepost.php?id=$id\">$title</a>";
  echo "<p>$text</p>";
  echo "<p>$date</p>";
}
 
?>
 
</body>
</html>
