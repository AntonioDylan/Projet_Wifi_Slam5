<?php
  if (!isset($_SESSION['count']) || $_SESSION['count'] != 0) {
    header('location:auth.php');
  }
  else {
      header('location:peripherique.php');
  }
?>
