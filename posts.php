<?php
session_start();
if(!isset($_SESSION['uid'])){
   header("Location:index.php");
}
date_default_timezone_set('Europe/Stockholm');
include 'common.library.php';
//db_connect();
include 'header.php';

//check to see if form has been sent
if (isset($_POST['submit'])) {

  $title = trim_string($_POST['title']);
  $text = trim_string($_POST['text']);

  //building date
  $date = date("Y-m-d H:i:s");

  $categoryid = $_POST['category'];
  $query = "INSERT INTO blog SET title='$title', text='$text',
    date_time='$date', catid='$categoryid'";

  $result = mysqli_query($conn, $query);

  if (!$result) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $query;
    die($message);
  }
  else {
    echo "<p>Post published!</p>";
  }

}
?>
<!--Form for input to post to website-->
  <form method="post" action="posts.php">
    <div class="post_input">
    <h2>Title</h2>
    <input type="text" name="title" size="50" /></p>
    <p>Text<br />
    <textarea name="text" cols="60" rows="20"></textarea></p>
    <p>Category:<br />
      </div>

	<?php
	//create menu for category choice
	$query = "SELECT catid, category FROM cat ORDER BY category";
	$result = mysqli_query($conn, $query);
	while($row = mysqli_fetch_array($result)) {
		$value = $row["catid"];
		$name = $row["category"];
		$pairs["$value"] = $name;
	}
  echo "<div class='post_input'>";
	echo create_dropdown(" category",$pairs,"Choose from category list:",1,"");
	?>

    </p>
    <p><input type="submit" name="submit" value="Publish!" /></p></div>
  </form>
</body>
</html>
