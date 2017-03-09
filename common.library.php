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
$username = 'root';
$password = '';
$dbname = 'blogg';


//connection to server saved as string
$conn = mysqli_connect($server, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

//create drop down menu
function create_dropdown($id,$pairs,$label,$selected,$multi="") {
  $dd = "<select name=\"$id\" $multi>";
  $dd .= "<option value=\"\">$label</option>";
  foreach($pairs as $value => $name) {
    $dd .= "<option value=\"$value\"";
    if ($value == $selected) {
      $dd .= " selected=\"selected\"";
    }
    $dd .= ">$name</option>";
  }
  $dd .= "</select>";
  return $dd;
}



?>
