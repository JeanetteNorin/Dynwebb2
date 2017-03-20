<?php
// Start session, check if user is logged in
session_start();
if(!isset($_SESSION['uid'])){
   header("Location:index.php");
}
date_default_timezone_set('Europe/Stockholm');
include 'common.library.php';
include 'header.php';

//Updates post and publish if input is correct
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

// Show selected post and form for editing
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT text, title, id, catid FROM blog WHERE id='$id'";
  $result = mysqli_query($conn, $query);
  while (list($text, $title, $id, $catid) = mysqli_fetch_row($result)) {
  ?>
  
	<!--Form for input to edit post-->
    <form method="post" action="editposts.php">
	 <div class="post_input">
    <h2>Title</h2>
    <input type="text" name="title" size="50" value="<?php echo $title;?>" />
    <p>Text<br />
    <textarea name="text" cols="50" rows="20">
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
</div>
  </form>
  <?php
  }
}

// Performs a query to the database
$query = "SELECT date_time, title, text, id FROM blog ORDER BY date_time DESC";
$result = mysqli_query($conn, $query);

// Loops through query and shows list of result
while (list($date, $title, $text, $id) = mysqli_fetch_row($result)) {
 
 echo "<div class=blog_posts>
		  <div class=blog_title><h2>$title</h2></div>
	      <div class=blog_content><p>$text</p></div>
	      <div class=blog_footer><a href=\"editposts.php?id=$id\">Edit</a></div></div>";
}
?>

</body>
</html>
