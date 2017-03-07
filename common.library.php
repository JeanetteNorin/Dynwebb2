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

$conn = mysqli_connect('localhost', 's152267', 'dSvHEzKd', 's152267');

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


?>
