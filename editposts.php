<?php
session_start();
if(!isset($_SESSION['uid'])){
   header("Location:index.php");
}
date_default_timezone_set('Europe/Stockholm');
include 'common.library.php';
include 'header.php';

$query = "SELECT date_time, title, id FROM blog ORDER BY title DESC";
 
$result = mysqli_query($conn, $query);
while (list($date, $title, $id) = mysqli_fetch_row($result)) {
  echo "<a href=\"editposts.php?id=$id\">$title</a>";
  echo "<p>$date</p>";
}
					
if ($_GET['id']) {
  $id = $_GET['id'];
  $query = "SELECT text, title, id, catid FROM blog WHERE id='$id'";
  $result = mysqli_query($conn, $query);
  while (list($text, $title, $id, $catid) = mysqli_fetch_row($result)) {
  ?>
  <form method="post" action="editposts.php">
    <p>Titel<br />
    <input type="text" name="title" size="50" 
      value="<?php echo $title;?>" /></p>
    <p>Text<br />
    <textarea name="text" cols="40" rows="10">
      <?php echo $text;?></textarea></p>
    <input type="text" name="id" value="<?php echo $id;?>" />
    
    <p>Category:<br />
	<?php
  $query = "SELECT catid, category FROM cat ORDER BY category";
  $result = mysqli_query($conn, $query);
  while($row = mysqli_fetch_array($result)) {
    $value = $row["catid"];
    $name = $row["category"];
    $pairs["$value"] = $name;
  }
  echo create_dropdown("catid",$pairs,"Choose from category list:",$catid,"");
?>
</p>
<p><input type="submit" name="submit" value="Update!" /></p>
  </form>
  <?php
  }			
}
 
if (isset($_POST['submit'])) {

	$title = trim_string($_POST['title']);
	$text = trim_string($_POST['text']);
	$date = date("Y-m-d H:i:s");
	$id = $_POST['id'];
	$catid = $_POST['catid'];

	$query = "UPDATE blog SET title='$title', text='$text',
	date_time='$date', catid='$catid' WHERE id='$id'";

	$result = mysqli_query($conn, $query);

	if (!$result) {
		$message  = 'Invalid query: ' . mysqli_error() . "\n";
		$message .= 'Whole query: ' . $query;
		die($message);
	}
	else {
		echo "<p>Update successful!</p>";
	}
}
 
?>

</body>
</html>
