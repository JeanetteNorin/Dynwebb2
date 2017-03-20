<?php
date_default_timezone_set('Europe/Stockholm');
include 'common.library.php';
include 'header.php';
include 'functions.inc.php';
?>



<?php
$title = "Title";
echo "<p>Sort by<br />
      </p>
      <form class='sort_form' action='index.php' method='post'>
      <select name = 'sort_form'>
       <option value='title'>$title</option>
       <option value='date_time'>Date posted</option>
       <option value=''>Month</option>
       <option value=''>Category</option>
       <option value=''>Tags</option>
      </select>
      <p><input type='submit' method='POST' name='submit' action='index.php' value='Update!' /></p>
      </div>
      </form>";


      ?>




<?php
if (isset($_POST['submit'])) {
  echo "hello";
  $sort_form = strtolower($_POST['sort_form']);
  //change to switch
  switch ($sort_form) {
    case 'title':
      return secondDropdown();
      break;

    
  }
  };

/*
$query = "SELECT date_time, text, title, catid FROM blog
  ORDER BY date_time DESC";

$result = mysqli_query($conn, $query);
while (list($date, $text, $title, $catid) = mysqli_fetch_row($result)) {
	$query2 = "SELECT category FROM cat WHERE catid='$catid'";
	$result2 = mysqli_query($conn, $query2);
	while ($row2 = mysqli_fetch_array($result2)) {
		$cat = $row2['category'];
	}
	echo "<div class=blog_posts>
        <div class=blog_title><h2>$title</h2></div>
	      <div class=blog_content><p>$text</p></div>
	      <div class=blog_footer><p> $date <br> Kategori: $cat</p></div></div>";

}
*/
?>

</body>
</html>
