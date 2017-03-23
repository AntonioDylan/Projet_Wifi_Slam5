<?php

namespace App;

require 'controlers/autoload.php'; 

Autoloader::register(); 



if (!isset($_SESSION['count']) || $_SESSION['count'] != 0) {
	header('location:./view/auth.php');
}
else {
	header('location:./view/peripherique.php');
}

?>
