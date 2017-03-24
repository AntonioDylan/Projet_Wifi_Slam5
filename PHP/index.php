<?php


if (!isset($_SESSION['count']) || $_SESSION['count'] != 0) {
	header('location:./view/auth.php');
}
else {
	header('location:./view/peripherique.php');
}

?>
