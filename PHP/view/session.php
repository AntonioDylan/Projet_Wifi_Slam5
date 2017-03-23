<?php 
use App\Database;
use App\Session;

session_start();


$db = new Bdd();
$mel = filter_var($_POST["adressemel"], FILTER_SANITIZE_EMAIL);
$pass = $_POST["mdp"];

$login = new Login($mel, $pass, $db->pdo);


?>
