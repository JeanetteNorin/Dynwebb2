<!DOCTYPE html>
<html>
<head>
<title>Blogg</title>
<meta http-equiv="Content-Type" content="text/html" />
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php

date_default_timezone_set('Europe/Stockholm');
include 'common.library.php';
db_connect();
include 'header.php';

 
/* finns det ett värde på superglobalen med namn
submit (har formuläret skickats?)? */
if (isset($_POST['submit'])) {
 
  $title = trim_string($_POST['title']);
  $text = trim_string($_POST['text']);
  /* bygg ett datum enligt YYYY-MM-DD HH:II:SS
  se date()-funktionen på php.net för mer info */
  $date = date("Y-m-d H:i:s");
  $catid = $_POST['category'];	
	
  $query = "INSERT INTO blog SET title='$title', text='$text',
    date_time='$date', catid='$catid'";
		
  $result = mysql_query($query);
		
  if (!$result) {
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $query;
    die($message);
  }  		
  else {
    echo "<p>Skrivningen med query $query till databasen lyckades!</p>";
  } 		
 
}	
 
?>
<div id="container">
  <form method="post" action="posts.php">
    <p>Title<br />
    <input type="text" name="title" size="50" /></p>
    <p>Text<br />
    <textarea name="text" cols="60" rows="20"></textarea></p>
    <p>Category:<br />
<?php
$query = "SELECT catid, category FROM cat ORDER BY category";
$result = mysql_query($query);
while($row = mysql_fetch_array($result)) {
  $value = $row["catid"];
  $name = $row["category"];
  $pairs["$value"] = $name;
}
echo create_dropdown("category",$pairs,"Choose from category list:",1,"");
?>
    </p>    
    <p><input type="submit" name="submit" value="Publish!" /></p>
  </form>			
</body>
</html>
