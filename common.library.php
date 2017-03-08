<?php
function trim_string($str) {
  $str = str_replace("å", "&aring;", $str);
  $str = str_replace("ä", "&auml;", $str);
  $str = str_replace("ö", "&ouml;", $str);
  $str = str_replace("Å", "&Aring;", $str);
  $str = str_replace("Ä", "&Auml;", $str);
  $str = str_replace("Ö", "&Ouml;", $str);
  $str = strip_tags($str);
  $str = nl2br($str);
  return $str;
}

//server names and pw
$server = 'localhost';
$username = 's152267';
$password = 'dSvHEzKd';
$dbname = 's152267';

//connection to server saved as string
$conn = mysqli_connect($server, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


?>
