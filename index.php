<?php
date_default_timezone_set('Europe/Stockholm');
include 'dbh.php';
include 'comments.inc.php';
include 'header.php';



 ?>

<body>
  <iframe width="420" height="315"
  src="https://www.youtube.com/embed/XGSy3_Czz8k">
  </iframe>

<?php
//Gets new comment from input and insert them into db
echo  "<form method='POST' action='".setComments($conn)."'>
        <input type='hidden' name='uid' value='Anonymous'>
        <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
        <textarea name='message'></textarea><br>
        <button type='submit' name='commentSubmit'>Comment</button>
      </form>";

//Call function to get comments from db
getComments($conn);

 ?>

</body>

</html>
