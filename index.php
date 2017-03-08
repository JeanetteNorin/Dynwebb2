<?php

date_default_timezone_set('Europe/Stockholm');
include 'common.library.php';
include 'header.php';



 ?>

<body>
<?php
if (isset($_SESSION['uid'])) {
  echo $_SESSION['uid'];
} else {
  echo "you are not logged in";
}
 ?>
</body>

</html>

