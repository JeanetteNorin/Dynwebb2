<?php
  session_start();

 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>BLOGG</title>
</head>
<body>
  <header>
    <nav>
      <ul>
        <li><a href="index.php">HOME</a></li>
        <li><a href="posts.php">WRITE</a></li>
        <?php

        //show logout button if login-session is active
        if (isset($_SESSION['uid'])) {
          echo "<form action='logout.php' method='POST'>
            <button name='logoutSubmit type='submit'>LOG OUT</button>
          </form>";
        }
        //show login button if logged out
        else {
           echo "<form action='login.php' method='POST'>
          <input type='text' name='uname' placeholder='Username'>
          <input type='password' name='pwd' placeholder='Password'>
          <button name='loginSubmit type='submit'>LOG IN</button>
        </form>";
        }

  if (isset($_SESSION['uid'])) {
  echo $_SESSION['uname'];
  echo "You are now logged in!";
} else {
  echo "You are not logged in";
}
         ?>

      </ul>
    </nav>
  </header>
</body>