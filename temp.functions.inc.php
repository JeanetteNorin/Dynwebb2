<?php

function secondDropdown() {
  echo "<p>Choose<br />
        </p>
        <form class='second_form' action='index.php' method='post'>
        <select name = 'second_form'>
         <option value='descending'>Descending</option>
         <option value='ascending'>Ascending</option>
        </select>
        <p><input type='submit' method='POST' name='secondSubmit' action='index.php' value='Update!' /></p>
        </div>
        </form>";

        if(isset($_POST['secondSubmit'])) {
          $second_form = strtolower($_POST['second_form']);
            switch ($second_form) {
              case 'ascending':
              /*  $order = 'date_time DESC';
                return populateBlog($order);*/
                echo "helloooo";
                break;

              case 'descending':
                echo "hello";
                break;
            };
        }
}

/*function populateBlog($order) {
  $query = "SELECT date_time, text, title, catid FROM blog
    ORDER BY $order";

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
}
*/

 ?>
