<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

} else {
   header('Location: ../index.php');

exit;
}

$now = time();

if($now > $_SESSION['expire']) {
session_destroy();

header('Location: ../index.php');
exit;
}
?>