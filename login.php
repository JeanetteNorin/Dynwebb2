<?php
session_start();
include 'common.library.php';

$uname = $_POST['uname'];
$pwd = $_POST['pwd'];

$sql = "SELECT * FROM user WHERE uname='$uname' AND pwd='$pwd'";
$result = mysqli_query($conn, $sql);


//check if the username and password is in the db
if (!$row=mysqli_fetch_assoc($result)) {
    echo "Your username or password is incorrect!";
  }
  else {
    $_SESSION['uid'] = $row['uid'];
  }


header("Location: index.php")
 ?>
