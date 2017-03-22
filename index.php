<?php
date_default_timezone_set('Europe/Stockholm');
include 'common.library.php';
include 'header.php';

//drop down menu to choose order of posts
echo "<div id='title_container'>
      <div id='title_header'><h1>Cicci & Jeanette's blog</h1></div>
      <div id='sort_form'><p>SORT BLOG POSTS BY<br /></p>
      <form name='sort' class='sort_form' action='index.php' method='post'>
        <select name = 'order'>
	       <option value='choose'>Make A Selection</option>
         <option value='title'>Title</option>
         <option value='date_time'>Date posted</option>
         <option value='category'>Category</option>
        </select>
        <p><input type='submit' method='POST' name='submit' action='index.php' value='Update!' /></p>
      </div></div>
      </form>";

$sort = @$_POST['order'];

if (!empty($sort)) {
  //sort in order of choice from drop down menu
  switch ($sort) {
    case 'title':
      $query = "SELECT blog.date_time, blog.text, blog.title, blog.catid FROM blog
      ORDER BY title ASC";
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
   	      <div class=blog_footer><p> $date <br> Category: $cat</p></div></div>";
        }
    break;

    case 'date_time':
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
              <div class=blog_footer><p> $date <br> Category: $cat</p></div></div>";
            }
    break;

    case 'category':
      $query = "SELECT blog.date_time, blog.text, blog.title, blog.catid
      FROM blog
      INNER JOIN cat
      ON blog.catid = cat.catid
      ORDER BY category DESC";
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
              <div class=blog_footer><p> $date <br> Category: $cat</p></div></div>";
       }
    break;

  }


  }
else { // else if you do not pass any value from select option will return this
  $query = "SELECT date_time, text, title, catid FROM blog
   ORDER BY date_time ASC";
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
          <div class=blog_footer><p> $date <br> Category: $cat</p></div></div>";
   }
}

?>

</body>
</html>
