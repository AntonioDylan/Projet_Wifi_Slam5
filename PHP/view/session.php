<?php 
// Les controllers
require('../controlers/Bdd.php');
require('../controlers/Login.php');

// Démarage de la session
session_start();

// Connexion
$db = new Bdd();
$mel = filter_var($_POST["adressemel"], FILTER_SANITIZE_EMAIL);
$pass = $_POST["mdp"];
$login = new Login($mel, $pass, $db->pdo);

?>
